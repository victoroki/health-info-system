<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ClientController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::get('/test', function() {
    return ['status' => 'API working'];
});

Route::get('/clients/{client}', [ClientController::class, 'show']);