<?php
/**
 * Created by PhpStorm.
 * User: justin
 * Date: 24/12/16
 * Time: 15:08
 */

namespace Nht\Http\Controllers\Frontend\Trip;


use Illuminate\Http\Request;
use Nht\Hocs\Cities\CityRepository;
use Nht\Hocs\Trips\TripRepository;
use Nht\Http\Controllers\FrontendController;

class TripFilterController extends FrontendController
{
    /**
     * @var \Nht\Hocs\Trips\TripRepository
     */
    protected $trip;

    public function __construct(TripRepository $trip, CityRepository $city)
    {
        parent::__construct();
        $this->trip = $trip;
        $this->city = $city;
    }

    public function getIndex(Request $request) {
        $trips = $this->trip->getTrips(50, $this->getFilterParams($request), $this->getSortParams($request));
        $page = (int) $request->get('page', 1);

        $startPlaceId = (int) $request->get('start_place');
        $endPlaceId = (int) $request->get('end_place');
        // Có 2 chiều không?
        $isTwoWay = (int) $request->get('two_way');

        // Kiểm tra có điểm đến và điểm đi không
        $hasPlace = false;
        if($startPlaceId > 0 && $endPlaceId > 0) {
            $hasPlace = true;
            $startPlace = $this->city->getById($startPlaceId);
            $endPlace = $this->city->getById($endPlaceId);
        }

        // Giờ khởi hành các chuyến
        // Danh sách điểm xuất phát hiện có
        $filterData = $this->trip->getFilterData();
        $startTimeOptions = $filterData['start_time_options'];
        $startPlaceOptions = $filterData['start_place_options'];
        $endPlaceOptions = $filterData['end_place_options'];

        // Nếu có chọn hai chiều thì show thêm các chuyến ở chiều ngược lại
        if($isTwoWay) {
            $reverseTrips = $this->trip->getTrips(50, [
                'start_place' => $endPlaceId,
                'end_place'   => $startPlaceId
            ], []);
        }

        return view('frontend/trip/index', compact('trips', 'reverseTrips' ,'page', 'hasPlace', 'startPlace', 'endPlace', 'startTimeOptions', 'startPlaceOptions', 'endPlaceOptions'));
    }

    public function getFilterParams(Request $request)
    {
        $requestData = $request->all();
        $requestData['start_date'] = date('Y-m-d 00:00:00');
        $startHour = clean($request->get('start_hour'));
        $startDate = clean($request->get('start_date'));
        if($startHour && $startDate) {
            $startDate = $startDate . ' ' . $startHour;
        }

        if($startDate) {
            $requestData['start_date'] = $startDate;
            $requestData['end_date'] = date('Y-m-d 23:59:59', strtotime($startDate) + 86399);
        }

        return $requestData;
    }

    public function getSortParams(Request $request)
    {
        return ['price' => 'ASC'];
    }
}