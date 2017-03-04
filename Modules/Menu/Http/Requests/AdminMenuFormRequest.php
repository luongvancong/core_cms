<?php

namespace Modules\Menu\Http\Requests;

use Modules\Menu\Repositories\Menu;
use Nht\Http\Requests\Request;

class AdminMenuFormRequest extends Request
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
            'label' => 'required'
        ];

        $type = $this->get('type');

        switch ($type) {
            case Menu::TYPE_CUSTOM:
                $rules['url'] = 'required';
                break;

            default:
                # code...
                break;
        }

        return $rules;
    }
}
