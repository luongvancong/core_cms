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

        $extensions = (array) array_get($filter, 'extensions');

        if($extensions) {
            $query->whereIn('extension', $extensions);
        }

        if($paginate) {
            return $query->paginate($perPage);
        }

        return $query->take($perPage)->get();
    }


    public function getByName($name)
    {
        return $this->model->where('name', '=', $name)->first();
    }
}