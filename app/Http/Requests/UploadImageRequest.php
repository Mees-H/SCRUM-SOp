<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UploadImageRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */

    public function authorize(): bool
    {
        return true;
    }
     
    public function rules(): array
    {
        return [
            'images' => 'required',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg'
        ];
    }

    public function messages(): array
    {
        return [
            'images.required' => 'Je moet 1 of meer afbeeldingen selecteren',
            'images.*.image' => 'De file(s) moet(en) een afbeelding zijn',
            'images.*.mimes' => 'De afbeelding(en) moet(en) 1 van de volgende extensies zijn: jpeg, png, jpg, gif of svg'
        ];
    }
}
