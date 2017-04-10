<?php

namespace Modules\Product\Repositories\Attribute;

class DbProductAttributeValueRepository extends BaseRepository implements ProductAttributeValueRepository {

    public function __construct(ProductAttributeValue $model)
    {
        $this->model = $model;
    }
}