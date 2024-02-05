<?php

use App\Http\Controllers\BillingAdressController;
use App\Http\Controllers\CompetitionController;
use App\Http\Controllers\GenerateInvoiceController;
use App\Http\Controllers\TeamsController;
use App\Mail\Factures;
use Illuminate\Support\Facades\Mail;
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

Route::get(('billingadress/{billingAddress}/edit'), [BillingAdressController::class, 'edit'])
    ->name('billingadress.edit');



Route::resources(
    [
        'billingadress' => BillingAdressController::class,
    ]
);

Route::get(('billingadress/destroy'), [BillingAdressController::class, 'destroy'])
    ->name('billingadress.destroy');



Route::get('invoices/{team}', [GenerateInvoiceController::class, 'show'])
    ->name('invoices.show');

Route::get('invoices/{team}/mail', [GenerateInvoiceController::class, 'mail'])
    ->name('invoices.mail');


Route::get('/mail', function () {

    Mail::to('eloick.mickisz@proton.me')->send(new Factures('team', 'billingAddress', 'user'));
});



Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__ . '/auth.php';
