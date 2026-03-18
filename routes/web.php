<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;

// Admin Controller
Route::get('/', [AdminController::class, 'home']);
Route::get('/home', [AdminController::class, 'index'])->name('home');

// Admin Room Management
Route::get('/create_room', [AdminController::class, 'create_room'])->middleware('auth', 'admin');
Route::post('/add_room', [AdminController::class, 'add_room'])->middleware('auth', 'admin');
Route::get('/view_room', [AdminController::class, 'view_room'])->middleware('auth', 'admin');
Route::delete('/room_delete/{id}', [AdminController::class, 'room_delete'])->name('room_delete')->middleware('auth', 'admin');
Route::get('/room_update/{id}', [AdminController::class, 'room_update'])->middleware('auth', 'admin');
Route::put('/edit_room/{id}', [AdminController::class, 'edit_room'])->middleware('auth', 'admin');

// Admin Booking Management
Route::get('/bookings', [AdminController::class, 'bookings'])->middleware('auth', 'admin');
Route::delete('/delete_booking/{id}', [AdminController::class, 'delete_booking'])->name('delete_booking')->middleware('auth', 'admin');
Route::put('/approve_book/{id}', [AdminController::class, 'approve_book'])->name('approve.book')->middleware('auth', 'admin');
Route::get('/reject_book/{id}', [AdminController::class, 'reject_book'])->name('reject.book')->middleware('auth', 'admin');

// Admin Gallery Management
Route::get('/view_gallery', [AdminController::class, 'view_gallery'])->middleware('auth', 'admin');
Route::post('/upload_gallery', [AdminController::class, 'upload_gallery'])->middleware('auth', 'admin');
Route::get('/delete_gallery/{id}', [AdminController::class, 'delete_gallery'])->middleware('auth', 'admin');

// Admin Contact Management
Route::get('/all_messages', [AdminController::class, 'all_messages'])->middleware('auth', 'admin');
Route::get('/send_mail/{id}', [AdminController::class, 'send_mail'])->middleware('auth', 'admin');
Route::post('/mail/{id}', [AdminController::class, 'mail'])->middleware('auth', 'admin');



// Home Controller
Route::get('/room_details/{id}', [HomeController::class, 'room_details']);
Route::post('/add_booking/{id}', [HomeController::class, 'add_booking']);

// Contact Management
Route::post('/contact', [HomeController::class, 'contact']);
Route::get('/contact_us', [HomeController::class, 'contact_us']);

// Room Management
Route::get('/our_rooms', [HomeController::class, 'our_rooms']);

// Gallery Management
Route::get('/hotel_gallery', [HomeController::class, 'hotel_gallery']);
