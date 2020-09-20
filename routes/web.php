<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\RegisterController;


// Route::get('/', function () {
//     return view('site.index');
// })->name('home.index');

//  Auth::routes();

Route::get('/', function () {
    return view('front.index');
})->name('site.index');

Route::get('/register' , [RegisterController::class , 'viewRegisterPage']);
Route::post('/register' , [RegisterController::class , 'register'])->name('register');
Route::get('/redirectToFacebook' , [RegisterController::class , 'redirectToFacebook'])->name('facebook.login');

Route::get('/callback/facebook' , [RegisterController::class , 'handleFacebookCallback']);

