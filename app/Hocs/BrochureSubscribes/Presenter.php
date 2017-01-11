<?php

namespace Nht\Hocs\BrochureSubscribes;

use Nht\Hocs\BrochureSubscribes\BrochureSubscribe;

class Presenter {

    public function __construct(BrochureSubscriber $model)
    {
        $this->model = $model;
    }

    public function getBrochure()
    {
        $options = brochure_get_options();
        $brochure = $this->model->getBrochure();
        $brochure = explode(',', $brochure);
        $text = '';

        foreach($brochure as $key) {
            if(array_key_exists($key, $options)) {
                $text .= $options[$key] . ',';
            }
        }

        return $text;
    }
}