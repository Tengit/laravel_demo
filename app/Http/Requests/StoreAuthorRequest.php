<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreAuthorRequest extends FormRequest
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
            'name'       => [
                'required',
                'min:5',
                'max:100',
            ],
            'biography' => [
                'required',
                'min:5',
                'max:200',
            ],
            'birthday'     => [
                'required',
                'date_format:' . config('constants.date_format'),
            ],
            'email' => [
                'required',
                'email',
                'min:5',
                'max:100',
                Rule::unique('authors', 'email')
            ],
        ];
    }
}
