<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AddressController;

Route::get('/', [UserController::class, 'index'])->name('user.index');

Route::resource('user', UserController::class);

Route::resource('user.addresses', AddressController::class)->scoped([
    'addresses' => 'slug'
]);