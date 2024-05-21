<?php

use App\Models\Announcement;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\RevisorController;
use App\Http\Controllers\AnnouncementController;


//rotta home
Route::get('/', [PublicController::class, 'home'])->name('home');

//Detail
Route::get('/announcement/show/{announcement}', [AnnouncementController::class, 'show'])->name('announcement.show');
Route::get('/announcement/index/{category}', [AnnouncementController::class, 'index'])->name('announcement.index');
Route::get('/announcement/index/', [AnnouncementController::class, 'indexAll'])->name('announcement.indexAll');

// Rotte revisor

Route::get('/revisor/index', [RevisorController::class, 'index'])->middleware('IsRevisor')->name('revisor.index');
Route::patch('/accept/{announcement}', [RevisorController::class, 'accept'])->name('accept');
Route::patch('/reject/{announcement}', [RevisorController::class, 'reject'])->name('reject');


Route::middleware(['auth'])->group(function () {

    //User delete
    Route::delete('/users/destroy', [PublicController::class, 'userDestroy'])->name('user.destroy');

    //Announcement create
    Route::get('/announcement/create', [AnnouncementController::class, 'create'])->name('announcement.create');
});