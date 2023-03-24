<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Account;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run(): void
    {
        $clientJ = User::create([
            'full_name' => 'Jose',
            'cc' => '1000067908',
            'email' => 'jose@gmail.com'
        ]);

        $clientS = User::create([
            'full_name' => 'Samuel',
            'cc' => '1001117908',
            'email' => 'samue@gmail.com'
        ]);

        $clientK = User::create([
            'full_name' => 'Kevo',
            'cc' => '1004567000',
            'email' => 'Kevo@gmail.com'
        ]);

        $clientKa = User::create([
            'full_name' => 'Karen',
            'cc' => '1000567000',
            'email' => 'Karen@gmail.com'
        ]);

        $accountJ = Account::create([
            'number' => '10050053000',
            'user_id' => $clientJ->id
        ]);

        $accountS = Account::create([
            'number' => '10023003000',
            'user_id' => $clientS->id
        ]);

        $accountK = Account::create([
            'number' => '20020903000',
            'user_id' => $clientK->id
        ]);

        $accountKa = Account::create([
            'number' => '30020703000',
            'user_id' => $clientKa->id
        ]);
        //Deposito inicial $100.000.000
        Transaction::create([
            'type' => 'deposit',
            'amount' => 100_000_000,
            'account_id_origin' => null,
            'account_id_destination' => $accountJ->id
        ]);

        //Deposito de José  a kevo ($35.500.000)
        Transaction::create([
            'type' => 'deposit',
            'amount' => 35_500_000,
            'account_id_origin' => $accountJ->id,
            'account_id_destination' => $accountK->id
        ]);

        //Deposito de José a Samuel
        Transaction::create([
            'type' => 'deposit',
            'amount' => 15_500_000,
            'account_id_origin' => $accountJ->id,
            'account_id_destination' => $accountS->id
        ]);

        // Suponiendo que José es un banquero del Bank J.D GALVÁN
        //Retiro de Karen a Banco
        Transaction::create([
            'type' => 'withdrawal',
            'amount' => 20_000_000,
            'account_id_origin' => $accountKa->id,
            'account_id_destination' => $accountJ->id

        ]);
    }
}
