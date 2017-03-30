<?php

namespace Modules\Product\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Modules\Product\Http\Requests\AdminProductFormRequest;
use Modules\Product\Repositories\Category\ProductCategoryRepository;
use Modules\Product\Repositories\ProductRepository;
use Nht\Http\Controllers\Admin\AdminController;

class ProductController extends AdminController {

    /**
     * Product
     * @var \Modules\Product\Repositories\ProductRepository
     */
    protected $product;

    public function __construct(ProductRepository $product, ProductCategoryRepository $category)
    {
        parent::__construct();
        $this->product = $product;
        $this->category = $category;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $categories = $this->category->getAllCategories();
        $products = $this->product->get(20, ['category'], $request->all());
        return view('product::admin/index', compact('categories', 'products'));
    }


    /**
     * Create product
     * @return mixed
     */
    public function create()
    {
        $product = $this->product->getInstance();
        $categories = $this->category->getAllCategories();
        return view('product::admin/create', compact('product', 'categories'));
    }


    public function store(AdminProductFormRequest $request)
    {
        # code...
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
        return view('product::admin/edit', compact('product', 'categories'));
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
        $data = $request->except(['_token', 'images', '_image', '_image_homepage']);

        if ($this->product->update($data, ['id' => $id]))
        {
            $product = $this->product->getById($id);
            return redirect()->route('admin.product.index')->with('success', trans('general.messages.update_success'));
        }

        return redirect()->back()->withInputs()->with('error', trans('general.messages.update_fail'));
    }
}