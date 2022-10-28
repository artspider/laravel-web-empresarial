<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RecipebaseUpdateRequest extends FormRequest
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
            'recipe_id' => ['required', 'integer', 'exists:recipes,id'],
            'qty' => ['required', 'numeric', 'between:-99999.99,99999.99'],
            'qtyleft' => ['required', 'numeric', 'between:-99999.99,99999.99'],
            'waste' => ['integer', 'gt:0'],
            'status' => ['integer', 'gt:0'],
        ];
    }
}
