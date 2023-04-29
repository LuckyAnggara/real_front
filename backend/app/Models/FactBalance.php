<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FactBalance extends Model
{
    use HasFactory;

    protected $fillable = ['account_no', 'balance'];

    protected $hidden = [
        'id',
        'account_no',
        'created_at',
        'updated_at'
    ];
}
