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
Route::controller(UserController::class)/*->prefix('user')->name('user')*/->middleware('auth')->group(function() {
    Route::get('/', 'index')->name('user.index');//ホーム画面
});

use App\Http\Controllers\GameController;
Route::controller(GameController::class)->middleware('auth')->group(function() {
     Route::get('/create', 'add')->name('user.add');//新規作成画面
     Route::post('/create', 'store')->name('user.create');//新規作成処理
     Route::get('/edit/{id}', 'edit')->name('user.edit');//編集画面
     Route::post('/edit', 'update')->name('user.update');//編集処理
     Route::get('/show/{id}', 'show')->name('user.show');//詳細画面
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

URL::forceScheme('https');

