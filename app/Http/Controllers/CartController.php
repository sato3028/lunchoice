<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCartRequest;
use App\Http\Requests\UpdateCartRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use Inertia\Inertia;
use Illuminate\Support\Facades\Session;
use App\Models\Reservation;
use App\Models\ReservationDetail;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cartItems = Session::get('cart', []);
        return Inertia::render('Carts/Index', ['cartItems' => $cartItems]);
    }

    public function updateCart(Request $request)
    {  
        $cartItems = $request->input('cartItems', []);
        Session::put('cart', $cartItems);

        return Inertia::render('Carts/Index', ['cartItems' => $cartItems]);
    }

    public function createOrder()
    {
        $cartItems = Session::get('cart', []);

        if (count($cartItems) > 0) {
            $totalPrice = array_reduce($cartItems, function ($carry, $item) {
                return $carry + ($item['price'] * $item['quantity']);
            }, 0);

            $reservation = new Reservation();
            $reservation->user_id = Auth::id();
            $reservation->status = 'awaiting_pickup';
            $reservation->total_price = $totalPrice;
            $reservation->save();

            foreach ($cartItems as $item) {
                $detail = new ReservationDetail();
                $detail->reservation_id = $reservation->id;
                $detail->menu_id = $item['menuId'];
                $detail->quantity = $item['quantity'];
                $detail->price = $item['price'];
                $detail->save();
            }

            Session::forget('cart');

            return Inertia::render('Carts/Accept');
        }

        return Inertia::render('Carts/Index', [
            'error' => 'カートには何も入っていません。'
        ]);
    }

    public function acceptOrder()
    {
        $reservation = Reservation::where('user_id', Auth::id())
            ->where('status', 'awaiting_pickup')
            ->latest()
            ->first();

        if ($reservation) {
            $reservation->status = 'completed';
            $reservation->save();

            return Inertia::location('/carts/complete');
        }

        return Inertia::render('Carts/Accept', ['error' => '受け取る注文が見つかりません。']);
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
    public function store(StoreCartRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $cartItems = Session::get('cart', []);

        return Inertia::render('Carts/Show', ['cartItems' => $cartItems]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCartRequest $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cart $cart)
    {
        //
    }
}
