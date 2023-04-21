<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MailPostEventRequest extends FormRequest
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
            'name' => 'required|max:255',
            'birthday' => 'required|before:today',
            'email' => 'required|email|max:255',
            'phonenumber' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:255',
            'address' => 'required|max:255',
            'city' => 'required|max:255',
            'golfhandicap' => 'nullable|max:255',
            'event_id' => 'required|numeric'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Uw naam is verplicht',
            'name.max' => 'Uw naam mag niet langer zijn dan 255 karakters',
            'birthday.required' => 'Uw geboortedatum is verplicht',
            'birthday.before' => 'Uw geboortedatum mag niet in de toekomst liggen',
            'email.required' => 'Uw email is verplicht',
            'email.email' => 'Uw email is ongeldig',
            'email.max' => 'Uw email mag niet langer zijn dan 255 karakters',
            'phonenumber.required' => 'Uw telefoonnummer is verplicht',
            'phonenumber.regex' => 'Uw telefoonnummer is ongeldig',
            'phonenumber.min' => 'Uw telefoonnummer moet minimaal 10 karakters bevatten',
            'address.required' => 'Uw adres is verplicht',
            'address.max' => 'Uw adres mag niet langer zijn dan 255 karakters',
            'city.required' => 'Uw woonplaats is verplicht',
            'city.max' => 'De naam van uw woonplaats mag niet langer zijn dan 255 karakters',
            'golfhandicap.max' => 'De beschrijving van uw beperking mag niet langer zijn dan 255 karakters',
        ];
    }
}
