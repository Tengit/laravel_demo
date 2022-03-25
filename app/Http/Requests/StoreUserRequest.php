<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'name'=> [
                'required',
                'max:200'
            ],
            'fullname'=> [
                'required',
                'max:200'
            ],
            'email'=>   [
                'required',
                'email',
                'max:100',
                'unique:users,email'
            ],
            'password'=> [
                'required',
                'min:5',
                'max:30'
            ],
        ];
    }

    public function messages()
    {
        return [
            'email.exists'=>'This email is not exists on users table'
        ];
    }
    public function passedValidation()
    {
        $this->merge([
            'role_id' =>  config('constants.role_user'),
            'created_by' =>  config('constants.role_user'),
            'modified_by' =>  config('constants.role_user'),
        ]);
    }
}
