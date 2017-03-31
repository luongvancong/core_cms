<?php

namespace Modules\Product\Repositories\Category;

use Modules\Category\Repositories\Category as BaseCategory;

class ProductCategory extends BaseCategory {

    public function products()
    {
        return $this->hasMany('Modules\Product\Repositories\Product', 'category_id');
    }
}