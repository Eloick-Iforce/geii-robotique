<?php

use App\Http\Controllers\BillingAdressController;
use App\Http\Controllers\CompetitionController;
use App\Http\Controllers\TeamsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::resources([
    'competitions' => CompetitionController::class,
]);

Route::resources([
    'teams' => TeamsController::class,
]);

Route::resources(
    [
        'billingadress' => BillingAdressController::class,
    ]
);


Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__ . '/auth.php';
