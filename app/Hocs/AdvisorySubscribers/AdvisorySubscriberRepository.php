<?php

namespace Nht\Hocs\AdvisorySubscribers;

use Nht\Hocs\Core\BaseRepository;

class AdvisorySubscriberRepository extends BaseRepository {

    public function __construct(AdvisorySubscriber $model)
    {
        $this->model = $model;
    }

    public function getPaginated($perPage = 25, array $filter = array(), array $sort = array())
    {
        $query = $this->model->whereRaw(1);

        if(!$sort) $sort = ['updated_at' => "DESC"];

        foreach($sort as $key => $value) {
            $query->orderBy($key, $value);
        }

        return $query->paginate($perPage);
    }
}