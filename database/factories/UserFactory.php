<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition()
    {
        return [
            'full_name' => fake()->name(),
            'cc' => fake()->unique()->randomNumber(8),
            'email' =>fake()->unique()->Email(),
        ];
    }
}
