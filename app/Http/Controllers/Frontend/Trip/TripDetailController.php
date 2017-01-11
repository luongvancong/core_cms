<?php
/**
 * Created by PhpStorm.
 * User: justin
 * Date: 24/12/16
 * Time: 16:25
 */

namespace Nht\Http\Controllers\Frontend\Trip;


use Illuminate\Http\Request;
use Nht\Hocs\Cars\CarRepository;
use Nht\Hocs\TripOrders\TripOrderRepository;
use Nht\Hocs\Trips\TripRepository;
use Nht\Http\Controllers\FrontendController;

class TripDetailController extends FrontendController
{
    /**
     * @var \Nht\Hocs\Trips\TripRepository
     */
    protected $trip;

    public function __construct(TripRepository $trip, CarRepository $car, TripOrderRepository $order)
    {
        parent::__construct();
        $this->trip = $trip;
        $this->car  = $car;
        $this->order = $order;
    }

    public function getDetail($slug, $id, Request $request)
    {
        $trip = $this->trip->getById($id);
        $startPlace = $trip->startPlace()->first();
        $endPlace = $trip->endPlace()->first();
        $car = $this->car->getById($trip->getCarId());

        // Nhả ghế nếu khách chưa thanh toán
        $this->order->releaseOrderByTripId($id);


        // Các ghế đã chọn
        $dbPickedSeats = $trip->pickedSeat()->get();
        $pickedSeats = [];
        foreach($dbPickedSeats as $seat) {
            $pickedSeats[$seat->seat_position_x.$seat->seat_position_y] = 1;
        }

        // Vị trí các ghế trên khung xe
        $seatCollection = $car->positionSeat()->get();
        $seats = [];
        foreach($seatCollection as $item) {
            $seats[$item->x.$item->y] = $item->seat_type;
        }

        ksort($seats);

        return view('frontend/trip/detail', compact('trip', 'startPlace', 'endPlace', 'car', 'pickedSeats', 'seats'));
    }
}