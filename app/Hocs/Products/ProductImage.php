<?php

namespace Nht\Hocs\Products;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    protected $guarded = ['id'];

    public $timestamps = false;

    public function getId()
    {
        return $this->id;
    }

    public function getImage($type = 'sm_')
    {
        return PATH_IMAGE_PRODUCT . $type . $this->image;
    }

    public function getImageAlt()
    {
        return $this->image_alt;
    }

    public function getSort()
    {
        return $this->sort;
    }
}