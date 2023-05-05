<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseController;
use App\Models\AccountDetail;
use App\Models\AccountLevelOne;
use App\Models\AccountLevelTwo;
use App\Models\FactBalance;
use Illuminate\Http\Request;

class AccountDetailController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $perPage = $request->input('limit', 5);
        $name = $request->input('name');

        $accountLevelOne = AccountLevelOne::with('tax', 'category.header')->get();
        $accountLevelTwo = AccountLevelTwo::with('tax', 'category.header')->get();

        $merge = $accountLevelOne->concat($accountLevelTwo)->sortBy(function ($item, $key) {
            if (strlen($item['account_no']) == 5) {
                $mainCode = $item['account_no'];
                $branchCode = '';
            } else {
                $mainCode = substr($item['account_no'], 0, 5);
                $branchCode = substr($item['account_no'], 5);
            }
            return [$mainCode, $branchCode];
        })->values();

        foreach ($merge as $key => $value) {
            $value->balance = FactBalance::where('account_no', $value->account_no)->orderBy('created_at', 'desc')->first()->balance ?? 0;
        }

        $filtered = $merge->filter(function ($item) use ($name) {
            // Filter berdasarkan nama
            if ($name && stripos($item->name, $name) !== false) {
                return true;
            }
            // Filter berdasarkan nomor akun
            if (strpos($item->account_no, $name) === false) {
                return false;
            }
            return true;
        });

        return $this->sendResponse($filtered->take($perPage), 'Data fetched');
        // return AccountDetail::with(['tax'])->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(AccountDetail $accountDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AccountDetail $accountDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AccountDetail $accountDetail)
    {
        //
    }
}
