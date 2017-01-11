<?php

namespace Nht\Hocs\Trips\Schedule;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model {
    protected $table = 'trip_schedule';

    protected $guarded = ['id'];

    public function getId()
    {
        return $this->id;
    }

    public function getTime()
    {
        return $this->time;
    }

    public function getPlacement()
    {
        return $this->placement;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function trip()
    {
        return $this->belongsTo('Nht\Hocs\Trips\Trip', 'trip_id');
    }
}