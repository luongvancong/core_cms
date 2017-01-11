<?php

namespace Nht\Hocs\Trips\Images;

use Illuminate\Database\Eloquent\Model;

class Image extends Model {
    protected $table = 'trip_images';

    protected $guarded = ['id'];

    public $timestamps = false;

    public function getId()
    {
        return $this->id;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function getTripId()
    {
        return $this->trip_id;
    }

    public function trip()
    {
        return $this->belongsTo('Nht\Hocs\Trips\Trip');
    }
}