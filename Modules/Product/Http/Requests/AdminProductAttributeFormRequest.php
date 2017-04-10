<?php

namespace Modules\Product\Http\Requests;

use Nht\Http\Requests\Request;
use DB;

class AdminProductAttributeFormRequest extends Request {

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [
            'name' => 'required'
        ];

        $name = $this->get('name');
        $nameHash = md5($name);

        $exist = DB::table('product_attributes')->where('category_id', $this->id)->where('name_hash', $nameHash)->count();
        if($exist > 0) {
            $rules['name'] .= '|unique:product_attributes,name_hash';

            if($this->attrId > 0) {
                $rules['name'] .= ','.$this->attrId;
            }
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập tên thuộc tính',
            'name.unique'   => 'Thuộc tính này đã tồn tại, vui lòng kiểm tra lại'
        ];
    }
}