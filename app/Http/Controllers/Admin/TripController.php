<?php

namespace Nht\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Nht\Hocs\Cars\CarRepository;
use Nht\Hocs\Cities\CityRepository;
use Nht\Hocs\Trips\TripRepository;
use Nht\Http\Controllers\Admin\AdminController;
use Nht\Http\Controllers\Controller;
use Nht\Http\Requests\AdminTripFormRequest;

class TripController extends AdminController
{

    protected $trip;

    public function __construct(TripRepository $trip, CityRepository $city, CarRepository $car)
    {
        parent::__construct();
        $this->trip = $trip;
        $this->city = $city;
        $this->car  = $car;
    }

    public function getIndex(Request $request)
    {
        $trips = $this->trip->getTrips(20, $request->all(), ['updated_at' => 'DESC'], true);
        return view('admin/trips/index', compact('trips'));
    }

    public function getCreate(Request $request)
    {
        $trip = $this->trip->getInstance();
        $cities = $this->city->getCities();
        $cars   = $this->car->getAll();
        return view('admin/trips/create', compact('trip', 'cities', 'cars'));
    }

    public function postCreate(AdminTripFormRequest $request)
    {
        $data = $request->except(['_token']);
        $data = $this->removeNullValue($data);
        if($trip = $this->trip->create($data)) {
            return redirect()->route('admin.trip.index')->with('success', 'Cập nhật thành công');
        }
        return redirect()->route('admin.trip.index')->with('error', 'Cập nhật ko thành công');
    }


    public function getEdit($id, Request $request)
    {
        $trip = $this->trip->getById($id);
        $cities = $this->city->getCities();
        $cars   = $this->car->getAll();
        return view('admin/trips/edit', compact('trip', 'cities', 'cars'));
    }


    public function postEdit($id, AdminTripFormRequest $request)
    {
        $data = $request->except(['_token']);
        $data = $this->removeNullValue($data);
        if($this->trip->update($data, ['id' => $id])) {
            return redirect()->route('admin.trip.index')->with('success', 'Cập nhật thành công');
        }
        return redirect()->route('admin.trip.index')->with('error', 'Cập nhật ko thành công');
    }


    public function getActive($id, Request $request)
    {
        $trip = $this->trip->getById($id);
        $trip->active = !$trip->active;
        $trip->save();
        return response()->json(['code' => 1, 'status' => $trip->active]);
    }

    public function getDelete($id, Request $request)
    {
        $trip = $this->trip->getById($id);
        if($trip->delete()) {
            return redirect()->route('admin.trip.index')->with('success', 'Xóa thành công');
        }

        return redirect()->route('admin.trip.index')->with('error', 'Xóa ko thành công');
    }
}
