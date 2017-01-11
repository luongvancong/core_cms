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

class TripChoiceSeatController extends FrontendController
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

    /**
     * [getDetail description]
     * @param  Request $request
     * @return mixed
     */
    public function getDetail(Request $request)
    {
        $id = (int) $request->get('trip_id');
        $rId = (int) $request->get('rtrip_id');

        $trip = $this->trip->getById($id);


        $startPlace = $trip->startPlace()->first();
        $endPlace = $trip->endPlace()->first();
        $car = $this->car->getById($trip->getCarId());

        // Nhả ghế nếu khách chưa thanh toán
        $this->order->releaseOrderByTripId($id);
        $this->order->releaseOrderByTripId($rId);

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

        $typeStr = 'normal';

        // View normal
        $tplTrip = view('frontend/trip/detail/item', compact('trip', 'car' ,'startPlace', 'endPlace', 'pickedSeats', 'seats', 'typeStr'));


        // Reverse trip
        if($rId) {
            $reverseTrip = [];
            $reverseTrip['trip'] = $this->trip->getById($rId);
            $reverseTrip['startPlace'] = $reverseTrip['trip']->startPlace()->first();
            $reverseTrip['endPlace'] = $reverseTrip['trip']->endPlace()->first();
            $reverseTrip['car'] = $this->car->getById($reverseTrip['trip']->getCarId());

            // Nhả ghế nếu khách chưa thanh toán
            $this->order->releaseOrderByTripId($rId);

            // Các ghế đã chọn
            $dbPickedSeats = $reverseTrip['trip']->pickedSeat()->get();
            $reverseTrip['pickedSeats'] = [];
            foreach($dbPickedSeats as $seat) {
                $reverseTrip['pickedSeats'][$seat->seat_position_x.$seat->seat_position_y] = 1;
            }

            // Vị trí các ghế trên khung xe
            $seatCollection = $reverseTrip['car']->positionSeat()->get();
            $reverseTrip['seats'] = [];
            foreach($seatCollection as $item) {
                $reverseTrip['seats'][$item->x.$item->y] = $item->seat_type;
            }

            ksort($reverseTrip['seats']);

            // Html view reverse trip
            $tplReverseTripItem = view('frontend/trip/detail/item', [
                'trip'        => $reverseTrip['trip'],
                'startPlace'  => $reverseTrip['startPlace'],
                'endPlace'    => $reverseTrip['endPlace'],
                'car'         => $reverseTrip['car'],
                'pickedSeats' => $reverseTrip['pickedSeats'],
                'seats'       => $reverseTrip['seats'],
                'typeStr'     => 'reverse'
            ]);
        }

        $hasReverseTrip = isset($reverseTrip) ? true : false;

        return view('frontend/trip/detail', compact('trip', 'reverseTrip' ,'startPlace', 'endPlace', 'car', 'pickedSeats', 'seats', 'tplReverseTripItem', 'tplTrip', 'hasReverseTrip'));
    }
}