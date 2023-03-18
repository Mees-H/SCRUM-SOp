<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MailPostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|regex:/^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.\'-]+$/u|max:255',
            'birthday' => 'required|before:today',
            'email' => 'required|email',
            'phonenumber' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',	
            'address' => ['required'],
            'city' => ['required'],
            'disability' => ['required'],
            'event_id' => ['required']
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Uw naam is verplicht',
            'birthday.required' => 'Uw geboortedatum is verplicht',
            'email.required' => 'Uw email is verplicht',
            'phonenumber.required' => 'Uw telefoonnummer is verplicht',
            'address.required' => 'Uw adres is verplicht',
            'city.required' => 'Uw woonplaats is verplicht',
            'disability.required' => 'Uw beperking is verplicht'
        ];
    }
}
