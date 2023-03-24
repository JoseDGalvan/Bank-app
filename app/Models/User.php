<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'cc',
        'email',
    ];

    public function accounts()
    {
        return $this->hasMany(Account::class);
    }
}
