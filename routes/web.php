<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\SampahController;
use App\Http\Controllers\SetoranSampahController;
use App\Models\Sampah;
use App\Models\SetoranSampah;
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
    $data = [
        'title' => 'Bank Sampah',
    ];
    return view('layouts.user', $data);
})->name('home');

Route::prefix('dashboard')->middleware(['auth'])->group(function () {
    Route::get('/', function () {
        $setoran = SetoranSampah::get();
        $sampah = Sampah::latest();
        $data = [
            'title' => 'Dashboard',
            'total_kg' => $setoran->map(fn ($data) => $data->jumlah)->sum(),
            'jenis_sampah' => $sampah->count(),
            'total_setoran' => $setoran->count(),
            'sampah' => $sampah->get()->map(fn ($data) => $data->nama),
            'sampah_setoran' => $sampah->get()->map(function ($data) {
                $total_setoran = $data->setoran->map(fn ($row) => $row->jumlah)->sum();
                return $total_setoran;
            })
        ];

        // return dd($data);
        return view('menus.dashboard.index', $data);
    })->name('dashboard');

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

Route::prefix('setoran-sampah')->controller(SetoranSampahController::class)->group(function () {
    Route::get('/', 'index')->name('setoran_sampah.index');
    Route::get('create', 'create')->name('setoran_sampah.create');
    Route::get('detail/{setoran:id}', 'detail')->name('setoran_sampah.detail');
    Route::get('update/{setoran:id}', 'update')->name('setoran_sampah.update');

    Route::post('store', 'store')->name('setoran_sampah.store');
    Route::patch('detail/{setoran:id}', 'patch')->name('setoran_sampah.patch');
    Route::delete('delete/{setoran:id}', 'delete')->name('setoran_sampah.delete');
});
