<?php

namespace App\Http\Requests\HotelUser;

use Illuminate\Foundation\Http\FormRequest;

class CreateHotelUserRequest extends FormRequest
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
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users'],
            'role' => 'required',
            'phone' => 'nullable|numeric|digits:11',
            'photo' => 'nullable|max:2048',
            'address' => 'nullable|string|max:255',
            'password' => 'required|string|min:8'
        ];
    }
}
