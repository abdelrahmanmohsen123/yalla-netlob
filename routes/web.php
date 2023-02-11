<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\GroubController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\SubscriberController;
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

Route::get("google",function(){

    Return view("googleAuth");

});

// Route::get('auth/google', 'Auth\LoginController@redirectToGoogle');

// Route::get('auth/google/callback', 'Auth\LoginController@handleGoogleCallback');


Route::get('login/{provider}', [LoginController::class,'redirectToProvider']);
Route::get('login/google/callback', [LoginController::class,'andleProviderCallback']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('groubs', GroubController::class);



//send notification
// Route::get('/send-notification', [NotificationController::class, 'sendOfferNotification']);