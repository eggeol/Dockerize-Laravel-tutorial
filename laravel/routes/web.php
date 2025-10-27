<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MaController;

Route::get('/', function () {
    return view('welcome');
});

route::get('/test', [MaController::class, 'index']);