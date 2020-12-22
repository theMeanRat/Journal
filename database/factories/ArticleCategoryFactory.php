<?php

namespace MyVisions\Journal\Database\Factories;

use MyVisions\Journal\Models\ArticleCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleCategoryFactory extends Factory
{
    protected $model = ArticleCategory::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->words(1, true)
        ];
    }
}