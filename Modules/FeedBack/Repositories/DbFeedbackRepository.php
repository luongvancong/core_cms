<?php

namespace Modules\FeedBack\Repositories;

use Nht\Hocs\Core\BaseRepository;

class DbFeedbackRepository extends BaseRepository implements FeedbackRepository {

    /**
     * @var \Modules\FeedBack\Repositories\Feedback
     */
    protected $model;

    public function __construct(Feedback $model)
    {
        $this->model = $model;
    }

    public function get($perPage = 20, array $filter = array(), array $sort = array(), $paginate = true) {
        $query = $this->model->whereRaw(1);

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