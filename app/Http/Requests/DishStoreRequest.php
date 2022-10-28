<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DishStoreRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:100'],
            'description' => ['string'],
            'servtime' => ['required', 'integer', 'gt:0'],
            'yield' => ['integer', 'gt:0'],
            'cuisine' => ['string', 'max:100'],
            'price' => ['required', 'numeric', 'between:-99999.99,99999.99'],
            'cost' => ['required', 'numeric', 'between:-99999.99,99999.99'],
            'costpriceratio' => ['required', 'numeric', 'between:-99999.99,99999.99'],
            'mc' => ['required', 'numeric', 'between:-99999.99,99999.99'],
            'profit' => ['required', 'numeric', 'between:-99999.99,99999.99'],
            'deliverycharge' => ['required', 'numeric', 'between:-99999.99,99999.99'],
            'instock' => ['required'],
            'rating' => ['integer', 'gt:0'],
            'slug' => ['string', 'max:100'],
        ];
    }
}
