<?php namespace Nht\Hocs\Brands;

class JsonPresenter {

    protected $brand;

    public function __construct(Brand $brand)
    {
        $this->brand = $brand;
    }

    public function output()
    {
        return json_encode([
            'id'   => $this->brand->getId(),
            'name' => $this->brand->getName(),
            'url'  => $this->brand->getUrl()
        ]);
    }
}