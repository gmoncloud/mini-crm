<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostPropertyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name'             => 'required|string|max:255',
            'property_type_id' => 'required|numeric',
            'slug'             => 'required|string',
            'bedrooms'         => 'required|numeric',
            'bathrooms'        => 'required|numeric',
            'size'             => 'required|numeric',
            'description'      => 'required|string',
            'price'            => 'required|numeric',
            'currency'         => 'required|string',
            'tenure'           => 'required|numeric',
            'addressable_type' => 'required|string',
            'city'             => 'required|string',
            'country'          => 'required|string',
            'postcode'        => 'required|string',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'property_type_id.required' => 'The property type is required',
        ];
    }
}
