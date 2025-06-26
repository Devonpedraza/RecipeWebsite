<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\recipes>
 */
class RecipesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'Title' => $this->faker->sentence(),
            'Description' => $this->faker->sentence(),
            'Cook_Time' => $this->faker->numberBetween(10, 120),
            'Prep_Time' => $this->faker->numberBetween(5, 60),
            'Image' => $this->faker->imageUrl(640, 480, 'food'),
            'Ingredients' => $this->faker->text(500),
            'Instructions' => $this->faker->text(800),
        ];
    }
}
