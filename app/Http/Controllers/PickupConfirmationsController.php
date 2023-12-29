<?php

namespace App\Http\Controllers;

use App\Http\Requests\Storepickup_confirmationsRequest;
use App\Http\Requests\Updatepickup_confirmationsRequest;
use App\Models\pickup_confirmations;

class PickupConfirmationsController extends Controller
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
    public function store(Storepickup_confirmationsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(pickup_confirmations $pickup_confirmations)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(pickup_confirmations $pickup_confirmations)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Updatepickup_confirmationsRequest $request, pickup_confirmations $pickup_confirmations)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(pickup_confirmations $pickup_confirmations)
    {
        //
    }
}
