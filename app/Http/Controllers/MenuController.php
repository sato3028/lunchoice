<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMenuRequest;
use App\Http\Requests\UpdateMenuRequest;
use App\Models\Kitchen; 
use App\Models\Menu;
use Inertia\Inertia;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Session;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($kitchenId)
    {
        $kitchen = Kitchen::with('menus')->findOrFail($kitchenId);
    
        $cartItems = Session::get('cart', []);
    
        return Inertia::render('Menus/Index', [
            'menus' => $kitchen->menus->map(function ($menu) {
                return [
                    'id' => $menu->id,
                    'name' => $menu->name,
                    'price' => $menu->price,
                    'image' => $menu->image_data,
                    'kitchenId' => $menu->kitchen_id, 
                ];
            }),
            'cartItems' => $cartItems,
        ]);
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
    public function store(StoreMenuRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Menu $menu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMenuRequest $request, Menu $menu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu)
    {
        //
    }
}
