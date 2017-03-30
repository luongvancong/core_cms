<?php

namespace Modules\Product\Repositories;

class DbProductRepository extends BaseRepository implements ProductRepository {

    /**
     * @var \Modules\Product\Repositories\Product
     */
    protected $model;

    public function __construct(Product $model)
    {
        $this->model = $model;
    }

    public function get($perPage = 20, array $with = array(), array $filter = array(), array $sort = array(), $paginate = true) {

    }
}