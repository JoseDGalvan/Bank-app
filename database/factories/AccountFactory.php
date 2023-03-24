<?php

namespace Database\Factories;

use App\Models\Account;
use Illuminate\Database\Eloquent\Factories\Factory;


class AccountFactory extends Factory
{
    protected $model = Account::class;

    public function definition()
    {
        return [
            'number' => fake()->unique()->randomNumber(8),
            'user_id' => function () {
                return \App\Models\User::factory()->create()->id;
            },
        ];
    }
}
