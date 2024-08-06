<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ChatController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/messages', [HomeController::class, 'messages'])->name('messages');
Route::post('/message', [HomeController::class, 'message'])->name('message');
Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/chat', [ChatController::class, 'showChat']);
Route::get('/person', [ChatController::class, 'showPerson']);
Route::get('/plus', [ChatController::class, 'showPlus']);
Route::get('/chat/user/{userId}/messages', [ChatController::class, 'getUserMessages']);
Route::post('/send-message', [MessageController::class, 'sendMessage']);
