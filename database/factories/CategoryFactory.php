<?php

namespace Database\Factories;

use Faker\Guesser\Name;
use Illuminate\Support\Str;
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
        $categoryName = fake()->sentence(rand(1,3), false);
        return [
            "name" => $categoryName,
            "slug" => Str::slug($categoryName)
        ];
    }
}
