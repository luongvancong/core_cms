<?php namespace Nht\Hocs\Pictures;

class PicturePresenter {

    protected $picture;

    public function __construct(Picture $picture)
    {
        $this->picture = $picture;
    }

    public function getProductName()
    {
        return $this->picture->products->name;
    }

}
