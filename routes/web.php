<?php

use Illuminate\Support\Facades\Route;


// Route::get('home', App\Http\Livewire\Home::class);
// Route::get('products', App\Http\Livewire\Products::class);
// Route::get('cart', App\Http\Livewire\Cart::class);

Route::livewire('/home', 'home')->name('home');
Route::livewire('/products', 'products');
Route::livewire('/cart', 'cart')->name('cart');
