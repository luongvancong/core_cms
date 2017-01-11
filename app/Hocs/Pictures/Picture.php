<?php

namespace Nht\Hocs\Pictures;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    const ACTIVE = 1;

    protected $table = "product_images";

    public function getId()
    {
        return $this->id;
    }

    public function getActive()
    {
        return $this->active;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function products()
    {
        return $this->belongsTo('Nht\Hocs\Products\Product', 'product_id');
    }

    public function presenter()
    {
        return new PicturePresenter($this);
    }

}
