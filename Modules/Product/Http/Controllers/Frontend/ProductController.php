<?php

namespace Modules\Product\Http\Controllers\Frontend;

use Nht\Http\Controllers\FrontendController;

class ProductController extends FrontendController {

    /**
     * @var \Modules\Product\Repositories\ProductRepository
     */
    protected $product;

    /**
     * @var \Modules\Product\Repositories\Category\ProductCategoryRepository
     */
    protected $productCategory;

    public function __construct(ProductRepository $product, ProductCategoryRepository $productCategory)
    {
        $this->product = $product;
        $this->productCategory = $productCategory;
    }

    /**
     * Trang chi tiết 1 sản phẩm
     * @param  integer $id
     * @param  string $slug
     * @return string
     */
    public function getDetail($id, $slug)
    {
        # code...
    }
}