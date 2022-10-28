<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderUpdateRequest extends FormRequest
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
            'customer_id' => ['required', 'integer', 'exists:customers,id'],
            'user_id' => ['required', 'integer', 'exists:users,id'],
            'deliveryguy' => ['string', 'max:100'],
            'deliverytime' => ['integer', 'gt:0'],
            'table' => ['integer', 'gt:0'],
            'note' => ['required', 'string'],
            'payed' => ['required'],
            'total' => ['required', 'numeric', 'between:-999999.99,999999.99'],
        ];
    }
}
