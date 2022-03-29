<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateBookRequest extends FormRequest
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
            'title' => [
                'required',
                'min:5',
                'max:100',
                Rule::unique('books', 'title')->ignore($this->book)
            ],
            'isbn' => [
                'required',
                'min:5',
                'max:20',
                Rule::unique('books', 'isbn')->ignore($this->book)
            ],
            'category_id' => [
                'required'
            ],
            'publisher_id' => [
                'required'
            ],
            'condition' => [
                'required'
            ],
            'content' => [
                'required',
                'min:5',
            ],
            'num_pages'     => [
                'required',
                'regex:/^(([0-9]*)(\.([0-9]+))?)$/',
            ],
            'quantity'     => [
                'required',
                'regex:/^(([0-9]*)(\.([0-9]+))?)$/',
            ],
            'edition'     => [
                'required',
                'max:2',
                'regex:/^(([0-9]*)(\.([0-9]+))?)$/',
            ],
            'price'     => [
                'required',
                'regex:/^(([0-9]*)(\.([0-9]+))?)$/',
            ],
            'description' => [
                'required'
            ],
            'date_published' => [
                'required',
                'date_format:' . config('constants.date_format'),
            ],
        ];
    }
}
