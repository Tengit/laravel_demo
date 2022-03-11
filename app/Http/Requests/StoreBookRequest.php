<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreBookRequest extends FormRequest
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
            'title' => ['required', Rule::unique('books', 'title')],
            'isbn' => ['required', Rule::unique('books', 'isbn')],
            'category_id' => 'required',
            'publisher_id' => 'required',
            'condition' => 'required',
            'content' => 'required',
            'num_pages' => 'required',
            'quantity' => 'required',
            'edition' => 'required',
            'description' => 'required',
            'price' => 'required',
            'date_published' => 'required',
        ];
    }
}
