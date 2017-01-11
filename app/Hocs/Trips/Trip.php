<?php

namespace Nht\Hocs\Trips;

use Illuminate\Database\Eloquent\Model;

class Trip extends Model {
    protected $guarded = ['id'];

    public function getId()
    {
        return $this->id;
    }

    public function getRoute() {
        return $this->route;
    }

    public function getStartPlace() {
        return $this->start_place;
    }

    public function getEndPlace() {
        return $this->end_place;
    }

    public function getStartAddress() {
        return $this->start_address;
    }

    public function getEndAddress() {
        return $this->end_address;
    }

    public function getStartDate() {
        return $this->start_date;
    }

    public function getEndDate() {
        return $this->end_date;
    }

    public function getPrice() {
        return $this->price;
    }

    public function getSalePrice()
    {
        return $this->sale_price;
    }

    public function isSale()
    {
        return $this->getSalePrice() ? true : false;
    }

    public function getTruePrice()
    {
        return $this->isSale() ? $this->getSalePrice() : $this->getPrice();
    }

    public function getNumTicket() {
        return $this->num_ticket;
    }

    public function getTransporterId() {
        return $this->transporter_id;
    }

    public function getCarId() {
        return $this->car_id;
    }

    public function getActive()
    {
        return $this->active;
    }

    public function getCreatedAt() {
        return $this->created_at;
    }

    public function getUpdatedAt() {
        return $this->updated_at;
    }

    public function presenter()
    {
        return new Presenter($this);
    }

    public function startPlace() {
        return $this->belongsTo('Nht\Hocs\Cities\City', 'start_place');
    }

    public function endPlace() {
        return $this->belongsTo('Nht\Hocs\Cities\City', 'end_place');
    }

    public function schedule() {
        return $this->hasOne('Nht\Hocs\Trips\Schedule\Schedule');
    }

    public function images()
    {
        return $this->hasMany('Nht\Hocs\Trips\Images\Image');
    }

    public function pickedSeat()
    {
        return $this->hasMany('Nht\Hocs\Trips\PickedSeat\TripPickedSeat', 'trip_id');
    }
}