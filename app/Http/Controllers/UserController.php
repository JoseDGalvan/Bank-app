<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index(): \Illuminate\Http\JsonResponse
    {
        $user = \App\Models\User::all();
        return response()->json($user);
    }

    public function show(int $userId): \Illuminate\Http\JsonResponse
    {
        $user = User::find($userId);
        return response()->json($user);
    }

    public function create(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'full_name' => 'required|string',
            'cc' => 'required|numeric|unique:users',
            'email' => 'required|email|unique:users',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()], 400);
        }

        $user = User::create([
            'full_name' => $request->input('full_name'),
            'cc' => $request->input('cc'),
            'email' => $request->input('email')
        ]);

        $account = Account::create([
            'number' => microtime(),
            'user_id' => $user->id
        ]);

        return response()->json($user, 201);
    }

    public function residue(int $userId): JsonResponse
    {
        $user = User::find($userId);
        $accounts = $user->accounts()->get();
        $totalBalance = 0;

        foreach ($accounts as $account) {
            $destinationAmount = $account->destinationTransactions()->sum('amount');
            $originAmount = $account->originTransactions()->sum('amount');
            $balance =  $destinationAmount - $originAmount;
            $totalBalance += $balance;
        }

        $data = [
            'total_balance' => $totalBalance
        ];

        return response()->json($data);
    }
}
