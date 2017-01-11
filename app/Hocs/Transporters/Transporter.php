<?php

namespace Nht\Hocs\Transporters;

use Illuminate\Database\Eloquent\Model;

class Transporter extends Model {

    protected $guarded = array('id');

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getHomePhone()
    {
        return $this->home_phone;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function getImage() {
        return $this->image;
    }

    public function hasImage() {
        return $this->getImage() ? true : false;
    }

    public function getActive() {
        return $this->active;
    }

    public function presenter() {
        return new Presenter($this);
    }

    public function images() {
        return $this->hasMany('Nht\Hocs\Transporters\Images\Image', 'transporter_id');
    }

    public function _address()
    {
        return $this->hasMany('Nht\Hocs\Transporters\Address\Address', 'transporter_id');
    }
}