<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KitchenController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\MenuController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/kitchens', [KitchenController::class, 'index'])->name('kitchens');
    Route::get('/kitchens/{kitchen}/menus', [MenuController::class, 'index']);

    Route::post('/cart/add', [ReservationController::class, 'addToCart']);
    Route::get('/cart/items', [ReservationController::class, 'getCartItems']);

    Route::get('/carts', [CartController::class, 'index']);
    Route::get('/carts/show', [CartController::class, 'show']);
    Route::get('/carts/accept', [CartController::class, 'accept']);
    Route::get('/carts/complete', function () {
        return Inertia::render('Carts/Complete');
    });
    Route::post('/update-cart', [CartController::class, 'updateCart']);
        
    Route::post('/create-order', [CartController::class, 'createOrder']);
    Route::post('/accept-order', [CartController::class, 'acceptOrder']);

    Route::get('/reset-session', [ReservationController::class, 'resetSession'])->name('reset-session');
});

require __DIR__.'/auth.php';
