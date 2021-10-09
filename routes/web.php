<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Auth::routes();

Route::get('/', [App\Http\Controllers\RestaurantController::class, 'showFrontPage'])->name('front_page.index');

//////////////////////////////////////////////

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::resource('restaurants', App\Http\Controllers\RestaurantController::class);

});


/* Route::post('/images','RestaurantController@subirArchivo')->name('images'); */

// Route::get('/restaurants', [App\Http\Controllers\RestaurantController::class, 'index'])->name('restaurants.index');
// Route::get('/restaurants/{restaurant}', [App\Http\Controllers\RestaurantController::class, 'show'])->name('restaurants.show');
// Route::get('/restaurants', [App\Http\Controllers\RestaurantController::class, 'create'])->name('restaurants.create');
