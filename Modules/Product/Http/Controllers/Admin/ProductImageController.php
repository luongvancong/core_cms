<?php

namespace Modules\Product\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Modules\Product\Repositories\Image\ProductImage;
use Modules\Product\Repositories\ProductRepository;
use Nht\Http\Controllers\Admin\AdminController;

class ProductImageController extends AdminController {

    /**
     * Product
     * @var \Modules\Product\Repositories\Product
     */
    protected $product;

    public function __construct(ProductRepository $product)
    {
        $this->product = $product;
        $this->image = \App::make('ImageFactory');
    }


    /**
     * Images listing
     * @return [type] [description]
     */
    public function index($productId)
    {
        $product = $this->product->getById($productId);
        $images = $product->images()->get();
        return view('product::admin/images/index', compact('product', 'images'));
    }


    /**
     * Upload multipe images
     * @param  [type] $productId [description]
     * @return [type]            [description]
     */
    public function create($productId)
    {
        $product = $this->product->getById($productId);
        return view('product::admin/images/create', compact('product'));
    }


    /**
     * Do upload multiple
     * @param string $value [description]
     */
    public function store($productId, Request $request)
    {
        $product = $this->product->getById($productId);
        $this->saveProductImages($product, $request);
        return redirect()->route('admin.product.images', [$productId]);
    }

    public function saveProductImages($product, Request $request) {
        if($request->hasFile('images')) {
            $resultUpload = $this->image->uploadMulti('images');
            if($resultUpload['filename']) {
                $this->product->saveProductImages($product, $resultUpload['filename']);
            }
        }
    }


    public function destroy($productId, $imageId)
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
    public function ajaxEditAble(Request $request)
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