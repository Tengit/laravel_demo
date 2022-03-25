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
                Rule::unique('books', 'title')->ignore($this->book)
            ],
            'isbn' => [
                'required',
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
                'required'
            ],
            'num_pages' => [
                'required'
            ],
            'quantity' => [
                'required'
            ],
            'edition' => [
                'required'
            ],
            'description' => [
                'required'
            ],
            'price' => [
                'required'
            ],
            'date_published' => [
                'required',
                'date_format:' . config('constants.date_format'),
            ],
        ];
    }
}
