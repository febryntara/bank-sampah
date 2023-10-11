<?php

use App\Http\Controllers\SampahController;
use Illuminate\Support\Facades\Route;

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

Route::prefix('dashboard')->group(function () {
    Route::prefix('sampah')->controller(SampahController::class)->group(function () {
        Route::get('/', 'index')->name('sampah.index');
        Route::get('create', 'create')->name('sampah.create');
        Route::get('detail/{sampah:id}', 'detail')->name('sampah.detail');
        Route::get('update/{sampah:id}', 'update')->name('sampah.update');

        Route::post('store', 'store')->name('sampah.store');
        Route::patch('detail/{sampah:id}', 'patch')->name('sampah.patch');
        Route::delete('delete/{sampah:id}', 'delete')->name('sampah.delete');
    });
});

Route::prefix('auth')->controller(AuthController::class)->group(function () {
    Route::get('login', 'login')->name('auth.login')->middleware('guest');
    Route::post('login', 'attempt_login')->name('auth.attempt_login')->middleware('guest');
    Route::get('logout', 'logout')->name('auth.logout')->middleware('auth');
});
