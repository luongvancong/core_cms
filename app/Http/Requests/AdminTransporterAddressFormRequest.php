<?php

namespace Nht\Http\Requests;

use Nht\Http\Requests\Request;

class AdminTransporterAddressFormRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'         => 'required',
            'city_id'      => 'required',
            'address'      => 'required',
            'phone_ticket' => 'required',
            'phone_shop'   => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required'         => 'Vui lòng nhập tên',
            'city_id.required'      => 'Vui lòng chọn thành phố',
            'address.required'      => 'Vui lòng nhập địa chỉ',
            'phone_ticket.required' => 'Vui lòng nhập số điện thoại đặt vé',
            'phone_shop.required'   => 'Vui lòng nhập số điện thoại đặt hàng'
        ];
    }
}
