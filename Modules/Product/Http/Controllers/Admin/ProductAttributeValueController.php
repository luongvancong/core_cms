<?php

namespace Modules\Product\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Modules\Product\Http\Requests\AdminProductAttributeFormRequest;
use Modules\Product\Repositories\Attribute\ProductAttributeRepository;
use Modules\Product\Repositories\Category\ProductCategoryRepository;
use Nht\Http\Controllers\Admin\AdminController;

class ProductAttributeValueController extends AdminController {

    public function __construct(ProductCategoryRepository $category, ProductAttributeRepository $attribute)
    {
        parent::__construct();
        $this->category = $category;
        $this->attribute = $attribute;
    }

    public function getIndex($attrId, Request $request)
    {
        return view('product::admin/attribute/value/index');
    }

    public function getCreate($attrId)
    {
        $category = $this->category->getById($attrId);
        $attribute = $this->attribute->getInstance();
        return view('product::admin/attribute/create', compact('category', 'attribute'));
    }

    public function postCreate($attrId, AdminProductAttributeFormRequest $request)
    {
        $data = $request->all();
        $data['name_hash'] = md5($data['name']);
        $data['category_id'] = $attrId;

        if($attribute = $this->attribute->create($data)) {
            return redirect()->route('admin.product_attribute.index', $attrId)->with('success', trans('general.messages.update_success'));
        }

        return redirect()->route('admin.product_attribute.index', $attrId)->with('error', trans('general.messages.update_fail'));
    }
}