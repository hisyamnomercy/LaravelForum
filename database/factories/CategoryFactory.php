<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CategoryFactory extends Factory
{
    protected $model = Category::class;

    public function definition()
    {
        return [
            'title' => $this->faker->name,
            'description' => $this->faker->text,
            'accepts_threads' => 1,
            'thread_count' => 0,
            'post_count' => 0,
            'is_private' => 0,
            'color' => '#007BFF',
        ];
    }
}