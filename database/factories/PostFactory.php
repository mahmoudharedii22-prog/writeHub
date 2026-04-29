<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'title' => $this->faker->sentence(),
            'content' => $this->faker->paragraphs(3, true),
            'image' => null,
            'status' => $this->faker->randomElement(['draft', 'published']),
            'visibility' => $this->faker->randomElement(['public', 'private', 'followers']),
            'likes_count' => 0,
            'comments_count' => 0,
            'edited_at' => null,
            'published_at' => now(),
        ];
    }
}
