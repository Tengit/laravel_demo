<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAdminRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email'=>   [
                'required',
                'email',
                'unique:admin,email'
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
            'email.unique'=>'This email is exists on admin table'
        ];
    }
}
