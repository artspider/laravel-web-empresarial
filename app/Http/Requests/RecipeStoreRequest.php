<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RecipeStoreRequest extends FormRequest
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
            'recipecategory_id' => ['required', 'integer', 'exists:recipecategories,id'],
            'unit_id' => ['required', 'integer', 'exists:units,id'],
            'name' => ['required', 'string', 'max:100'],
            'description' => ['string'],
            'preptime' => ['integer', 'gt:0'],
            'cooktime' => ['integer', 'gt:0'],
            'totaltime' => ['integer', 'gt:0'],
            'recipeyield' => ['string'],
            'diet' => ['in:DiabeticDiet,GlutenFreeDiet,HalalDiet,HinduDiet,KosherDiet,LowCalorieDiet,LowFatDiet,LowLactoseDiet,LowSaltDiet,VeganDiet,VegetarianDiet'],
            'cuisine' => ['string', 'max:100'],
            'price' => ['required', 'numeric', 'between:-99999.99,99999.99'],
            'cost' => ['required', 'numeric', 'between:-99999.99,99999.99'],
            'costpriceratio' => ['required', 'numeric', 'between:-99999.99,99999.99'],
            'mc' => ['required', 'numeric', 'between:-99999.99,99999.99'],
            'profit' => ['required', 'numeric', 'between:-99999.99,99999.99'],
            'deliverycharge' => ['required', 'numeric', 'between:-99999.99,99999.99'],
            'instock' => ['required'],
            'slug' => ['required', 'string', 'max:100'],
        ];
    }
}
