<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ReviewRecomment>
 */
class ReviewRecommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $created_at = Carbon::now()->subMonth();
        return [
            'review_by' => 1,
            'answer1' => fake()->sentence(),
            'answer2' => fake()->sentence(),
            'answer3' => fake()->sentence(),
            'answer4' => fake()->sentence(),
            'answer5' => fake()->sentence(),
            'answer6' => fake()->sentence(),
            'answer7' => fake()->sentence(),
            'answer8' => fake()->sentence(),
            'answer9' => fake()->sentence(),
            'answer10' => fake()->sentence(),
            'answer11' => fake()->sentence(),
            'answer12' => fake()->sentence(),
            'answer13' => fake()->sentence(),
            'answer14' => fake()->sentence(),
            'answer15' => fake()->sentence(),
            'answer16' => fake()->sentence(),
            'answer17' => fake()->sentence(),
            'answer18' => fake()->sentence(),
            'result' => fake()->word(),
            'score' => fake()->numberBetween(1, 5),
            'comment' => fake()->paragraph(),
            'created_at' => $created_at,
            'updated_at' => $created_at,
        ];
    }
}
