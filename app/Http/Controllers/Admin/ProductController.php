<?php

namespace Nht\Http\Controllers\Admin;

use App;
use Config;
use Event;
use Illuminate\Http\Request;
use Nht\Events\DeleteProductEvent;
use Nht\Events\UpdateProductEvent;
use Nht\Hocs\Categories\CategoryRepository;
use Nht\Hocs\Products\ProductImage;
use Nht\Hocs\Products\ProductRepository;
use Nht\Hocs\Tags\TagRepository;
use Nht\Http\Controllers\Admin\AdminController;
use Nht\Http\Requests;
use Nht\Http\Requests\AdminProductFormRequest;

class ProductController extends AdminController
{
	protected $product;

	public function __construct(ProductRepository $product, TagRepository $tag, CategoryRepository $category)
	{
		parent::__construct();
		$this->product = $product;
		$this->image = App::make('ImageFactory');
		$config = Config::get('image');
		$configThumbs = $config['array_resize_image'];
		$this->configThumbs = $configThumbs;
		$this->tag = $tag;
		$this->category = $category;
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
		$products = $this->product->getProductsPaginated(20, $request->all());
		return view('admin/products/index', compact('products'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$product = $this->product->getInstance();
		$categories = $this->category->getAllCategories();
		return view('admin/products/create', compact('product', 'categories'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  Request  $request
	 * @return Response
	 */
	public function store(AdminProductFormRequest $request)
	{
		$data = $request->except(['_token', 'images']);
		$data = $this->fillDataWithUploadFiles($data, $request);

		if ($product = $this->product->create($data))
		{
			$this->saveProductImages($product, $request);
			return redirect()->route('admin.product.create')->with('success', trans('general.messages.create_success'));
		}

		return redirect()->back()->withInputs()->with('error', trans('general.messages.create_fail'));
	}


	public function fillDataWithUploadFiles($data, Request $request) {
		if($request->hasFile('image')) {
			$resultUpload = $this->image->upload('image', PATH_UPLOAD_IMAGE_PRODUCT, $this->configThumbs, 'resize');

			if($resultUpload['status'] > 0) {
				$data['image'] = $resultUpload['filename'];
			}
		}

		if($request->hasFile('image_homepage')) {
			$resultUpload = $this->image->upload('image_homepage', PATH_UPLOAD_IMAGE_PRODUCT, $this->configThumbs, 'resize');

			if($resultUpload['status'] > 0) {
				$data['image_homepage'] = $resultUpload['filename'];
			}
		}

		return $data;
	}


	public function saveProductImages($product, Request $request) {
		if($request->hasFile('images')) {
			$resultUpload = $this->image->uploadMulti('images', PATH_UPLOAD_IMAGE_PRODUCT, $this->configThumbs, 'resize');
			if($resultUpload['filename']) {
				$this->product->saveProductImages($product, $resultUpload['filename']);
			}
		}
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$product = $this->product->getById($id);
		$categories = $this->category->getAllCategories();
		return view('admin/products/edit', compact('product', 'categories'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  Request  $request
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, AdminProductFormRequest $request)
	{
		$data = $request->except('_token');

		$data = $this->fillDataWithUploadFiles($data, $request);

		if ($this->product->update($data, ['id' => $id]))
		{
			$product = $this->product->getById($id);
			return redirect()->route('admin.product.edit', $id)->with('success', trans('general.messages.update_success'));
		}

		return redirect()->back()->withInputs()->with('error', trans('general.messages.update_fail'));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$product = $this->product->getById($id);

		if ($this->product->delete($id))
		{
			Event::fire(new DeleteProductEvent($product));

			return redirect()->route('admin.product.index')->with('success', trans('general.messages.delete_success'));
		}
		return redirect()->route('admin.product.index')->with('error', trans('general.messages.delete_fail'));
	}


	/**
	 * Toggle active status
	 * @param  int $id
	 * @return json
	 */
	public function toggleActive($id)
	{
		$product = $this->product->getById($id);

		$product->active = ! $product->active;
		$product->save();

		return response()->json([
		   'code' => 1,
		   'status' => $product->active,
		]);
	}

	public function toggleHot($id) {
		$product = $this->product->getById($id);

		$product->hot = ! $product->hot;
		$product->save();

		return response()->json([
		   'code' => 1,
		   'status' => $product->hot,
		]);
	}

	public function toggleBanner($id) {
		$product = $this->product->getById($id);

		$product->is_banner = ! $product->is_banner;
		$product->is_banner_time = date('Y-m-d H:i:s');
		$product->save();

		return response()->json([
		   'code' => 1,
		   'status' => $product->is_banner,
		]);
	}


	public function toggleNewest($id) {
		$product = $this->product->getById($id);

		$product->newest = ! $product->newest;
		$product->save();

		return response()->json([
		   'code' => 1,
		   'status' => $product->newest,
		]);
	}


	public function ajaxEditable(Request $request)
	{
		$id    = $request->get('pk');
		$field = $request->get('name');
		$value = $request->get('value');

		return $this->product->update([$field => $value], ['id' => $id]);
	}




	public function autocomplete(Request $request)
	{
		$name = $request->get('q');
		$products = $this->product->getByName($name);
		$jsons = [];
		foreach($products as $product) {
			$jsons[] = [
				'id' => $product->getId(),
				'name' => $product->getName()
			];
		}
		return $jsons;
	}


	public function tagIndex($productId, Request $request)
	{
		$product = $this->product->getById($productId);
		$tags = $this->tag->getAllTagsByProduct($product);

		return view('admin/products/tag/index', compact('product', 'tags'));
	}


	public function tagDelete($productId, $tagId)
	{
		\DB::table('products_tags')->where('product_id', $productId)->where('tag_id', $tagId)->delete();
		return redirect()->back()->with('success', 'Xóa thành công');
	}


	public function tagCreate($productId, Request $request)
	{
		$product = $this->product->getById($productId);
		return view('admin/products/tag/create', compact('product'));
	}


	public function tagCreateStore($productId, Request $request)
	{
		$product = $this->product->getById($productId);
		$tags = explode(',', $request->get('tags'));
		$product->tags()->attach($tags);
		return redirect()->route('admin.product.tag.index', [$product->getId()])->with('success', 'Thêm tag thành công');
	}

	public function ajaxQuickEditAllKeyword(Request $request)
	{
		$productId = $request->get('product_id');
		$data = $request->except(['_token', 'product_id']);

		if($this->product->update($data, ['id' => $productId])) {
			return response()->json(['code' => 1]);
		}

		return response()->json(['code' => 0]);
	}


	/**
	 * Images listing
	 * @return [type] [description]
	 */
	public function images($productId)
	{
		$product = $this->product->getById($productId);
		$images = $product->images()->get();
		return view('admin/products/images/index', compact('product', 'images'));
	}


	/**
	 * Upload multipe images
	 * @param  [type] $productId [description]
	 * @return [type]            [description]
	 */
	public function createImage($productId)
	{
		$product = $this->product->getById($productId);
		return view('admin/products/images/create', compact('product'));
	}


	/**
	 * Do upload multiple
	 * @param string $value [description]
	 */
	public function storeImage($productId, Request $request)
	{
		$product = $this->product->getById($productId);
		$this->saveProductImages($product, $request);
		return redirect()->route('admin.product.images', [$productId]);
	}


	public function destroyImage($productId, $imageId)
	{
		$product = $this->product->getById($productId);
		$image = $product->images()->find($imageId);
		$image->delete();

		return redirect()->route('admin.product.images', [$productId]);
	}


	/**
	 * Images ajax editable
	 * @param  Request $request
	 * @return json
	 */
	public function imagesAjaxEditAble(Request $request)
	{
		$id    = $request->get('pk');
        $field = $request->get('name');
        $value = clean($request->get('value'));

        $item = ProductImage::find($id);
        $item->$field = $value;

        if($item->save()) {
            return response()->json(['code' => 1]);
        }

        return response()->json(['code' => 0]);
	}


	/**
	 * Xóa nhiều sản phẩm 1 lúc
	 * @param  Request $request
	 * @return json
	 */
	public function ajaxQuickDeleteMultiple(Request $request)
	{
		$ids = $request->get('product_ids');

		if($this->product->deleteMultiByIds($ids)) {
			return response()->json(['code' => 1]);
		}

		return response()->json(['code' => 0]);
	}


	/**
	 * Images delete multi
	 * @param  Request $request
	 * @return json
	 */
	public function ajaxImageQuickDeleteMultiple(Request $request)
	{
		$ids = $request->get('record_ids');

		if(ProductImage::whereIn('id', $ids)->delete()) {
			return response()->json(['code' => 1]);
		}

		return response()->json(['code' => 0]);
	}

}
