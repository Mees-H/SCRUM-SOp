<?php

namespace Database\Factories;

use App\Models\NewsLetter;
use Illuminate\Database\Eloquent\Factories\Factory;

class NewsLetterFactory extends Factory
{
    protected $model = NewsLetter::class;

    public function definition()
    {
        return [
            'date' => $this->faker->date,
            'pdf' => base_path('tests/Browser/TestFile/TestNewsLetter.pdf')
        ];
    }
}
