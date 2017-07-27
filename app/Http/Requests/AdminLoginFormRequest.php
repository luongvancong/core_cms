<?php

namespace Nht\Http\Requests;

use Nht\Http\Requests\Request;

class AdminLoginFormRequest extends Request
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
            'email' => 'required|email',
            'password' => 'required'
        ];
    }

    public function messages()
    {
    	return [
			'email.required'    => trans('admin/validation.email_required'),
			'email.email'       => trans('admin/validation.email_not_email'),
			'password.required' => trans('admin/validation.pwd_required')
    	];
    }
}
