<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountHeader extends Model
{
    use HasFactory;

    public function child()
    {
        return $this->hasMany(AccountCategory::class, 'header_id', 'id');
    }
}
