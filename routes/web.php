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
use App\Http\Controllers\GameController;

Route::middleware('auth')->group(function() {
    Route::get('/', [GameController::class, 'index'])->name('user.index'); //ホーム画面

    Route::get('/create', [GameController::class, 'add'])->name('user.add'); //新規作成画面
    Route::post('/create', [GameController::class, 'store'])->name('user.create'); //新規作成処理
    Route::get('/edit/{id}', [GameController::class, 'edit'])->name('user.edit'); //編集画面
    Route::post('/edit', [GameController::class, 'update'])->name('user.update'); //編集処理
    Route::get('/show/{id}', [GameController::class, 'show'])->name('user.show'); //詳細画面
    Route::delete('/delete', [GameController::class, 'destroy'])->name('user.destroy'); // 削除処理
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

URL::forceScheme('https');

