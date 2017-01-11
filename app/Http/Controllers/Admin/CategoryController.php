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

class CategoryController extends AdminController
{
    protected $category;

    public function __construct(CategoryRepository $category, BrandRepository $brand)
    {
        parent::__construct();
        $this->category = $category;
        $this->brand = $brand;
        $this->image = App::make("ImageFactory");

        $thumbs = Config::get('image');
        $this->thumbsConfig = $thumbs['array_resize_image'];
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $filter = $request->all();

        $categories   = $this->category->getAllCategories($filter, $request->all());
        return view('admin/categories/index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $categories = $this->category->getAllCategories();
        $category = new Category();
        return view('/admin/categories/create', compact('categories', 'category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(AdminCategoryRequest $request)
    {
        $data = $request->except(['_token']);

        $data['parent_id'] = $data['category_id'];
        unset($data['category_id']);

        if(isset($data['slug'])) {
            if($data['slug']) {
                $data['slug'] = removeTitle($data['slug']);
            } else {
                $data['slug'] = removeTitle($data['name']);
            }
        }

        if($request->hasFile('background')) {
            $uploadResult = $this->image->upload('background', PATH_UPLOAD_IMAGE_CATEGORY, $this->thumbsConfig, 'resize');
            if($uploadResult['status'] > 0) {
                $data['background'] = $uploadResult['filename'];
            }
        }

        if($request->hasFile('background_homepage')) {
            $uploadResult = $this->image->upload('background_homepage', PATH_UPLOAD_IMAGE_CATEGORY, $this->thumbsConfig, 'resize');
            if($uploadResult['status'] > 0) {
                $data['background_homepage'] = $uploadResult['filename'];
            }
        }

        $category = $this->category->create($data);

        if ($category) {
            return redirect()->route('admin.category.edit', [$category->getId()])->with('success', trans('general.messages.update_success'));
        }

        return redirect()->back()->withInputs()->with('error', trans('general.messages.update_fail'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $category   = $this->category->getById($id);
        $categories = $this->category->getAllCategories();

        return view('admin/categories/edit', compact('category', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update($id, AdminCategoryRequest $request)
    {
        $category = $this->category->getById($id);

        $data = $request->except(['_token']);

        $data['parent_id'] = $data['category_id'];
        unset($data['category_id']);

        if(isset($data['slug'])) {
            if($data['slug']) {
                $data['slug'] = removeTitle($data['slug']);
            } else {
                $data['slug'] = removeTitle($data['name']);
            }
        }

        if($request->hasFile('background')) {
            $uploadResult = $this->image->upload('background', PATH_UPLOAD_IMAGE_CATEGORY, $this->thumbsConfig, 'resize');

            if($uploadResult['status'] > 0) {
                $data['background'] = $uploadResult['filename'];
            }
        }

        if($request->hasFile('background_homepage')) {
            $uploadResult = $this->image->upload('background_homepage', PATH_UPLOAD_IMAGE_CATEGORY, $this->thumbsConfig, 'resize');
            if($uploadResult['status'] > 0) {
                $data['background_homepage'] = $uploadResult['filename'];
            }
        }

        if($this->category->update($data, ['id' => $id])) {
            return redirect()->route('admin.category.index')->with('success', 'Cập nhật thành công');
        }

        return redirect()->route('admin.category.index')->with('success', 'Cập nhật không thành công');
    }

    /**
     * Update the active category in storage
     * @param  int  $id
     * @return Response
     */

    public function active($id)
    {
        $category   = $this->category->getById($id);
        return $this->updater->toggleActiveStatus($this, $category);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $category = $this->category->getById($id);

        $cloneCategory = clone $category;

        $category->delete();

        return redirect()->route('admin.category.index')->with('success', 'Xóa thành công danh mục ' . $cloneCategory->getName());
    }


    /**
     * Show form select brand
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function categoriesBrands($id)
    {
        $category = $this->category->getById($id);
        $brandSelected = $category->brands()->get();
        // dd($brandSelected->lists('id')->toArray());
        $brands = $this->brand->getAll()->except($brandSelected->lists('id')->toArray());
        return view('admin/categories/category_brand', compact('category', 'brands', 'brandSelected'));
    }


    /**
     * Action attach category-brand
     * @param  [type] $id      [description]
     * @param  [type] $brandId [description]
     * @return [type]          [description]
     */
    public function doAttachBrand($id, $brandId)
    {
        $category = $this->category->getById($id);
        $brand = $this->brand->getById($brandId);

        $category->brands()->attach([$brandId]);

        return redirect()->route('admin.category.attach_brand', $id)->with('success', 'Cập nhật thành công');
    }


    public function doDetachBrand($id, $brandId)
    {
        $category = $this->category->getById($id);
        $brand = $this->brand->getById($brandId);

        $category->brands()->detach([$brandId]);

        return redirect()->route('admin.category.attach_brand', $id)->with('success', 'Cập nhật thành công');
    }


    public function toggleActive($id)
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
     * Cập nhật data ajax editable
     * @param  int  $id
     * @param  Request $request
     * @return json
     */
    public function ajaxEditAble(Request $request)
    {
        $id    = $request->get('pk');
        $field = $request->get('name');
        $value = clean($request->get('value'));

        $category = $this->category->getById($id);
        $category->$field = $value;

        if($category->save()) {
            return response()->json(['code' => 1]);
        }

        return response()->json(['code' => 0]);
    }
}
