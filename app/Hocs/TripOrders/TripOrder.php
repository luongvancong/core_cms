<?php

namespace Nht\Hocs\TripOrders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TripOrder extends Model {

    use SoftDeletes;

    protected $table = 'trip_orders';

    protected $guarded = ['id'];

    protected $dates = ['deleted_at'];

    public function getId()
    {
        return $this->id;
    }

    public function getCustomerId()
    {
        return $this->customer_id;
    }

    public function getCustomerName()
    {
        return $this->customer_name;
    }


    public function getCustomerEmail()
    {
        return $this->customer_email;
    }

    public function getCustomerPhone()
    {
        return $this->customer_phone;
    }

    public function getTripId()
    {
        return $this->trip_id;
    }

    public function getSeat()
    {
        return $this->picked_seat;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getTotalMoney()
    {
        return $this->total_money;
    }

    public function getCode()
    {
        return $this->code;
    }

    public function getPaymentMethod()
    {
        return $this->payment_method;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function getType()
    {
        return $this->type;
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

    public function detail()
    {
        return $this->hasMany('Nht\Hocs\TripOrders\TripOrderDetail', 'order_id');
    }

    public function presenter()
    {
        return new Presenter($this);
    }
}