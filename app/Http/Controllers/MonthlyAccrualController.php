<?php

namespace App\Http\Controllers;

use App\Actions\Leave\RecordMonthlyAccrual;
use App\Data\LeaveData;
use Illuminate\Http\Request;

class MonthlyAccrualController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RecordMonthlyAccrual $monthlyAccrual, LeaveData $data)
    {
        $monthlyAccrual($data);

        return to_route("")->with('message', 'Monthly Accrual 1.25 Applied!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
