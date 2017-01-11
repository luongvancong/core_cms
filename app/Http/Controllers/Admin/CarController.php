<?php

namespace Nht\Http\Controllers\Admin;

use App;
use Illuminate\Http\Request;
use Nht\Hocs\Cars\CarRepository;
use Nht\Http\Controllers\Admin\AdminController;
use Nht\Http\Requests;
use Nht\Http\Requests\AdminCarFormRequest;

class CarController extends AdminController
{
    public function __construct(CarRepository $car)
    {
        parent::__construct();
        $this->car = $car;
        $this->imageUploader = App::make('ImageFactory');
    }

    public function getIndex(Request $request)
    {
        $cars = $this->car->getCars(20, $request->all(), $request->all());
        return view('admin/car/index', compact('cars'));
    }


    public function getCreate(Request $request)
    {
        $car = $this->car->getInstance();
        return view('admin/car/create', compact('car'));
    }


    public function postCreate(AdminCarFormRequest $request)
    {
        $data = $request->except(['_token', 'image']);
        $data = $this->removeNullValue($data);
        $data = $this->parseData($data, $request);

        if($car = $this->car->create($data)) {
            return redirect()->route('admin.car.index')->with('success', 'Cập nhật thành công');
        }

        return redirect()->route('admin.car.index')->with('success', 'Cập nhật ko thành công');
    }


    public function getEdit($id, Request $request)
    {
        $car = $this->car->getById($id);
        return view('admin/car/edit', compact('car'));
    }


    public function postEdit($id, AdminCarFormRequest $request)
    {
        $car = $this->car->getById($id);

        $data = $request->except(['_token', 'image']);
        $data = $this->removeNullValue($data);
        $data = $this->parseData($data, $request);

        if($this->car->update($data, ['id' => $id])) {
            return redirect()->route('admin.car.index')->with('success', 'Cập nhật thành công');
        }

        return redirect()->route('admin.car.index')->with('success', 'Cập nhật ko thành công');
    }


    public function getDelete($id)
    {
        $car = $this->car->getById($id);
        if($car->delete()) {
            return redirect()->route('admin.car.index')->with('success', 'Xóa thành công');
        }

        return redirect()->route('admin.car.index')->with('success', 'Xóa ko thành công');
    }


    private function parseData(array $data, $request) {
        if($request->hasFile('image')) {
            $resultUpload = $this->imageUploader->upload('image', config('image.array_resize_image'), 'resize');
            if($resultUpload['status'] > 0) {
                $data['image'] = $resultUpload['filename'];
            }
        }

        return $data;
    }


    public function getPositionSeat($id)
    {
        $car = $this->car->getById($id);
        $seatCollection = $car->positionSeat->all();
        $seats = [];
        foreach($seatCollection as $item) {
            $seats[$item->x.'_'.$item->y] = $item->seat_type;
        }

        return view('admin/car/position_seat', compact('car', 'seatCollection', 'seats'));
    }


    public function postPositionSeat($carId, Request $request)
    {
        $car  = $this->car->getById($carId);
        $x    = (int) $request->get('x');
        $y    = (int) $request->get('y');
        $type = (int) $request->get('type');
        $action = clean($request->get('action'));

        $seat = $car->positionSeat()
                    ->where('car_id', $carId)
                    ->where('x', $x)
                    ->where('y', $y)
                    ->first();

        if($action == 'cancel') {
            $seat->delete();
            return response()->json(['code' => 2, 'action' => $action]);
        }

        if($seat) {
            $seat->seat_type = $type;
            $seat->save();
            return response()->json(['code' => 1, 'message' => 'ok', 'type' => $type]);
        }

        $data = [
            'x'         => $x,
            'y'         => $y,
            'seat_type' => $type
        ];

        if($seat = $car->positionSeat()->create($data)) {
            return response()->json(['code' => 1, 'id' => $seat->id, 'type' => $type]);
        }

        return response()->json(['code' => 0]);
    }
}