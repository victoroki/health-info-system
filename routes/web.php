<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HealthProgramController;


Route::get('/', function () {
    return view('welcome');
});
Route::resource('clients', ClientController::class);
Route::resource('programs', HealthProgramController::class);

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('clients', ClientController::class);
    Route::resource('programs', HealthProgramController::class);
});

// Client Program Enrollment Routes
Route::prefix('clients/{client}/programs')->group(function () {
    Route::post('attach', [ClientController::class, 'attachProgram'])
         ->name('clients.programs.attach');
         
    Route::delete('detach/{program}', [ClientController::class, 'detachProgram'])
         ->name('clients.programs.detach');
});

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');