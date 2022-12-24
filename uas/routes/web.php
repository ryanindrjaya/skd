<?php

use App\Http\Controllers\Auth\SocialiteController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SellerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User98Controller;
use Illuminate\Support\Facades\Redirect;

/*
|--------------------------------------------------------------------------
| Routing untuk proses autentikasi
|--------------------------------------------------------------------------
*/

Route::get('/logout98', [User98Controller::class, 'logout98']);
Route::post('/register98', [User98Controller::class, 'register98']);
Route::post('/login98', [User98Controller::class, 'login98']);
Route::put('/lupaPassword98', [User98Controller::class, 'lupaPassword98']);

/*
|--------------------------------------------------------------------------
| Routing untuk display halaman
|--------------------------------------------------------------------------
*/
Route::get('/', [HomeController::class, 'index']);
Route::get('/login', [User98Controller::class, 'loginView98'])->middleware('isLogged');
Route::get('/user/profile98', [User98Controller::class, 'userView98'])->middleware('isUser');
Route::get('/admin/dashboard98', [User98Controller::class, 'adminView98'])->middleware('isAdmin');
Route::get('/admin/agama98', [User98Controller::class, 'agamaView98'])->middleware('isAdmin');
Route::put('/setIsAktif98/{id}', [User98Controller::class, 'setIsAktif98'])->middleware('isAdmin');
Route::get('/register98', [User98Controller::class, 'registerView98']);
Route::get('/user/lupaPassword98', [User98Controller::class, 'lupaPasswordView98']);
Route::get('/sellerRegister', [SellerController::class, 'store']);
Route::get('/seller/penjualan', [SellerController::class, 'penjualanView'])->middleware('isSeller');
Route::get('/deleteUser/{id}', [User98Controller::class, 'deleteUser']);
Route::get('/verify/{token}', [User98Controller::class, 'verifyEmail'])->name('user.verify');
Route::get('/verify-email', [User98Controller::class, 'verifyView']);
Route::get('/addPenjualan', [SellerController::class, 'addPenjualanView'])->middleware('isSeller');
Route::post('/addPenjualan', [SellerController::class, 'addPenjualan'])->middleware('isSeller');
Route::get('deleteProduct/{id}', [SellerController::class, 'deleteProduct'])->middleware('isSeller');
Route::get('detailProduct/{id}', [SellerController::class, 'detailProduct']);
Route::get('/catalog', [SellerController::class, 'catalogView']);
Route::get('/admin/produk', [SellerController::class, 'adminProdukView'])->middleware('isAdmin');
Route::put('/setPublished/{id}', [SellerController::class, 'setPublished'])->middleware('isAdmin');

/*
|--------------------------------------------------------------------------
| Routing untuk proses CRUD
|--------------------------------------------------------------------------
*/

Route::put('/updateData98', [User98Controller::class, 'updateData98']);
Route::get('/detailUser98/{id}', [User98Controller::class, 'detailUser98']);
Route::post('/tambahAgama98', [User98Controller::class, 'tambahAgama98']);
Route::put('/updateAgama98/{id}', [User98Controller::class, 'updateAgama98']);
Route::get('/hapusAgama98/{id}', [User98Controller::class, 'hapusAgama98']);

/**
 * socialite auth
 */
Route::get('/auth/{provider}', [SocialiteController::class, 'redirectToProvider']);
Route::get('/auth/{provider}/callback', [SocialiteController::class, 'handleProviderCallback']);
