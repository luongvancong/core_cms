<?php

namespace Nht\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Nht\Hocs\TripOrders\TripOrderRepository;
use Nht\Http\Controllers\Admin\AdminController;
use Nht\Http\Controllers\Controller;

class TripOrderController extends AdminController
{
    public function __construct(TripOrderRepository $order)
    {
        parent::__construct();
        $this->order = $order;
    }

    public function getIndex(Request $request)
    {
        $orders = $this->order->getOrders(20, $request->all(), [], true);
        $sumTotalMoney = $this->order->sumTotalMoney($request->all());
        return view('admin/trip-orders/index', compact('orders', 'sumTotalMoney'));
    }


    public function getDetail($id, Request $request)
    {
        $order = $this->order->getById($id);
        $orderDetail = $order->detail()->get();
        return view('admin/trip-orders/detail', compact('order', 'orderDetail'));
    }
}
