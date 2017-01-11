<?php

namespace Nht\Hocs\TripOrders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Nht\Hocs\TripOrders\TripOrderDetailPresenter;

class TripOrderDetail extends Model {

    protected $table = 'trip_order_details';

    public function getId()
    {
        return $this->id;
    }

    public function getTicket()
    {
        return $this->ticket;
    }

    public function getTripId()
    {
        return $this->trip_id;
    }

    public function getOrderId()
    {
        return $this->order_id;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getTotalMoney()
    {
        return $this->total_money;
    }

    public function getCreatedAt()
    {
        return $this->created_at;
    }

    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    public function trip()
    {
        return $this->belongsTo('Nht\Hocs\Trips\Trip');
    }

    public function presenter()
    {
        return new TripOrderDetailPresenter($this);
    }
}