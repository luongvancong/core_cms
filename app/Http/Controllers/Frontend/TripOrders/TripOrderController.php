<?php
/**
 * Created by PhpStorm.
 * User: justin
 * Date: 24/12/16
 * Time: 16:25
 */

namespace Nht\Http\Controllers\Frontend\TripOrders;


use Illuminate\Http\Request;
use Nht\Hocs\Cars\CarRepository;
use Nht\Hocs\TripOrders\TripOrderDetail;
use Nht\Hocs\TripOrders\TripOrderRepository;
use Nht\Hocs\Trips\TripRepository;
use Nht\Http\Controllers\FrontendController;
use Nht\Http\Requests\TripOrderFormRequest;

class TripOrderController extends FrontendController
{
    /**
     * [$trip description]
     * @var \Nht\Hocs\Trips\TripRepository
     */
    protected $trip;

    /**
     * [$order description]
     * @var \Nht\Hocs\TripOrders\TripOrderRepository
     */
    protected $order;

    public function __construct(TripRepository $trip,TripOrderRepository $order)
    {
        parent::__construct();
        $this->trip = $trip;
        $this->order = $order;
    }

    /**
     * Save order
     * @param  Request $request
     * @return json
     */
    public function postOrder(Request $request)
    {
        $data = (array) $request->get('data');
        $customerName  = clean($request->get('customer_name'));
        $customerPhone = clean($request->get('customer_phone'));
        $customerEmail = clean($request->get('customer_email'));
        $rTripId = (int) $request->get('rtrip_id');

        if($customerName == '') {
            return response()->json(['code' => 0, 'message' => 'Vui lòng nhập tên khách hàng']);
        }

        if($customerPhone == '') {
            return response()->json(['code' => 0, 'message' => 'Vui lòng nhập số điện thoại']);
        }

        if($customerEmail == '') {
            return response()->json(['code' => 0, 'message' => 'Vui lòng nhập email']);
        }

        $totalMoney = 0;
        foreach($data as $item) {
            if($item['num_seat'] == 0) {
                return response()->json(['code' => 0, 'message' => 'Vui lòng chọn ít nhất một ghế']);
            }
            $trip = $this->trip->getById($item['trip_id']);
            $numSeat = $item['num_seat'];
            $price = $trip->getPrice();
            if($rTripId == $item['trip_id']) {
                $price = $trip->getSalePrice();
            }
            $totalMoney += $price * $numSeat;
        }

        $order = $this->order->create([
            'customer_id'    => $this->loggedUser ? $this->loggedUser->getId() : 0,
            'customer_name'  => $customerName,
            'customer_phone' => $customerPhone,
            'customer_email' => $customerEmail,
            'total_money'    => $totalMoney
        ]);

        // Cập nhật mã đơn hàng
        if($order) {
            $order->code = generate_order_code($order->getId());
            $order->save();

            // Lưu đơn hàng chi tiết
            foreach($data as $item) {
                if($item['num_seat'] == 0) {
                    return response()->json(['code' => 0, 'message' => 'Vui lòng chọn ít nhất một ghế']);
                }
                $trip = $this->trip->getById($item['trip_id']);
                $numSeat = $item['num_seat'];
                $dataSeats = $item['data_seats'];

                $orderDetailId = $this->order->saveOrderDetail([
                    'order_id'    => $order->getId(),
                    'trip_id'     => $trip->getId(),
                    'price'       => $trip->getTruePrice(),
                    'ticket'      => $numSeat,
                    'total_money' => ($trip->getTruePrice() * $numSeat)
                ]);

                // Thực hiện lưu những ghế mà khách đã chọn
                foreach($dataSeats as $info) {
                    $trip->pickedSeat()->create([
                        'order_id'        => $order->getId(),
                        'order_detail_id' => $orderDetailId,
                        'trip_id'         => $trip->getId(),
                        'seat_position_x' => $info['x'],
                        'seat_position_y' => $info['y']
                    ]);
                }
            }

            return response()->json(['code' => 1, 'redirect_uri' => route('order.payment', $order->getId())]);
        }

        return response()->json(['code' => 0]);
    }
}