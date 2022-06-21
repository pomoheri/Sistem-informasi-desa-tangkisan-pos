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
        Route::post('/penduduk/store', [App\Http\Controllers\admin\PendudukController::class, 'store'])->name('penduduk.store');
        Route::get('/penduduk/delete/{penduduk}', [App\Http\Controllers\admin\PendudukController::class, 'delete'])->name('penduduk.delete');

        //Penduduk datang
        Route::get('/penduduk-datang/index', [App\Http\Controllers\admin\PendudukDatangController::class, 'index'])->name('penduduk-datang.index');
        Route::post('/penduduk-datang/store', [App\Http\Controllers\admin\PendudukDatangController::class, 'store'])->name('penduduk-datang.store');
        Route::get('/penduduk-datang/delete/{penduduk_datang}', [App\Http\Controllers\admin\PendudukDatangController::class, 'delete'])->name('penduduk-datang.delete');
        Route::get('/penduduk-datang/generate-surat/{penduduk_datang}', [App\Http\Controllers\admin\PendudukDatangController::class, 'generateSurat'])->name('penduduk-datang.generate-surat');

         //Penduduk pindah
        Route::get('/penduduk-pindah/index', [App\Http\Controllers\admin\PendudukPindahController::class, 'index'])->name('penduduk-pindah.index');
        Route::get('/penduduk-pindah/getPenduduk/{id}', [App\Http\Controllers\admin\PendudukPindahController::class, 'getPenduduk'])->name('penduduk-datang.getPenduduk');
        Route::post('/penduduk-pindah/store', [App\Http\Controllers\admin\PendudukPindahController::class, 'store'])->name('penduduk-pindah.store');
        Route::get('/penduduk-pindah/delete/{penduduk_pindah}', [App\Http\Controllers\admin\PendudukPindahController::class, 'delete'])->name('penduduk-pindah.delete');
        Route::get('/penduduk-pindah/generate-surat/{penduduk_pindah}', [App\Http\Controllers\admin\PendudukPindahController::class, 'generateSurat'])->name('penduduk-pindah.generate-surat');
        
        //Kelahiran
        Route::get('/kelahiran/index', [App\Http\Controllers\admin\KelahiranController::class, 'index'])->name('kelahiran.index');
        Route::get('/kelahiran/generate-surat/{kelahiran}', [App\Http\Controllers\admin\KelahiranController::class, 'generateSurat'])->name('kelahiran.generate-surat');
    
        //kematian
        Route::get('/kematian/index', [App\Http\Controllers\admin\KematianController::class, 'index'])->name('kematian.index');
        Route::get('/kematian/generate-surat/{kematian}', [App\Http\Controllers\admin\KematianController::class, 'generateSurat'])->name('kematian.generate-surat');
    
        //profil desa
        Route::get('/profil-desa/index', [App\Http\Controllers\admin\ProfilDesaController::class, 'index'])->name('profil-desa.index');
        Route::post('/profil-desa/store', [App\Http\Controllers\admin\ProfilDesaController::class, 'store'])->name('profil-desa.store');
        Route::get('/profil-desa/delete/{profil}', [App\Http\Controllers\admin\ProfilDesaController::class, 'delete'])->name('profil-desa.delete');
    
        //surat
        Route::get('/surat/index', [App\Http\Controllers\admin\SuratController::class, 'index'])->name('surat.index');
    });

    //warga
    Route::group(['namespace' => 'Warga', 'prefix' => 'warga', 'as' => 'warga.'], function(){
        //permohonan kelahiran
        Route::get('/kelahiran/index', [App\Http\Controllers\warga\PermohonanKelahiranController::class, 'index'])->name('kelahiran.index');
        Route::post('/kelahiran/store', [App\Http\Controllers\warga\PermohonanKelahiranController::class, 'store'])->name('kelahiran.store');
        Route::get('/kelahiran/delete/{kelahiran}', [App\Http\Controllers\warga\PermohonanKelahiranController::class, 'delete'])->name('kelahiran.delete');
        
        //permohonan kematian
        Route::get('/kematian/index', [App\Http\Controllers\warga\PermohonanKematianController::class, 'index'])->name('kematian.index');
        Route::post('/kematian/store', [App\Http\Controllers\warga\PermohonanKematianController::class, 'store'])->name('kematian.store');
        Route::get('/kematian/delete/{kematian}', [App\Http\Controllers\warga\PermohonanKematianController::class, 'delete'])->name('kematian.delete');
    
        //berita
        Route::get('/berita/index', [App\Http\Controllers\warga\BeritaController::class, 'index'])->name('berita.index');
        
        //profil-desa
        Route::get('/profil-desa/index', [App\Http\Controllers\warga\ProfilDesaController::class, 'index'])->name('profil-desa.index');
    });

    //kades
    Route::group(['namespace' => 'Kades', 'prefix' => 'kades', 'as' => 'kades.'], function(){
        //penduduk
        Route::get('/penduduk/index', [App\Http\Controllers\kades\PendudukController::class, 'index'])->name('penduduk.index');
    });
});

