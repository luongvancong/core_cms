<?php

namespace Nht\Hocs\Cars;

class Presenter {

    public function __construct(Car $car)
    {
        $this->car = $car;
    }

    public function getImage($type = "sm_")
    {
        return parse_image_url($type . $this->car->getImage());
    }
}