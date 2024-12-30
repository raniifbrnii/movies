<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Genre;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Movie>
 */
class MovieFactory extends Factory
{
    public function definition()
    {
        return [
            'id' => Str::uuid(),
            'title' => $this->faker->sentence(3),
            'synopsis' => $this->faker->paragraph(),
            'poster' => $this->faker->imageUrl(),
            'year' => $this->faker->year(),
            'available' => $this->faker->boolean(),
            'genre_id' => Genre::inRandomOrder()->first()->id ?? Str::uuid(),
        ];
    }
}
