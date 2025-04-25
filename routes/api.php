<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ClientController;

Route::get('clients/{client}', [ClientController::class, 'show']);