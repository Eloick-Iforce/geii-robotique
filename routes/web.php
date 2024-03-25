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
use App\Http\Controllers\YouTubeController;
use App\Mail\Factures;
use Illuminate\Support\Facades\Http;
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


// function checkLiveStatus()
// {
//     $apiKey = env('YOUTUBE_API_KEY');

//     $channelId = "UCwxcXL4gn7oxhJI6JfMy61A";

//     $liveStatusResponse = Http::get("https://www.googleapis.com/youtube/v3/search", [
//         'key' => $apiKey,
//         'channelId' => $channelId,
//         'eventType' => 'live',
//         'type' => 'video'
//     ]);

//     $liveStatusData = $liveStatusResponse->json();

//     if (isset($liveStatusData['items']) && count($liveStatusData['items']) > 0) {
//         $liveVideoId = $liveStatusData['items'][0]['id']['videoId'];
//         return "https://www.youtube.com/embed/$liveVideoId";
//     } else {
//         return "https://www.youtube.com/embed/jtr9OzcYE6E";
//     }

//     return 'Aucune chaîne correspondante trouvée';
// };

Route::view('/', 'welcome', ['liveStatus' => $liveStatus ?? 'https://www.youtube.com/embed/jtr9OzcYE6E'])
    ->name('welcome');


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

Route::get('challenges/{competition}/edit', [ChallengesController::class, 'edit'])
    ->name('challenges.edit');

Route::post('users/{user}/delete', [UserController::class, 'delete'])
    ->name('users.delete');


Route::get('invoices/{team}', [GenerateInvoiceController::class, 'show'])
    ->name('invoices.show');

Route::get('invoices/{team}/mail', [GenerateInvoiceController::class, 'mail'])
    ->name('invoices.mail');

Route::get('invoices/recap/{team}', [GenerateInvoiceController::class, 'recap'])
    ->name('invoices.recap');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__ . '/auth.php';
