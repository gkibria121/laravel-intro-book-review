<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $creaetdAt =  fake()->dateTimeBetween('-5 years');

        return [
            'book_id' => null,
            'review' => fake()->paragraph,
            'rating' => fake()->numberBetween(1, 5),
            'created_at' =>  $creaetdAt,
            'updated_at' =>  $creaetdAt,
        ];
    }

    public function good(): Factory
    {
        return $this->rateBetween(3, 5);
    }
    public function avg(): Factory
    {
        return $this->rateBetween(2, 3);
    }
    public function bad(): Factory
    {
        return $this->rateBetween(1, 3);
    }

    private function rateBetween(int $min, int $max): Factory
    {
        return $this->state(function (array $attributes) use ($min, $max) {
            return [
                'rating' => fake()->numberBetween($min, $max),
            ];
        });
    }

    public function between(string $from, string $to): Factory
    {
        return $this->state(function (array $attributes) use ($from, $to) {
            $creaetdAt = fake()->dateTimeBetween($from, $to);
            return [
                'created_at' => $creaetdAt,
                'updated_at' => $creaetdAt,
            ];
        });
    }
}
