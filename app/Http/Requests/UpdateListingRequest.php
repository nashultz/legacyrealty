<?php

namespace Legacy\Http\Requests;

use Legacy\Http\Requests\Request;

class UpdateListingRequest extends Request
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
            'status_id'=>['required'],
            'title'=>['required'],
            'summary'=>['required'],
            'description'=>['required'],
            'address'=>['required'],
            'city_id'=>['required'],
            'county_id'=>['required'],
            'state_id'=>['required'],
            'zipcode'=>['required'],
            'type_id'=>['required'],
            'subtype_id'=>['required'],
            'price'=>['required']
        ];
    }
}
