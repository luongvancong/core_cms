<?php

namespace Nht\Hocs\TripOrders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TripOrderDetailPresenter extends Model {

    /**
     * [$model description]
     * @var \Nht\Hocs\TripOrders\TripOrderDetail
     */
    protected $model;

    public function __construct(TripOrderDetail $model)
    {
        $this->model = $model;
    }

    public function getPrice()
    {
        return formatCurrency($this->model->getPrice());
    }

    public function getTotalMoney()
    {
        return formatCurrency($this->model->getTotalMoney());
    }
}