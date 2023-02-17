<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GroubController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\FriendController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\OrderdetailController;

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

Route::get('', function () {
    return view('welcome');
});

Route::get("google", function () {

    return view("googleAuth");
});

// Route::get('auth/google', 'Auth\LoginController@redirectToGoogle');

// Route::get('auth/google/callback', 'Auth\LoginController@handleGoogleCallback');


Route::get('login/{provider}', [LoginController::class, 'redirectToProvider']);
Route::get('login/google/callback', [LoginController::class, 'handleProviderCallback']);

Auth::routes();
Route::get('', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('groubs', GroubController::class)->middleware('auth');
Route::post('addFrientoGroub', [GroubController::class, 'addFrientoGroub'])->name('addFrientoGroub')->middleware('auth');
Route::resource('friends', FriendController::class)->middleware('auth');
Route::resource('orders', OrderController::class)->middleware('auth');
Route::resource('orderdetails', OrderdetailController::class)->middleware('auth');


Route::delete('deleteFrientoGroub', [GroubController::class, 'deleteFrientoGroub'])->name('friends_groub.destroy');


Route::get('/info', function () {
    return view('layouts.info');
});
//send notification
// Route::get('/send-notification', [NotificationController::class, 'sendOfferNotification']);
