<?php

namespace App\Http\Controllers;

use App\Models\AccountSubDetail;
use Illuminate\Http\Request;

class AccountSubDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return AccountSubDetail::with(['tax', 'detail.header'])->get();
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
    public function show(AccountSubDetail $accountSubDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AccountSubDetail $accountSubDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AccountSubDetail $accountSubDetail)
    {
        //
    }
}
