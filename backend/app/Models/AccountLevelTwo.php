<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountLevelTwo extends Model
{
    use HasFactory;

    protected $appends = ['level'];

    public function getLevelAttribute()
    {
        return 2;
    }
    public function tax()
    {
        return $this->hasOne(Tax::class, 'id', 'tax_id');
    }

    public function category()
    {
        return $this->hasOne(AccountCategory::class, 'id', 'category_id');
    }
}
