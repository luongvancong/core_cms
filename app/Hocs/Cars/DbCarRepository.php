<?php
namespace Nht\Hocs\Cars;

use Nht\Hocs\Core\BaseRepository;

class DbCarRepository extends BaseRepository implements CarRepository {

    public function __construct(Car $car)
    {
        $this->model = $car;
    }


    public function getCars($perPage = 20, array $filter = array(), array $sort = array(), $paginate = true) {
        $query = $this->model->whereRaw(1);

        $name = array_get($filter, 'name');
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
}