<?php

namespace Nht\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Nht\Hocs\Trips\TripRepository;
use Nht\Hocs\Trips\Schedule\ScheduleRepository as TripScheduleRepository;
use Nht\Http\Controllers\Admin\AdminController;
use Nht\Http\Controllers\Controller;
use Nht\Http\Requests\AdminTripScheduleFormRequest;

class TripScheduleController extends AdminController
{
    public function __construct(TripRepository $trip, TripScheduleRepository $schedule)
    {
        parent::__construct();
        $this->trip = $trip;
        $this->schedule = $schedule;
    }

    public function getIndex($tripId, Request $request)
    {
        $trip = $this->trip->getById($tripId);
        $schedules = $trip->schedule()->get();

        return view('admin/trips/schedule/index', compact('trip', 'schedules'));
    }

    public function getCreate($tripId, Request $request)
    {
        $trip = $this->trip->getById($tripId);
        $schedule = $this->schedule->getInstance();
        return view('admin/trips/schedule/create', compact('trip', 'schedule'));
    }

    public function postCreate($tripId, AdminTripScheduleFormRequest $request)
    {
        $trip = $this->trip->getById($tripId);
        $data = $request->except(['_token']);
        $data = $this->removeNullValue($data);
        $data['trip_id'] = $tripId;

        if($schedule = $this->schedule->create($data)) {
            return redirect()->route('admin.trip.schedule', $trip->getId())->with('success', 'Cập nhật thành công');
        }

        return redirect()->route('admin.trip.schedule', $trip->getId())->with('error', 'Cập nhật ko thành công');
    }


    public function getEdit($tripId, $id, Request $request)
    {
        $trip = $this->trip->getById($tripId);
        $schedule = $this->schedule->getById($id);
        return view('admin/trips/schedule/edit', compact('trip', 'schedule'));
    }

    public function postEdit($tripId, $id, Request $request)
    {
        $trip = $this->trip->getById($tripId);
        $data = $request->except(['_token']);
        $data = $this->removeNullValue($data);
        $data['trip_id'] = $tripId;

        if($this->schedule->update($data, ['id' => $id])) {
            return redirect()->route('admin.trip.schedule', $trip->getId())->with('success', 'Cập nhật thành công');
        }

        return redirect()->route('admin.trip.schedule', $trip->getId())->with('error', 'Cập nhật ko thành công');
    }

    public function getDelete($tripId, $id)
    {
        $trip = $this->trip->getById($tripId);
        $schedule = $this->schedule->getById($id);
        if($schedule->delete()) {
            return redirect()->route('admin.trip.schedule', $trip->getId())->with('success', 'Xóa thành công');
        }

        return redirect()->route('admin.trip.schedule', $trip->getId())->with('error', 'Xóa ko thành công');
    }
}
