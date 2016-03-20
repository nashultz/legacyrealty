<?php

namespace Legacy\Http\Requests;

use Legacy\Http\Requests\Request;

class UpdateUserRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if($this->route('users') == 0)
        {
            return false;
        }
        return true;
    }

    public function forbiddenResponse()
    {
        return redirect()->back()->withErrors([
            'error'=>'You are not able to edit this user.'
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
            'name'=>['required'],
            'email'=>['email', 'required', 'unique:users,email,'.$this->route('users')],
            'password'=>['required_with:password_confirmation','confirmed']
        ];
    }
}
