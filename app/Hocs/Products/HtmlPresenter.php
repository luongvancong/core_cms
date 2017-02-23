<?php

namespace Nht\Hocs\Products;

class HtmlPresenter {

    protected $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }


    public function getPrice() {
        return formatCurrency($this->product->getPrice()) . ' VNĐ';
    }

    public function getPromotionPrice()
    {
        return formatCurrency($this->product->getPromotionPrice()) . ' VNĐ';
    }

    public function getType()
    {
        $options = product_get_type_options();
        return array_key_exists($this->product->getType(), $options) ? $options[$this->product->getType()]  : '--';
    }

}