<?php

namespace App\Http\Requests\Backend\Books;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class MarketingRequest
 */
class BookUpdate extends FormRequest
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
        $rules = [
            'title' => 'required',
            'description' => 'required',
            'price' => 'required',
            'instock' => 'required',
        ];

        if (isset($this->id) && !empty($this->id)) {
            $rules += ['image' => 'mimes:jpeg,bmp,png|max:8000'];
        } else {
            $rules += ['image' => 'required|mimes:jpeg,bmp,png|max:8000'];
        }
        return $rules;
    }

    public function messages()
    {
        return [
            'title' => 'Please enter a book title',
            'description' => 'Please enter a book description',
            'price' => 'Please enter a price of book',
            'instock' => 'Please enter a instock book',
            'image' => 'Please upload images below 7 MB.',
        ];
    }
}