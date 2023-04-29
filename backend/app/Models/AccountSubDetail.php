<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountSubDetail extends Model
{
    use HasFactory;

    protected $appends = ['balance', 'lock_status'];

    public function tax()
    {
        return $this->hasOne(Tax::class, 'id', 'tax_id');
    }

    public function detail()
    {
        return $this->hasOne(AccountDetail::class, 'id', 'detail_id');
    }

    public function journal()
    {
        return $this->hasMany(Journal::class, 'account_sub_details_id', 'id')->orderBy('created_at');
    }

    public function getBalanceAttribute()
    {
        $kredit = $this->journal->where('type', 'KREDIT')->sum('amount');
        $debit = $this->journal->where('type', 'DEBIT')->sum('amount');

        return $debit - $kredit;
    }
    public function getLockStatusAttribute()
    {
        if (count($this->journal) > 0) {
            return true;
        }

        return false;
    }
}
