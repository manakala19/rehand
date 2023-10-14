<?php

use App\Http\Controllers\blogController;
use App\Http\Controllers\ProduksiController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ForgotController;
use App\Http\Controllers\ProduksiView;
use App\Http\Controllers\SessionController;
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
//blog route
Route::get('/', [blogController::class, 'index']);
Route::get('/contact', [blogController::class, 'contact']);
Route::get('/cad', [blogController::class, 'cad']);
Route::get('/fabric', [blogController::class, 'fabric']);
Route::get('/pants', [blogController::class, 'pants']);
Route::get('/tshirt', [blogController::class, 'tshirt']);
Route::get('/shirt', [blogController::class, 'shirt']);
Route::get('/outer', [blogController::class, 'outer']);
//end blog
Route::get('/login', [SessionController::class, 'index'])->name('login');
Route::post('/login/attempt', [SessionController::class, 'attempt']);
Route::group(['middleware' => ['auth', 'cekLevel:operator']], function(){
    Route::get('/logout', [SessionController::class, 'logout']);
    Route::get('/dashboard', [ProduksiView::class, 'index']);
    Route::get('/pas/logout', [ProduksiView::class, 'logout']);
    Route::get('/profile', [ProduksiView::class, 'show']);
    Route::resource('respas',ForgotController::class,);
    Route::resource('data', ProduksiController::class);
});
Route::group(['middleware' => ['auth', 'cekLevel:operator']], function(){
    Route::get('/register', [SessionController::class, 'register']);
    Route::post('/register/create', [SessionController::class, 'create']);
    Route::resource('admin', AdminController::class);
    Route::get('/info', [ProduksiView::class, 'last'])->name('last');
});

