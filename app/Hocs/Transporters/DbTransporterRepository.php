<?php

namespace Nht\Hocs\Transporters;

use Nht\Hocs\Core\BaseRepository;

class DbTransporterRepository extends BaseRepository implements TransporterRepository {

    public function __construct(Transporter $model)
    {
        $this->model = $model;
    }

    public function getTransporters($perPage = 20, array $filter = array(), array $sort = array(), bool $paginate = true) {
        $query = $this->model->whereRaw(1);

        $name = array_get($filter, 'name');
        $id = (array) array_get($filter, 'id');

        if($id) $query->whereIn('id', $id);

        if($name) $query->where('name', 'LIKE', '%'. clean($name) .'%');

        if(!$sort) $sort = ['updated_at' => 'DESC'];

        foreach($sort as $key => $value) {
            $query->orderBy($key, $value);
        }

        if($paginate) {
            return $query->paginate($perPage);
        }

        return $query->take($perPage)->get();
    }


    public function saveImages($transporter, array $images) {
        foreach($images as $image) {
            $transporter->images()->create([
                'transporter_id' => $transporter->getId(),
                'image'          => $image
            ]);
        }
    }
}