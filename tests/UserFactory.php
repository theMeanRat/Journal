<?php

namespace MyVisions\Journal\Tests;

use Orchestra\Testbench\Factories\UserFactory as TestbenchUserFactory;

class UserFactory extends TestbenchUserFactory
{
    protected $model = User::class;

    public function definition()
    {
        return [
            'username' => $this->faker->userName,
            'email' => $this->faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'user_type' => 'Fake/User',
            'password' => bcrypt('password'),
            'remember_token' => \Illuminate\Support\Str::random(10)
        ];
    }
}