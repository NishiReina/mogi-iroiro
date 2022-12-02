<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\QrController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::group(['middleware' => 'auth'],function() {
    Route::get('/mail', [ContactController::class, 'mailView']);
    Route::post('/mail', [ContactController::class,'sendMail']);
    Route::get('/charge', [StripeController::class, 'chargeView']);
    Route::post('/charge', [StripeController::class,'charge'])->name('stripe.charge');
    Route::get('/qr', [QrController::class, 'getQr']);
});

require __DIR__.'/auth.php';
