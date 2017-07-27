<?php

namespace Modules\Product\Repositories\Attribute;

use App\Hocs\Core\BaseRepository;

class DbProductAttributeValueRepository extends BaseRepository implements ProductAttributeValueRepository {

    public function __construct(ProductAttributeValue $model)
    {
        $this->model = $model;
    }
}