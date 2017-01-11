<?php

namespace Nht\Hocs\Transporters\Address;

use Illuminate\Database\Eloquent\Model;

class Address extends Model {
    protected $table = 'transporter_address';

    protected $guarded = ['id'];

    public $timestamps = false;

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function getPhoneTicket()
    {
        return $this->phone_ticket;
    }

    public function getPhoneShop()
    {
        return $this->phone_shop;
    }

    public function getCityId()
    {
        return $this->city_id;
    }

    public function getTransporterId()
    {
        return $this->transporter_id;
    }

    public function transporter()
    {
        return $this->belongsTo('Nht\Hocs\Transporters\Transporter', 'transporter_id');
    }

    public function city()
    {
        return $this->belongsTo('Nht\Hocs\Cities\City', 'city_id', 'cit_id');
    }
}