<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\cekAuth;

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

Auth::routes();

Route::middleware([cekAuth::class])->group(function(){
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    //admin
    Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'as' => 'admin.'], function(){

        //user management
        Route::get('/user-management', [App\Http\Controllers\admin\UserManagementController::class, 'index'])->name('user-management');
        Route::post('/user-management/store', [App\Http\Controllers\admin\UserManagementController::class, 'store'])->name('user-management.store');

        //Berita
        Route::get('/berita/index', [App\Http\Controllers\admin\BeritaController::class, 'index'])->name('berita.index');
        Route::post('/berita/store', [App\Http\Controllers\admin\BeritaController::class, 'store'])->name('berita.store');
        Route::get('/berita/delete/{berita}', [App\Http\Controllers\admin\BeritaController::class, 'delete'])->name('berita.delete');

        //Penduduk
        Route::get('/penduduk/index', [App\Http\Controllers\admin\PendudukController::class, 'index'])->name('penduduk.index');

    });
});

