<?php

namespace Nht\Http\Requests;

use Nht\Http\Requests\Request;

class AdminCarFormRequest extends Request
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
            'name' => 'required',
            'seat' => 'required',
        ];
    }


    public function messages() {
        return [
            'name.required' => 'Vui lòng nhập tên',
            'seat.required' => 'Vui lòng nhập số ghế',
        ];
    }
}
