<?php

namespace Nht\Hocs\AdvisorySubscribers;

use Illuminate\Database\Eloquent\Model;

class AdvisorySubscriber extends Model {
    protected $table = 'advisory_subscribers';

    public function getName()
    {
        return $this->name;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function getCategoryId()
    {
        return $this->category_id;
    }

    public function presenter()
    {
        return new Presenter($this);
    }

    public function category()
    {
        return $this->belongsTo('Nht\Hocs\Categories\Category', 'category_id');
    }
}