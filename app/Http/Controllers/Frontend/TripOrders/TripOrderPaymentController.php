<?php

namespace Nht\Http\Controllers\Frontend\TripOrders;

use Illuminate\Http\Request;
use Nht\Hocs\TripOrders\TripOrderRepository;
use Nht\Hocs\Trips\TripRepository;
use Nht\Http\Controllers\Controller;
use Nht\Http\Controllers\FrontendController;
use Mail;

class TripOrderPaymentController extends FrontendController
{
    /**
     * [$order description]
     * @var \Nht\Hocs\TripOrders\TripOrderRepository
     */
    protected $order;

    public function __construct(TripOrderRepository $order, TripRepository $trip)
    {
        parent::__construct();
        $this->order = $order;
        $this->trip = $trip;
    }

    public function getPayment($id, Request $request)
    {
        $order = $this->order->getById($id);
        $orderDetail = $order->detail()->get();

        // Send mail to customer
        if(!isLocalhost()) {
            Mail::send('frontend/email/order', ['order' => $order, 'orderDetail' => $orderDetail], function ($m) use($order) {
                $m->from(config('mail.from.address'), config('mail.from.name'));
                $m->to($order->getCustomerEmail())->subject('Thông đơn đơn hàng');
            });
        }

        return view('frontend/trip_payment/index', compact('order', 'orderDetail'));
    }
}
