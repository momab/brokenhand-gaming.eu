<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;

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

Route::get('login', function () {
    return Socialite::driver('steam')->redirect();
})->name('login');

Route::get('login/callback', [AuthController::class, 'getUserToken']);

Route::get('user/profile', [UserController::class, 'show'])->name('user_profile');

Route::get('logout', function(Request $request) {
    $request->session()->flush();
    return redirect('/');
})->name('logout');

Route::get('debug', function(Request $request) {
    $request->session()->flush();
    return redirect('/');
})->name('logout');

Route::prefix('debug')->group(function () {
    Route::get('getsessioninfo', function (Request $request) {
        dd($request->session()->all());
    });
});