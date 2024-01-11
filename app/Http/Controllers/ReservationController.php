<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReservationRequest;
use App\Http\Requests\UpdateReservationRequest;
use App\Models\Reservation;
use App\Models\Menu;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ReservationController extends Controller
{
    public function addToCart(Request $request)
    {
        $menuId = $request->input('menuId');
        $quantity = $request->input('quantity');

        $cart = Session::get('cart', []);

        if (isset($cart[$menuId])) {
            $cart[$menuId]['quantity'] += $quantity;
        } else {
            $cart[$menuId] = ['menuId' => $menuId, 'quantity' => $quantity];
        }

        Session::put('cart', $cart);

        return Inertia::render('Menus/Index', [
            'message' => 'Item added to cart',
        ]);
    }

    public function showCart()
    {
        $cart = Session::get('cart', []);

        $cartItems = collect($cart)->mapWithKeys(function ($item, $menuId) {
            $menu = Menu::find($menuId);
            return [$menuId => [
                'name' => $menu->name,
                'price' => $menu->price,
                'quantity' => $item['quantity']
            ]];
        });

        return Inertia::render('Cart/Show', [
            'cartItems' => $cartItems
        ]);
    }


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
    public function store(StoreReservationRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Reservation $reservation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reservation $reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateReservationRequest $request, Reservation $reservation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $reservation)
    {
        //
    }
}
