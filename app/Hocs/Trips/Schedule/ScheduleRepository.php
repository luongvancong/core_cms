<?php

namespace Nht\Hocs\Trips\Schedule;

use Nht\Hocs\Core\BaseRepository;

class ScheduleRepository extends BaseRepository {

    public function __construct(Schedule $model)
    {
        $this->model = $model;
    }
}