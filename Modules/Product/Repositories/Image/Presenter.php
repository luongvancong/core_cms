<?php

namespace Modules\Product\Repositories\Image;

class Presenter {

    public function __construct(ProductImage $model)
    {
        $this->model = $model;
    }

    public function getImage($type = '')
    {
        return parse_image_url($type . $this->model->getImage());
    }

}