<?php

namespace Nht\Http\Controllers\Frontend\CheckOrderInfo;

use Illuminate\Http\Request;
use Nht\Hocs\TripOrders\TripOrder;
use Nht\Hocs\TripOrders\TripOrderRepository;
use Nht\Hocs\Trips\TripRepository;
use Nht\Http\Controllers\FrontendController;

class CheckOrderInfoController extends FrontendController
{
    /**
     * Order repository
     * @var \Nht\Hocs\TripOrders\TripOrderRepository
     */
    protected $order;

    /**
     * Trip repository
     * @var \Nht\Hocs\Trips\TripRepository
     */
    protected $trip;

    public function __construct(TripOrderRepository $order, TripRepository $trip)
    {
        parent::__construct();
        $this->trip = $trip;
        $this->order = $order;
    }

    public function getIndex(Request $request)
    {
        if($request->get('action') == 'search') {
            $code  = clean($request->get('code'));
            $phone = clean($request->get('phone'));

            $order = TripOrder::where('customer_phone', $phone)
                               ->where('code', $code)
                               ->first();

            if(!$order) {
                $message['code'] = 404;
                $message['content'] = 'Không tìm thấy bản ghi phù hợp';
                return view('frontend/check_order_info/index', compact('message'));
            }

            $orderDetail = $order->detail()->get();

            return view('frontend/check_order_info/index', compact('order', 'orderDetail'));
        }

        return view('frontend/check_order_info/index');
    }

    public function postIndex(Request $request)
    {


        return view('frontend/check_order_info/index', compact('order', 'trip'));
    }
}