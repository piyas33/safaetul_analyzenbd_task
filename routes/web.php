<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [HomeController::class,'index'])->name('home');

Route::controller(HomeController::class)->middleware('auth')->prefix('user')->group(function () {
    Route::get('/{id}/view', 'view')->name('view');

    //create
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');

    //edit
    Route::get('/{id}/edit', 'Edit')->name('edit');
    Route::put('/{id}/update', 'update')->name('update');

    Route::get('/soft-delete/{user}', 'softDelete')->name('soft-delete');

    //deleted-all-user
    Route::get('/deleted-user-list', 'deletedUserList')->name('deleted-user-list');
    Route::get('/restore/{user}', 'restoreUser')->name('restore-user');

});
