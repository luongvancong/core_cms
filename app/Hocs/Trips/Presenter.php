<?php

namespace Nht\Hocs\Trips;

class Presenter {

    /**
     * Trip model
     * @var \Nht\Hocs\Trips\Trip
     */
    protected $trip;

    public function __construct(Trip $trip)
    {
        $this->trip = $trip;
    }

    public function getStartDate($format = 'Y-m-d')
    {
        return date($format, strtotime($this->trip->getStartDate()));
    }

    public function getStartHour($format = 'H:i')
    {
        return date($format, strtotime($this->trip->getStartDate()));
    }

    public function getPrice()
    {
        return formatCurrency($this->trip->getPrice());
    }

    public function getSalePrice()
    {
        return formatCurrency($this->trip->getSalePrice());
    }

    public function getTruePrice()
    {
        return formatCurrency($this->trip->getTruePrice());
    }
}