<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePublisherRequest extends FormRequest
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
            'name' =>  [
                'required',
                'min:5',
                'max:50',
            ],
            'address' =>  [
                'required',
                'min:5',
            ],
            'email' => [
                'required',
                'min:5',
                'max:50',
                Rule::unique('publishers', 'email')->ignore($this->publishers)
            ],
        ];
    }
}
