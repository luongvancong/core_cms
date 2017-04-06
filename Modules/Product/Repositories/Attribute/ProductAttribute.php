<?php

namespace Modules\Product\Repositories\Attribute;

use Illuminate\Database\Eloquent\Model;

class ProductAttribute extends Model {

    protected $table = 'product_attributes';

    public $timestamps = false;

    /**
     * Một thuộc tính có nhiều giá trị
     * @return \Illuminate\Database\Eloquent\Relations\Relation
     */
    public function values()
    {
        return $this->hasMany('Modules\Product\Repositories\Attribute\ProductAttributeValue', 'attribute_id');
    }
}