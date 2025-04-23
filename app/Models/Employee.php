<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'nip',
        'name',
        'status',
        'email',
        'bank_name',
        'bank_account_name',
        'bank_account_number',
    ];
}
