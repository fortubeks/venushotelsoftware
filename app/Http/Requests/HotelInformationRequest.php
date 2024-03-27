<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HotelInformationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'phone' => 'required|numeric|max:11',
            'address' => 'required|string',
            'number_of_rooms' => 'required|numeric',
            'logo' => 'nullable|string|max:2048',
            'website' => 'nullable|url',
            'state_id' => 'required|string',
            'country_id' => 'required|string'
        ];
    }
}
