<?php

namespace Nht\Hocs\Cars\Positions;

use Illuminate\Database\Eloquent\Model;

class CarPositionSeat extends Model {
    protected $table = 'car_position_seats';

    public $timestamps = false;

    protected $guarded = ['id'];
}
