<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountLevelOne extends Model
{
    use HasFactory;

    protected $fillable = ['category_id','account_no','name','header','currency_id','tax_id'];
    protected $appends = ['level'];

    public function getLevelAttribute()
    {
        return 1;
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
