<?php

namespace MyVisions\Journal\Database\Factories;

use MyVisions\Journal\Models\Author;
use Illuminate\Database\Eloquent\Factories\Factory;

class AuthorFactory extends Factory
{

    protected $model = Author::class;

    public function definition()
    {
        return [
            'first_name'    => $this->faker->firstName(),
            'last_name'     => $this->faker->lastName,
            'email'         => $this->faker->safeEmail,
            'user_id'       => 999,
        ];
    }
}