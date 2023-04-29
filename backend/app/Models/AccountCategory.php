<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountCategory extends Model
{
    use HasFactory;

    public function header()
    {
        return $this->hasOne(AccountHeader::class, 'id', 'header_id');
    }
}
