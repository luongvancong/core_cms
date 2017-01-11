<?php

namespace Nht\Hocs\Trips\PickedSeat;

use Illuminate\Database\Eloquent\Model;

class TripPickedSeat extends Model {
    protected $table = 'trip_order_picked_seats';

    public $timestamps = false;

    protected $guarded = ['id'];
}