<?php

namespace Nht\Http\Controllers\Frontend\Home;

use Illuminate\Http\Request;
use Nht\Hocs\Trips\TripRepository;
use Nht\Http\Controllers\FrontendController;

class HomeController extends FrontendController
{
    /**
     * [$trip description]
     * @var \Nht\Hocs\Trips\TripRepository
     */
    protected $trip;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(TripRepository $trip)
    {
        parent::__construct();
        $this->trip = $trip;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        $cities = city_get_city_options();

        // Trips
        $filter = ['start_date' => date('Y-m-d 00:00:00')];
        $trips = $this->trip->getTrips(10, $filter, array());

        return view('frontend/home/index', compact('cities', 'trips'));
    }
}
