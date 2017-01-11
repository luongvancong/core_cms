<?php

namespace Nht\Hocs\Transporters;

class Presenter {

    /**
     * @var Transporter
     */
    protected $transporter;

    public function __construct(Transporter $transporter)
    {
        $this->transporter = $transporter;
    }

    public function getImage($type = 'sm_')
    {
        return parse_image_url($type . $this->transporter->getImage());
    }
}