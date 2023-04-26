<?php

namespace App\Http\Controllers;

use App\Models\AccountHeader;
use Illuminate\Http\Request;

class AccountHeaderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return AccountHeader::all();
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
    public function show(AccountHeader $accountHeader)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AccountHeader $accountHeader)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AccountHeader $accountHeader)
    {
        //
    }
}
