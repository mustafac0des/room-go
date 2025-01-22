<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\RoomsController;

Auth::routes();

Route::get('/landing', function () {
    return view('landing');
});


Route::get('/', function () {
    return view('home');
})->middleware('auth');

Route::get('/profile/manage', function () {
    return view('profile.manage', ['user' => Auth::user()]);
})->middleware('auth');

Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update')->middleware('auth');

Route::get('/', [RoomController::class, 'bookings'])->name('home')->middleware('auth');
Route::post('/rooms', [RoomController::class, 'store'])->name('room.store')->middleware('auth');
Route::get('/rooms/create', [RoomController::class, 'create'])->name('room.create')->middleware('auth');
Route::get('/rooms/manage', [RoomController::class, 'index'])->name('room.index')->middleware('auth');
Route::get('/rooms/edit/{id}', [RoomController::class, 'edit'])->name('room.edit')->middleware('auth');
Route::put('/rooms/{id}', [RoomController::class, 'update'])->name('room.update')->middleware('auth');
Route::delete('/rooms/{id}', [RoomController::class, 'destroy'])->name('room.delete')->middleware('auth');
Route::get('/rooms/view', [RoomController::class, 'availableRooms'])->name('room.view')->middleware('auth');
Route::post('/rooms/book/{id}', [RoomController::class, 'book'])->name('room.book')->middleware('auth');
Route::get('/rooms/order/{id}', [RoomController::class, 'order'])->name('room.order')->middleware('auth');
Route::put('/bookings/{id}/status', [RoomController::class, 'updateBookingStatus'])->name('room.updateBookingStatus')->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::get('admin/users', [UsersController::class, 'index'])->name('users.index');
    Route::get('admin/users/data', [UsersController::class, 'getUsers'])->name('users.data');
    Route::get('admin/users/create', [UsersController::class, 'create'])->name('users.create');
    Route::post('admin/users', [UsersController::class, 'store'])->name('users.store');
    Route::get('admin/users/{id}/edit', [UsersController::class, 'edit'])->name('users.edit');
    Route::put('admin/users/{id}', [UsersController::class, 'update'])->name('users.update');
    Route::delete('admin/users/{id}', [UsersController::class, 'destroy'])->name('users.destroy');
});


Route::middleware('auth')->group(function () {
    Route::get('admin/rooms', [RoomsController::class, 'index'])->name('rooms.index');
    Route::get('admin/rooms/create', [RoomsController::class, 'create'])->name('rooms.create');
    Route::post('admin/rooms', [RoomsController::class, 'store'])->name('rooms.store');
    Route::get('admin/rooms/edit/{id}', [RoomsController::class, 'edit'])->name('rooms.edit');
    Route::put('admin/rooms/{id}', [RoomsController::class, 'update'])->name('rooms.update');
    Route::delete('admin/rooms/{id}', [RoomsController::class, 'destroy'])->name('rooms.delete');
    Route::get('admin/rooms/data', [RoomsController::class, 'getRooms'])->name('rooms.data');
});

