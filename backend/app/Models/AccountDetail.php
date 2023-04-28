<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountDetail extends Model
{
    use HasFactory;

    // protected $fillable = [
    //     'name',
    //     'unit_id',
    //     'brand_id',
    //     'warehouse_id',
    //     'rack',
    //     'created_by',
    // ];

    public function tax()
    {
        return $this->hasOne(Tax::class, 'id', 'tax_id');
    }
    public function header()
    {
        return $this->hasOne(AccountHeader::class, 'id', 'header_id');
    }
}
