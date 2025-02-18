<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->paragraph(random_int(3, 5)),
            'author' => fake()->paragraph(random_int(1, 3)),
            'created_at' => fake()->dateTimeBetween('-5 years', 'now'),
            'updated_at' => fake()->dateTimeBetween('-5 years', 'now'),
        ];
    }
    public function lastMonths(?int $n = 1): Factory
    {
        return  $this->state(function (array $attributes) use ($n) {
            return [
                'created_at' => fake()->dateTimeBetween("-$n months ", 'now'),
                'updated_at' => fake()->dateTimeBetween('created_at', 'now'),
            ];
        });
    }
}
