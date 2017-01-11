<?php

namespace Nht\Http\Requests;

use Nht\Http\Requests\Request;

class AdminProductFormRequest extends Request
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
			'name' => 'required'
		];

      return $rules;
	}

	public function messages()
	{
		$messages = [
			'name.required' => 'Vui lòng nhập tên sản phẩm'
		];

		return $messages;
	}
}
