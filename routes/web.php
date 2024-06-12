<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReservasionController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\KategoriController;
use App\Models\Kategori;
use App\Models\Produk;

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


Route::prefix('/admin')->group(function () {
    Route::get('/loginView', function () {
        return view('admin.login_admin');
    });
    Route::post('/login', [AdminController::class, 'loginAdmin']);
    Route::post('/register', [AdminController::class, 'insertAdmin']);

    Route::middleware(['myauth'])->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboardAdmin']);
        Route::get('/view', [AdminController::class, 'getAdmin']);
        Route::get('/logout', [AdminController::class, 'logoutAdmin']);

        Route::prefix('/reservasion')->group(function () {
            Route::get('/view', [ReservasionController::class, 'getReservationTransactions']);
            Route::post('/process', [ReservasionController::class, 'insertReservasion']);
        
        });
        Route::prefix('/produk')->group(function () {
            Route::post('/create', [ProdukController::class, 'insertProduk']);
            Route::get('/view', [ProdukController::class, 'getProduks']);
            Route::get('/view/{id}', [ProdukController::class, 'getOneProduk']);
            Route::post('/delete/{id}', [ProdukController::class, 'deleteProduk']);
            Route::post('/update/process/{id}', [ProdukController::class, 'update']);
        
        });

        Route::prefix('/kategori')->group(function () {
            Route::post('/create', [KategoriController::class, 'insertKategori']);
            Route::get('/view', [KategoriController::class, 'getKategoris']);
            Route::get('/view/{id}', [KategoriController::class, 'getOneKategori']);
            Route::post('/delete/{id}', [KategoriController::class, 'deleteKategori']);
            // Route::post('/update/process/{id}', [KategoriController::class, 'update']);
        
        });
    });

    


});


Route::prefix('/Reservasion')->group(function () {
    Route::post('/process', [ReservasionController::class, 'insertReservasion']);

});

Route::prefix('/Contact')->group(function () {
    Route::post('/process', [ContactController::class, 'insertContact']);
    Route::get('/view/{id}', [ContactController::class, 'getContactTransactionsUser']);
});

Route::get('/viewMenu', [ProdukController::class, 'getProdukView']);

Route::get('/about', function () {
    return view('user.about');
});

Route::get('/service', function () {
    return view('user.services');
});


Route::get('/reservation', function () {
    return view('user.reservasion');
});

Route::get('/testimonial', function () {
    return view('user.testimonial');
});

Route::get('/contact', function () {
    return view('user.contact');
});

