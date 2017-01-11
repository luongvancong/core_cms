<?php

namespace Nht\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TripOrderFormRequest extends FormRequest
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
            'trip_id'        => 'required',
            'num_seat'       => 'required',
            'data_seats'     => 'required',
            'customer_name'  => 'required',
            'customer_phone' => 'required',
            'customer_email' => 'required|email'
        ];
    }


    public function messages()
    {
        return [
            'trip_id.required'        => 'ID chuyến xe là bắt buộc',
            'num_seat.required'       => 'Vui lòng chọn ít nhất một ghế',
            'data_seats.required'     => 'Vui lòng chọn ít nhất một ghế',
            'customer_name.required'  => 'Vui lòng nhập tên khách hàng',
            'customer_phone.required' => 'Vui lòng nhập số điện thoại khách hàng',
            'customer_email.required' => 'Vui lòng nhập email khách hàng',
            'customer_email.email'    => 'Vui lòng nhập đúng định dạng email'
        ];
    }
}
