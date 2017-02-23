<?php

namespace Nht\Hocs\Sites;

class LinkPresenter {

    protected $link;

    public function __construct(Link $link)
    {
        $this->link = $link;
    }

    public function getDevice()
    {
        if ($this->link->isLaptop()) {
            return 'Laptop';
        }
        elseif ($this->link->isTablet()) {
            return 'Tablet';
        }
        elseif ($this->link->isPhone()) {
            return 'Phone';
        }

        return 'Is not device';
    }
}