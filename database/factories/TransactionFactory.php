<?php

namespace Database\Factories;

use App\Models\Transaction;
use Illuminate\Database\Eloquent\Factories\Factory;

class TransactionFactory extends Factory
{
    protected $model = Transaction::class;
    public function definition()
    {
        return [
            'type' =>fake()->randomElement(['deposit', 'transfer']),
            'amount' =>fake()->randomFloat(2, 100, 100000),
            'create_date' => fake()->dateTimeBetween('-1 year', 'now'),
            'account_id_origin' => function () {
                return \App\Models\Account::factory()->create()->id;
            },
            'account_id_destination' => function () {
                return \App\Models\Account::factory()->create()->id;
            },
        ];
    }
}
