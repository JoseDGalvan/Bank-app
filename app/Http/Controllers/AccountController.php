<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;


class AccountController extends Controller
{
    public function show(int $userId): JsonResponse
    {
        $user = User::find($userId);

        $accounts = $user->accounts()->get();
        $data = [];

        foreach ($accounts as $account) {
            $destinationAmount = $account
                ->destinationTransactions()
                ->sum('amount');

            $originAmount = $account
                ->originTransactions()
                ->sum('amount');

            $balance = $destinationAmount - $originAmount;
            $data[] = [
                'account_number' => $account->number,
                'balance' => $balance
            ];
        }

        return response()->json($data);
    }

}
