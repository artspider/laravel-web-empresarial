<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerStoreRequest extends FormRequest
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
            'phone' => ['string', 'max:100'],
            'fav1' => ['string', 'max:100'],
            'fav2' => ['string', 'max:100'],
            'fav3' => ['string', 'max:100'],
            'priority' => ['required', 'integer', 'gt:0'],
        ];
    }
}
