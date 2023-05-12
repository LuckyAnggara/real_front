<?php

namespace App\Http\Controllers;

use App\Helpers\AccountNoHelper;
use App\Http\Controllers\BaseController;
use App\Models\AccountDetail;
use App\Models\AccountLevelOne;
use App\Models\AccountLevelTwo;
use App\Models\FactBalance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

        $merge = $accountLevelOne
            ->concat($accountLevelTwo)
            ->sortBy(function ($item, $key) {
                if (strlen($item['account_no']) == 5) {
                    $mainCode = $item['account_no'];
                    $branchCode = '';
                } else {
                    $mainCode = substr($item['account_no'], 0, 5);
                    $branchCode = substr($item['account_no'], 5);
                }
                return [$mainCode, $branchCode];
            })
            ->values();

        foreach ($merge as $key => $value) {
            $value->balance =
                FactBalance::where('account_no', $value->account_no)
                    ->orderBy('created_at', 'desc')
                    ->first()->balance ?? 0;
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
        if ($perPage == 0) {
            return $this->sendResponse($filtered, 'Data fetched');
        }
        return $this->sendResponse($filtered->take($perPage), 'Data fetched');
        // return AccountDetail::with(['tax'])->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = json_decode($request->getContent());
        try {
            DB::beginTransaction();
            $result = '';

            if (!isset($data->child)) {
                $account_no = AccountNoHelper::generateAccountNoLevelOne($data->category_id);
                $result = AccountLevelOne::create([
                    'account_no' => $account_no,
                    'name' => $data->name,
                    'category_id' => $data->category_id,
                ]);
            } else {
                $account_no = AccountNoHelper::generateAccountNoLevelTwo($data->child);
                $result = AccountLevelOne::create([
                    'account_no' => $account_no,
                    'account_level_one_id' => $data->child,
                    'name' =>  $data->name,
                    'category_id' => $data->category_id,
                ]);
            }

            DB::commit();
            return response()->json([
            'message' => 'Store created successfully!',
                    'data' => $result,
            ], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return $e;
            //    return response()->json([
            // 'message' => 'Store failed!',
            //         'data' => $e,

            //  ], 404);
          
        }
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
