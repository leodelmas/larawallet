<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CryptoController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WalletController;

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
    if (Auth::check()) {
        return view('home');
    }
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/cryptos', [CryptoController::class, 'index'])->name('cryptos');
Route::get('/cryptos/import', [CryptoController::class, 'import'])->name('cryptos.import');

Route::resource('/groups', GroupController::class, [
    'except' => [ 'show' ]
])
;
Route::resource('/wallets', WalletController::class, [
    'except' => [ 'show' ]
]);

Route::resource('/users', UserController::class, [
    'except' => [ 'show' ]
]);