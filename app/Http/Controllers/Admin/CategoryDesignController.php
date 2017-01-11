<?php


namespace Nht\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Nht\Hocs\Brands\BrandRepository;
use Nht\Hocs\Categories\Category;
use Nht\Hocs\Categories\CategoryRepository;
use Nht\Http\Controllers\Admin\AdminController;
use Nht\Http\Requests;
use Nht\Http\Requests\AdminCategoryRequest;
use App, Config;

class CategoryDesignController extends AdminController
{

    public function __construct(CategoryRepository $category)
    {
        parent::__construct();
        $this->category = $category;
        $this->image = App::make("ImageFactory");

        $thumbs = Config::get('image');
        $this->thumbsConfig = $thumbs['array_resize_image'];
    }


    /**
     * Categories
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function categories(Request $request)
    {
        $filter = $request->all();
        $filter['type'] = 1;

        $categories = $this->category->getAllCategories($filter, $request->all());
        return view('admin/categories_design/index', compact('categories'));
    }


    /**
     * Create Category
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function createCategory(Request $request)
    {
        $category = $this->category->getInstance();
        $categories = $this->category->getAllCategories(['type' => 1]);
        return view('admin/categories_design/create', compact('category', 'categories'));
    }

    /**
     * Do create category
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function storeCategory(Request $request)
    {
        $data = $request->except(['_token']);
        $data['type'] = Category::DESIGN;

        if($data['slug']) {
            $data['slug'] = removeTitle($data['slug']);
        } else {
            $data['slug'] = removeTitle($data['name']);
        }

        if($request->hasFile('background')) {
            $uploadResult = $this->image->upload('background', PATH_UPLOAD_IMAGE_CATEGORY, $this->thumbsConfig, 'resize');
            if($uploadResult['status'] > 0) {
                $data['background'] = $uploadResult['filename'];
            }
        }

        $category = $this->category->create($data);

        if ($category) {
            return redirect()->route('admin.category_design.categories.edit', [$category->getId()])->with('success', trans('general.messages.update_success'));
        }

        return redirect()->back()->withInputs()->with('error', trans('general.messages.update_fail'));
    }


    /**
     * Form edit category
     * @param  [type]  $id      [description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function editCategory($id, Request $request)
    {
        $category = $this->category->getById($id);
        $categories = $this->category->getAllCategories(['type' => 1]);
        return view('admin/categories_design/edit', compact('category', 'categories'));
    }


    /**
     * Do update category
     * @param  [type]  $id      [description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function updateCategory($id, Request $request)
    {
        $data = $request->except(['_token']);
        $data['type'] = Category::DESIGN;

        if($data['slug']) {
            $data['slug'] = removeTitle($data['slug']);
        } else {
            $data['slug'] = removeTitle($data['name']);
        }

        if($request->hasFile('background')) {
            $uploadResult = $this->image->upload('background', PATH_UPLOAD_IMAGE_CATEGORY, $this->thumbsConfig, 'resize');
            if($uploadResult['status'] > 0) {
                $data['background'] = $uploadResult['filename'];
            }
        }

        $result = $this->category->update($data, ['id' => $id]);

        if ($result) {
            return redirect()->route('admin.category_design.categories')->with('success', trans('general.messages.update_success'));
        }

        return redirect()->route('admin.category_design.categories')->with('error', trans('general.messages.update_fail'));
    }


    /**
     * Destroy category
     * @param  [type]  $id      [description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function destroyCategory($id, Request $request)
    {
        $category = $this->category->getById($id);
        if($category->delete()) {
            return redirect()->route('admin.category_design.categories')->with('success', 'Xóa thành công');
        }

        return redirect()->route('admin.category_design.categories')->with('success', 'Xóa không thành công');
    }

    /**
     * Toggle Active
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function toggleActiveCategory($id)
    {
        $category = $this->category->getById($id);
        $category->active = !$category->active;
        $category->save();

        return response()->json([
            'status' => $category->active,
            'code' => 1
        ]);
    }


    /**
     * Products
     * @return [type] [description]
     */
    public function products()
    {
        # code...
    }
}
