<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Album>
 */
class AlbumFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition(): array
    {
        return [
            'id' => $this->faker->unique()->numberBetween(1, 1000), // 'id' => 1,
            'title' => $this->faker->sentence,
            'description' => $this->faker->text(100),
            'date' => $this->faker->date,
        ];
    }
}
