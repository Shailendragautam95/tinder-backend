<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PeopleController;
use App\Http\Controllers\LikeController;

Route::get('/people', [PeopleController::class, 'index']);
Route::post('/like/{id}', [LikeController::class, 'like']);
Route::post('/dislike/{id}', [LikeController::class, 'dislike']);
Route::get('/liked', [PeopleController::class, 'likedList']);
