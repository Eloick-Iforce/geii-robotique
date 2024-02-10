<?php

/**
 * Fichier de définition des routes web de l'application.
 *
 * Ce fichier contient les routes web qui sont chargées par le RouteServiceProvider
 * et qui sont assignées au groupe de middleware "web". Faites quelque chose de génial !
 *
 * @package App\Http\Controllers
 * @see https://laravel.com/docs/routing
 */

use App\Http\Controllers\BillingAdressController;
use App\Http\Controllers\ChallengesController;
use App\Http\Controllers\CompetitionController;
use App\Http\Controllers\GenerateInvoiceController;
use App\Http\Controllers\TeamsController;
use App\Http\Controllers\UserController;
use App\Mail\Factures;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use TeamTeaTime\Forum\Support\Web\Forum;

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

Route::resources(
    [
        'users' => UserController::class,
    ]
);

Route::resources(
    [
        'challenges' => ChallengesController::class,
    ]
);


Route::get('users/{user}/verify', [UserController::class, 'verify'])
    ->name('users.verify');

Route::get('users/{user}/unverify', [UserController::class, 'unverify'])
    ->name('users.unverify');


Route::get(('billingadress/destroy'), [BillingAdressController::class, 'destroy'])
    ->name('billingadress.destroy');

Route::get('challenges/{competition}/create', [ChallengesController::class, 'create'])
    ->name('challenges.create');



Route::get('invoices/{team}', [GenerateInvoiceController::class, 'show'])
    ->name('invoices.show');

Route::get('invoices/{team}/mail', [GenerateInvoiceController::class, 'mail'])
    ->name('invoices.mail');






Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__ . '/auth.php';
