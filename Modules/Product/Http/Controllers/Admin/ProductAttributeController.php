<?php

namespace Modules\Product\Http\Controllers\Admin;

use Modules\Product\Repositories\Category\ProductCategoryRepository;
use Nht\Http\Controllers\Admin\AdminController;

class ProductAttributeController extends AdminController {

    public function __construct(ProductCategoryRepository $category)
    {
        parent::__construct();
        $this->category = $category;
    }

    public function getIndex($categoryId)
    {
        # code...
    }
}