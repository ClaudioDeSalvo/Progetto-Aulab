<?php

use App\Models\Announcement;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\AnnouncementController;


//rotta home
Route::get('/', [PublicController::class, 'home'])->name('home');


Route::middleware(['auth'])->group(function () {

    //User delete
    Route::delete('/users/destroy', [PublicController::class, 'userDestroy'])->name('user.destroy');

    //Announcement create
    Route::get('/announcement/create', [AnnouncementController::class, 'create'])->name('announcement.create');
    Route::get('/announcement/index', [AnnouncementController::class, 'index'])->name('announcement.index');
    Route::get('/announcement/show/{announcement}', [AnnouncementController::class, 'show'])->name('announcement.show');

});