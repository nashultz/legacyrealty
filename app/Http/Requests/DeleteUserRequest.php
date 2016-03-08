<?php

namespace Legacy\Http\Requests;

use Legacy\Http\Requests\Request;

class DeleteUserRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if($this->route('users') == auth()->user()->id)
        {
            return false;
        }
        if($this->route('users') == 1)
        {
            return false;
        }
        return true;
    }

    public function forbiddenResponse()
    {
        return redirect()->back()->withErrors([
            'error'=>'You are not able to delete this user.'
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }
}
