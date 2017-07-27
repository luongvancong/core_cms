<?php

namespace Modules\User\Http\Requests;

use Nht\Http\Requests\Request;

class AdminProfileChangePasswordFormRequest extends Request
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
        $rules = [
            'old_password'    => 'required',
            'new_password'    => 'required|min:8',
            'repeat_password' => 'required|same:new_password'
        ];

        return $rules;
    }
}