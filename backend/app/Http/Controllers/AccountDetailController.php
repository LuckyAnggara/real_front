<?php

namespace App\Http\Controllers;

use App\Models\AccountDetail;
use Illuminate\Http\Request;

class AccountDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return AccountDetail::all();
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
