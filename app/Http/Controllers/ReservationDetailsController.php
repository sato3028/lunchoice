<?php

namespace App\Http\Controllers;

use App\Http\Requests\Storereservation_detailsRequest;
use App\Http\Requests\Updatereservation_detailsRequest;
use App\Models\reservation_details;

class ReservationDetailsController extends Controller
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
    public function store(Storereservation_detailsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(reservation_details $reservation_details)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(reservation_details $reservation_details)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Updatereservation_detailsRequest $request, reservation_details $reservation_details)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(reservation_details $reservation_details)
    {
        //
    }
}
