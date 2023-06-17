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
            'image' => 'required|mimes:jpeg,jpg,png,bmp|max: 2000'
        ];
    }

    public function messages(): array
    {
        return [
            'image.required' => 'Je moet een afbeelding selecteren',
            'image.max' => 'De file moet kleiner dan 2000kb zijn',
            'image.mimes' => 'De file moet een afbeelding zijn (jpeg, jpg, png of bmp)'
        ];
    }
}
