<?php

namespace MyVisions\Journal\Database\Factories;

use MyVisions\Journal\Models\Article;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{

    protected $model = Article::class;

    public function definition()
    {
        return [
            'title'             => $this->faker->words(3, true),
            'subtitle'          => $this->faker->words(5, true),
            'introduction'      => $this->faker->paragraph(3),
            'content'           => $this->faker->paragraph(10),
            'main_image'        => '/path/to/image',
            'date_published'    => $this->faker->dateTime(),
            'date_published_to' => $this->faker->dateTime(),
            'author_id'         => 999,
        ];
    }
}