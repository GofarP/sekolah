<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\AkunController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PengumumanController;



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



Route::get('/',[HomeController::class, 'index']);
Route::get('artikel',[HomeController::class,'artikel']);
Route::get('artikel/{artikel}',[HomeController::class,'artikelDetail']);
Route::get('artikel', [HomeController::class, 'artikelSearch'])->name('search');
Route::get('artikel/kategori/{slug}',[HomeController::class,'kategoriSearch'])->name('kategori');

Route::get('pengumuman',[HomeController::class,'pengumuman']);
Route::get('pengumuman/{pengumuman}',[HomeController::class,'pengumumanDetail']);

Route::get('agenda',[HomeController::class,'agenda']);

Route::get('test',[HomeController::class,'testImage']);

Route::get('kategori',[HomeController::class,'showKategori']);

Route::get('/login', [LoginController::class, 'index'])->middleware('guest')->name('login');
Route::post('login',[LoginController::class,'authenticate']);
Route::post('/logout',[LoginController::class,'logout']);


Route::group(['prefix'=>'admin', 'middleware' => ['auth']], function(){
    Route::get('/dashboard',[DashboardController::class,'index']);

    Route::get('/artikel/createslug',[ArtikelController::class,'checkSlug']);
    Route::get('/kategori/createslug',[KategoriController::class,'checkSlug']);
    Route::get('/pengumuman/createslug',[PengumumanController::class,'checkSlug']);
    Route::get('/agenda/createslug',[AgendaController::class,'checkSlug']);

    Route::post('/akun/settings/password',[AkunController::class,'updatePassword'])->name('updatePassword');
    Route::post('/akun/settings/username',[AkunController::class,'updateUsername'])->name('updateUsername');

    Route::resource('/artikel',ArtikelController::class);
    Route::resource('/kategori',KategoriController::class);
    Route::resource('/pengumuman',PengumumanController::class);
    Route::resource('/agenda',AgendaController::class);
    Route::resource('/settings',AkunController::class,[
        'names'=>[
            'index'=>'settings.index',
            ]
        ]);
});
