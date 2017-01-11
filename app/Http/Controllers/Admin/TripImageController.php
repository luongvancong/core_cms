<?php

namespace Nht\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Nht\Hocs\Trips\TripRepository;
use Nht\Http\Controllers\Admin\AdminController;
use Nht\Http\Controllers\Controller;

class TripImageController extends AdminController
{
    public function __construct(TripRepository $trip)
    {
        parent::__construct();
        $this->trip = $trip;
        $this->imageUploader = \App::make('ImageFactory');
    }

    public function getIndex($tripId, Request $request)
    {
        $trip = $this->trip->getById($tripId);
        $images = $trip->images()->get();
        return view('admin/trips/images/index', compact('trip', 'images'));
    }

    public function getCreate($tripId, Request $request)
    {
        $trip = $this->trip->getById($tripId);
        return view('admin/trips/images/create', compact('trip'));
    }

    public function postCreate($tripId, Request $request)
    {
        $trip = $this->trip->getById($tripId);
        $images = $this->imageUploader->uploadMulti('images', config('image.array_resize_image'), 'resize');

        if($images['filename']) {
            $this->trip->saveImages($trip, $images['filename']);
        }

        return redirect()->route('admin.trip.images',$trip->getId())->with('success', 'Cập nhật thành công');
    }


    public function getDelete($tripId, $id)
    {
        $trip = $this->trip->getById($tripId);
        $image = $trip->images()->findOrFail($id);
        if($image->delete()) {
            return redirect()->route('admin.trip.images',$trip->getId())->with('success', 'Xóa thành công');
        }

        return redirect()->route('admin.trip.images',$trip->getId())->with('success', 'Xóa không thành công');
    }
}
