<?php

namespace Modules\Resource\Repositories;

use Nht\Hocs\Core\BaseRepository;

class ResourceRepository extends BaseRepository {
    public function __construct(Resource $model)
    {
        $this->model = $model;
    }

    public function getResources($perPage, array $filter = array(), array $sort = array(), $paginate = true)
    {
        $query = $this->model->whereRaw(1);

        if($paginate) {
            return $query->paginate($perPage);
        }

        return $query->take($perPage)->get();
    }
}