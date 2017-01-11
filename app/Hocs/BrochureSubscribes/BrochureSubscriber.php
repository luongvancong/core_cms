<?php

namespace Nht\Hocs\BrochureSubscribes;

use Illuminate\Database\Eloquent\Model;

class BrochureSubscriber extends Model {
    protected $table = 'brochure_subscribers';

    public function getName()
    {
        return $this->name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function getBrochure()
    {
        return $this->brochure;
    }

    public function presenter()
    {
        return new Presenter($this);
    }
}