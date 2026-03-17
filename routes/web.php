<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;

// Admin Controller
Route::get('/', [AdminController::class, 'home']);
Route::get('/home', [AdminController::class, 'index'])->name('home');
Route::get('/create_room', [AdminController::class, 'create_room']);
Route::post('/add_room', [AdminController::class, 'add_room']);
Route::get('/view_room', [AdminController::class, 'view_room']);
Route::delete('/room_delete/{id}', [AdminController::class, 'room_delete'])->name('room_delete');
Route::get('/room_update/{id}', [AdminController::class, 'room_update']);
Route::put('/edit_room/{id}', [AdminController::class, 'edit_room']);

// Booking Management
Route::get('/bookings', [AdminController::class, 'bookings']);
Route::delete('/delete_booking/{id}', [AdminController::class, 'delete_booking'])->name('delete_booking');
Route::put('/approve_book/{id}', [AdminController::class, 'approve_book'])->name('approve.book');
Route::get('/reject_book/{id}', [AdminController::class, 'reject_book'])->name('reject.book');

// Gallery Management
Route::get('/view_gallery', [AdminController::class, 'view_gallery']);
Route::post('/upload_gallery', [AdminController::class, 'upload_gallery']);
Route::get('/delete_gallery/{id}', [AdminController::class, 'delete_gallery']);


// Home Controller
Route::get('/room_details/{id}', [HomeController::class, 'room_details']);
Route::post('/add_booking/{id}', [HomeController::class, 'add_booking']);