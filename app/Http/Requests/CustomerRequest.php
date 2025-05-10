<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'nullable|email|max:255',
            'identity_number' => 'nullable|string|max:20',
            'address' => 'nullable|string',
            'city_id' => 'nullable|exists:cities,id',
            'district_id' => 'nullable|exists:districts,id',
            'notes' => 'nullable|string',
            'status' => 'required|in:active,inactive',
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Ad Soyad alanı zorunludur.',
            'phone.required' => 'Telefon alanı zorunludur.',
            'email.email' => 'Geçerli bir e-posta adresi giriniz.',
            'city_id.exists' => 'Seçilen il geçerli değil.',
            'district_id.exists' => 'Seçilen ilçe geçerli değil.',
            'status.in' => 'Geçersiz durum değeri.',
        ];
    }
}