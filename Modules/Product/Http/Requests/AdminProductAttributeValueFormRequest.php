<?php

namespace Modules\Product\Http\Requests;

use Nht\Http\Requests\Request;
use DB;

class AdminProductAttributeValueFormRequest extends Request {

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [
            'value' => 'required'
        ];

        $value = $this->get('value');

        $exist = DB::table('product_attribute_values')->where('attribute_id', $this->attrId)->where('value', $value)->count();
        if($exist > 0) {
            $rules['value'] .= '|unique:product_attribute_values,value';

            if($this->valueId > 0) {
                $rules['value'] .= ','.$this->valueId;
            }
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'value.required' => 'Vui lòng nhập giá trị thuộc tính',
            'value.unique'   => 'Giá trị này đã tồn tại, vui lòng kiểm tra lại'
        ];
    }
}