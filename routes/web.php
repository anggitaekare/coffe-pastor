<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Reservasion;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReservasionController;
use App\Http\Controllers\ContactController;

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

    });


});


Route::prefix('/Reservasion')->group(function () {
    Route::post('/process', [ReservasionController::class, 'insertReservasion']);
    Route::get('/view/{id}', [ReservasionController::class, 'getReservationTransactionsUser']);
});

Route::prefix('/Contact')->group(function () {
    Route::post('/process', [ContactController::class, 'insertContact']);
    Route::get('/view/{id}', [ContactController::class, 'getContactTransactionsUser']);
});

Route::get('/about', function () {
    return view('user.about');
});

Route::get('/service', function () {
    return view('user.services');
});

Route::get('/menu', function () {
    return view('user.menu');
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

