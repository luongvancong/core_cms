<?php namespace Nht\Hocs\Brands;

use App;

class HtmlPresenter {

    protected $brand;

    public function __construct(Brand $brand) {
        $this->brand = $brand;
    }


    /**
     * Tạo item hsx ở sidebar
     * @param  integer $requestId Biến xác định hsx nào đang active
     * @return Html
     */
    public function getItem($requestId = 0, $url = null, $categoryId = 0) {
        $brand = $this->brand;

        $classIcon = 'fa-square-o';
        if($requestId == $brand->getId()) {
            $classIcon = 'fa-check-square';
        }

        if(is_null($url)) {
            $url = $brand->getUrl();
        }

        $countProduct = App::make('Nht\Hocs\Products\ProductRepository')->countProductsByQuery(['category_id' => $categoryId, 'brand_id' => $brand->getId()]);

        return sprintf('<li class="hsx-item">
                    <a href="'. $url .'" class="action-choice-hsx" title="'. $brand->getName() .'"><i class="fa %s"></i> '. $brand->getName() .' ('. $countProduct .')</a>
                </li>', $classIcon);
    }
}