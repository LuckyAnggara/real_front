<?php

namespace App\Helpers;

use App\Models\AccountCategory;
use App\Models\AccountLevelOne;
use App\Models\AccountLevelTwo;

class AccountNoHelper
{
    public static function generateAccountNoLevelOne($category_id)
    {
       $lastAccount = AccountLevelOne::where('category_id', $category_id)->get()->sortByDesc('account_no')->first()->account_no;

        return $lastAccount + 1;

    }

        public static function generateAccountNoLevelTwo($account_level_one_id)
    {
       $lastAccount = AccountLevelTwo::where('account_level_one_id', $account_level_one_id)->get()->sortByDesc('account_no')->first()->account_no;

        return $lastAccount + 1;

    }
}
