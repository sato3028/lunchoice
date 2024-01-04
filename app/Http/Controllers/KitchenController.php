<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreKitchenRequest;
use App\Http\Requests\UpdateKitchenRequest;
use App\Models\Kitchen;
use Inertia\Inertia;

class KitchenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // nameとdescriptionを取得してviewに送る
        $kitchens = Kitchen::all(['name', 'description']);
        return Inertia::render('Kitchens/Index', ['kitchens' => $kitchens]);
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
    public function store(StoreKitchenRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Kitchen $kitchen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kitchen $kitchen)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateKitchenRequest $request, Kitchen $kitchen)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kitchen $kitchen)
    {
        //
    }
}
