<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;


//rotta home
Route::get('/', [PublicController::class, 'home' ])->name('home');

//User delete
Route::delete('/users/destroy', [PublicController::class,'userDestroy'])->name('user.destroy');