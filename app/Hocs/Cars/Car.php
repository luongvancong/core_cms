<?php

namespace Nht\Hocs\Cars;

use Illuminate\Database\Eloquent\Model;

class Car extends Model {

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getFloor()
    {
        return $this->floor;
    }

    public function getSeat()
    {
        return $this->seat;
    }

    public function getSeat2()
    {
        return $this->seat_floor_2;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function hasImage()
    {
        return $this->image ? true : false;
    }

    public function presenter() {
        return new Presenter($this);
    }

    public function positionSeat()
    {
        return $this->hasMany('Nht\Hocs\Cars\Positions\CarPositionSeat');
    }
}