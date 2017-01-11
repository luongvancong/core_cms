<?php

namespace Nht\Http\Controllers\Admin;

use App;
use Illuminate\Http\Request;
use Nht\Hocs\Cities\CityRepository;
use Nht\Hocs\Transporters\Address\TransporterAddressRepository;
use Nht\Hocs\Transporters\TransporterRepository;
use Nht\Http\Controllers\Controller;
use Nht\Http\Requests\AdminTransporterAddressFormRequest;
use Nht\Http\Requests\AdminTransporterFormRequest;

class TransporterAddressController extends AdminController
{
    public function __construct(TransporterRepository $transporter, TransporterAddressRepository $transporterAddress, CityRepository $city)
    {
        parent::__construct();
        $this->transporter = $transporter;
        $this->transporterAddress = $transporterAddress;
        $this->city = $city;
    }

    public function getIndex($transporterId)
    {
        $transporter = $this->transporter->getById($transporterId);
        $address = $transporter->_address()->get();
        foreach($address as $addr) {

        }
        return view('admin/transporters/address/index', compact('transporter', 'address'));
    }


    public function getCreate($transporterId, Request $request)
    {
        $transporter = $this->transporter->getById($transporterId);
        $address = $this->transporterAddress->getInstance();
        $cities = $this->city->getCities();
        return view('admin/transporters/address/create', compact('transporter', 'address', 'cities'));
    }


    public function postCreate($transporterId, AdminTransporterAddressFormRequest $request)
    {
        $transporter = $this->transporter->getById($transporterId);
        $data = $request->except(['_token']);
        $data = $this->removeNullValue($data);
        $data['transporter_id'] = $transporterId;

        if($address = $this->transporterAddress->create($data)) {
            return redirect()->route('admin.transporter.address', $transporterId)->with('success', 'Cập nhật thành công');
        }

        return redirect()->route('admin.transporter.address', $transporterId)->with('success', 'Cập nhật ko thành công');
    }
}
