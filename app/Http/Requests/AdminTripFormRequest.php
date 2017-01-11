<?php

namespace Nht\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminTripFormRequest extends FormRequest
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
            'start_place'   => 'required',
            'end_place'     => 'required',
            'start_address' => 'required',
            'end_address'   => 'required',
            'start_date'    => 'required',
            'end_date'      => 'required',
            'price'         => 'required',
            'num_ticket'    => 'required',
            'car_id'        => 'required'
        ];
    }

    public function messages()
    {
        return [
            'start_place.required'   => 'Vui lòng chọn điểm khởi hành',
            'end_place.required'     => 'Vui lòng chọn điểm đến',
            'start_address.required' => 'Vui lòng nhập địa điểm khởi hành',
            'end_address.required'   => 'Vui lòng nhập địa chỉ đến',
            'start_date.required'    => 'Vui lòng nhập ngày,giờ khởi hành',
            'end_date.required'      => 'Vui lòng nhập ngày,giờ đến',
            'price.required'         => 'Vui lòng nhập giá vé',
            'num_ticket.required'    => 'Vui lòng nhập số lượng vé',
            'car_id.required'        => 'Vui lòng chọn xe'
        ];
    }
}
