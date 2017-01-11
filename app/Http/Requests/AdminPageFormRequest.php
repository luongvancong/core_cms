<?php

namespace Nht\Http\Requests;

use Nht\Http\Requests\Request;

class AdminPageFormRequest extends Request
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
            'pag_title' => 'required'
        ];
    }


    public function messages() {
        return [
            'pag_title.required' => 'Vui lòng nhập tiêu đề',
        ];
    }
}
