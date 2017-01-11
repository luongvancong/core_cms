<?php

namespace Modules\Post\Http\Requests;

use Nht\Http\Requests\Request;

class AdminPostFormRequest extends Request
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
			'title' => 'required',
			'category_id' => 'required'
		];
	}

	public function messages()
	{
		return [
			'title.required' => 'Vui lòng nhập tiêu đề',
			'category_id.required' => 'Vui lòng chọn danh mục'
		];
	}
}
