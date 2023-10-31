<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Post::class;


    public function definition(): array
    {
        return [
            'user_id' => $this->faker->numberBetween(1, 3),
            'category_id' => $this->faker->numberBetween(1, 10),
            'title' => $this->faker->text,
        ];
    }
}
