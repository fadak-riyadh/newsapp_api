<?php

namespace Database\Factories;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'content' => $this->faker->text(400),
            'date_written' => $this->faker->dateTime(),
            'user_id' => $this->faker->numberBetween(1,150),
            'post_id' => $this->faker->numberBetween(1,500),
        ];
    }
}