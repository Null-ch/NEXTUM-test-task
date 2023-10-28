<?php

use App\Http\Controllers\ExportController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TextController;
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
Route::get('/', [HomeController::class, 'index'])->name('index_page');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/user-cards', [TextController::class, 'index'])->name('user_index_page');
    Route::get('/create', [TextController::class, 'create'])->name('create_page');
    Route::post('/store', [TextController::class, 'store'])->name('store_page');
    Route::get('/export', [ExportController::class, 'export'])->name('export');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
