<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MaController;

// API CRUD routes
Route::get('/data', [MaController::class, 'index']);        // GET all items
Route::post('/data', [MaController::class, 'store']);       // POST new item
Route::put('/data/{id}', [MaController::class, 'update']);  // PUT update item
Route::delete('/data/{id}', [MaController::class, 'destroy']); // DELETE item
