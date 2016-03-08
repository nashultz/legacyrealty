<?php

namespace Legacy\Http\Requests;

use Legacy\Http\Requests\Request;

class UpdateOfficeRequest extends Request
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
            'name'=>['required'],
            'address'=>['required'],
            'city'=>['required'],
            'state'=>['required'],
            'zip'=>['required']
        ];
    }
}
