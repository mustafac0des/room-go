<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;

Auth::routes();

Route::get('/', function () {
    return view('home');
})->middleware('auth');

Route::get('/profile/manage', function () {
    return view('profile.manage', ['user' => Auth::user()]);
})->middleware('auth');

Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update')->middleware('auth');

use App\Http\Controllers\RoomController;

Route::post('/rooms', [RoomController::class, 'store'])->name('rooms.store')->middleware('auth');
Route::get('/rooms/create', [RoomController::class, 'create'])->name('rooms.create')->middleware('auth');
Route::get('/rooms/manage', [RoomController::class, 'index'])->name('rooms.index')->middleware('auth');
Route::get('/rooms/edit/{id}', [RoomController::class, 'edit'])->name('rooms.edit')->middleware('auth');
Route::put('/rooms/{id}', [RoomController::class, 'update'])->name('rooms.update')->middleware('auth');
Route::delete('/rooms/{id}', [RoomController::class, 'destroy'])->name('rooms.delete')->middleware('auth');
Route::get('/rooms/view', [RoomController::class, 'availableRooms'])->name('rooms.view')->middleware('auth');
Route::post('/rooms/book/{id}', [RoomController::class, 'book'])->name('rooms.book')->middleware('auth');



