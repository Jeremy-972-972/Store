<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = fake()->words(7, true);
        return [
            'name' => fake()->words() ,//créer des mots au pif
            'image' => fake()->imageURL(640,480 , $name , true),//créer des images
        ];
    }
}
