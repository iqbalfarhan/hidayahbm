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

Route::get('/', 'WebController@index')->name('guest.index');
Route::get('/menu/{slug?}', 'WebController@menu')->name('guest.menu');
Route::get('/profil/{slug?}', 'WebController@profil')->name('guest.profil');
Route::get('/legalitas', 'WebController@legalitas')->name('guest.legalitas');
Route::get('/galeri', 'WebController@galeri')->name('guest.galeri');
Route::get('/kegiatan/{slug?}', 'WebController@kegiatan')->name('guest.kegiatan');
Route::post('/kirim/whatsapp', 'WebController@kirimwhatsapp')->name('kirim.whatsapp');

Auth::routes([
    'register' => FALSE
]);

Route::group(['middleware' => 'auth'], function(){
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/profile', 'HomeController@profile')->name('profile');
    Route::get('/terminal', 'HomeController@terminal')->name('terminal');

    Route::group(['prefix' => 'finance', 'middleware' => 'ceklevel:finance'], function(){
        Route::get('transaksi', 'Finance\TransaksiController@index')->name('finance.transaksi.index');
        Route::get('pinjaman', 'Finance\PinjamanController@index')->name('finance.pinjaman.index');
        Route::get('pemasukan/{pemasukan}', 'Finance\PemasukanController@show')->name('finance.pemasukan.show');
        Route::get('pemasukan', 'Finance\PemasukanController@index')->name('finance.pemasukan.index');
        Route::get('pengeluaran', 'Finance\PengeluaranController@index')->name('finance.pengeluaran.index');
        Route::resource('user', 'UserController');
    });

    Route::group(['prefix' => 'gudang', 'middleware' => 'ceklevel:gudang'], function(){
        Route::get('barang/transaksi', 'Gudang\BarangController@transaksi')->name('barang.transaksi');
        Route::resource('alat', 'Gudang\AlatController');
        Route::resource('barang', 'Gudang\BarangController');
        Route::resource('transaksi', 'Gudang\TransaksiController');
    });

    Route::group(['prefix' => 'report', 'middleware' => 'ceklevel:report'], function(){

    });

    Route::group(['prefix' => 'view', 'middleware' => 'ceklevel:view'], function(){

    });

    Route::group(['prefix' => 'adminweb', 'middleware' => 'ceklevel:web'], function(){
        Route::get('profil', 'Webprofile\ProfilController@index')->name('web.profil.index');

        Route::get('profil/strorg', 'Webprofile\ProfilController@strorg')->name('web.profil.strorg');
        Route::get('profil/rekanan', 'Webprofile\ProfilController@rekanan')->name('web.profil.rekanan');
        Route::get('profil/layanan', 'Webprofile\LayananController@index')->name('web.layanan');

        Route::get('legalitas', 'Webprofile\LegalitasController@index')->name('web.legalitas');
        Route::get('galeri', 'Webprofile\GaleriController@index')->name('web.galeri');
        Route::get('kegiatan', 'Webprofile\KegiatanController@index')->name('web.kegiatan');
        Route::get('paket/', 'Webprofile\PaketController@index')->name('web.paket');
    });
});
