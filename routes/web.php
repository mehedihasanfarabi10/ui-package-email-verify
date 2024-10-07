<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use Illuminate\Foundation\Auth\EmailVerificationRequest;
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

Route::get('/', function () {
    return view('welcome');
});

//Auth routes er majhe sob thakbe login register 
Auth::routes();

//Email verification request route

 
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
 
    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

//Verification notice

Route::get('/email/verify', function () {
    return view('auth.verify');
})->middleware('auth')->name('verification.notice');


//Resend email route
Route::post('/verification/resend',[App\Http\Controllers\HomeController::class, 'resend'])->name('verification.resend');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Hashing route

Route::post('/hashing/store', [App\Http\Controllers\HomeController::class, 'hashing'])->name('hashing.store');
Route::get('/details/{id}', [App\Http\Controllers\HomeController::class, 'detailss'])->name('details');


Route::get('/deposit/money', [App\Http\Controllers\HomeController::class, 'deposit'])->name('deposit.money')->middleware('verified');

// Route to display the change password form (GET)
Route::get('/password/change', [App\Http\Controllers\HomeController::class, 'passchange'])->name('password.change')->middleware('verified');

// Route to handle password change submission (POST)
Route::post('/update/pass', [App\Http\Controllers\HomeController::class, 'updatepass'])->name('update.pass')->middleware('verified');
