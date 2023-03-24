<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable = [
        'type',
        'amount',
        'account_id_origin',
        'account_id_destination',
    ];



    public function originAccount()
    {
        return $this->belongsTo(Account::class, 'account_id_origin');
    }

    public function destinationAccount()
    {
        return $this->belongsTo(Account::class, 'account_id_destination');
    }
}
