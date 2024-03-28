<?php

namespace App\Http\Requests\HotelUser;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateHotelUserRequest extends FormRequest
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
        $userId = $this->route('id');
        return [
            'name' => 'required|string|max:255',
            // 'email' => [
            //     'required',
            //     'string',
            //     'email',
            //     'max:255',
            //     Rule::unique('users', 'email')->ignore($userId),
            // ],
            'role' => 'required',
            'phone' => 'nullable|numeric|digits:11',
            'photo' => 'nullable|max:2048',
            'address' => 'nullable|string|max:255',
            // 'password' => 'required|string|min:8'
        ];
    }
}
