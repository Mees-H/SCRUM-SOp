<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuestionPostRequest extends FormRequest
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
            'email' => 'required|email|max:255',
            'question' => 'required|max:500'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Uw naam is verplicht',
            'name.max' => 'Uw naam mag niet langer zijn dan 255 karakters',
            'email.required' => 'Uw email is verplicht',
            'email.email' => 'Uw email is ongeldig',
            'email.max' => 'Uw email mag niet langer zijn dan 255 karakters',
            'question.required' => 'Het invoeren van de vraag is verplicht',
            'question.max' => 'Uw vraag mag niet langer zijn dan 500 karakters',
        ];
    }
}