<?php

use Illuminate\Support\Facades\Route;

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

/*Route::get('/', function () {
    return view('welcome');
});*/

use App\Http\Controllers\UserController;
Route::controller(UserController::class)/*->prefix('user')->name('user')->middleware('auth')*/->group(function() {
    Route::get('/', 'index')->name('user.index');
});

use App\Http\Controllers\GameController;
Route::controller(GameController::class)/*->middleware('auth')*/->group(function() {
     Route::get('/create', 'create')->name('user.create');
})
;

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

URL::forceScheme('https');

