<?php

namespace Database\Factories;

use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'content' => $this->faker->paragraph(),
            'owner' => $this->faker->name(),
            'article_id' => Article::inRandomOrder()->first()->id,
            // For more realistic data, every comment is assigned to a random article so there is a different number of comments for each article.
        ];
    }
}
