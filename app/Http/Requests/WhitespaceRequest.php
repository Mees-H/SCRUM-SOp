<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WhitespaceRequest extends FormRequest
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
            'name' => ['required', 'max:255', 'regex:/\w+\s\w+/'],
            'date' => ['required', 'after:today'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Uw naam is verplicht.',
            'name.max' => 'Uw naam mag niet langer zijn dan 255 karakters.',
            'name.regex' => 'Uw naam moet uit een voor- en achternaam bestaan.',
            'date.required' => 'De datum is verplicht.',
            'date.after' => 'De datum moet na de datum van vandaag liggen',
        ];
    }
}
