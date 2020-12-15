<?php

namespace MyVisions\Journal\Database\Factories;

use MyVisions\Journal\Models\Author;
use Illuminate\Database\Eloquent\Factories\Factory;
use MyVisions\Journal\Tests\User;

class AuthorFactory extends Factory
{

    protected $model = Author::class;

    public function definition()
    {
        $user = User::factory()->create();

        return [
            'first_name'    => $this->faker->firstName(),
            'last_name'     => $this->faker->lastName,
            'email'         => $this->faker->safeEmail,
            'user_id'       => $user->id,
            'user_type'     => get_class($user)
        ];
    }
}