<?php

namespace App\Http\Requests\HotelRoom;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ReservationRequest extends FormRequest
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
            'email' => ['required_if:phone,null', Rule::unique('guests')->whereNot('email',null)->where('hotel_id',auth()->user()->hotel_id) ],
            'phone' => ['required_if:email,null', Rule::unique('guests')->whereNot('phone',null)->where('hotel_id',auth()->user()->hotel_id) ],
            'address' => 'nullable|string|max:255',
            'rate' => 'required|numeric',
            'checkin_date' => 'required|date',
            'checkout_date' => 'required|date',
        ];
    }
}
