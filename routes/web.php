<?php

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


Route::prefix('/Reservasion')->group(function () {
    Route::post('/process', [ReservasionController::class, 'insertReservasion']);
    Route::get('/view/{id}', [ReservasionController::class, 'getReservationTransactionsUser']);
});

Route::prefix('/Contact')->group(function () {
    Route::post('/process', [ContactController::class, 'insertContact']);
    Route::get('/view/{id}', [ContactController::class, 'getContactTransactionsUser']);
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/service', function () {
    return view('services');
});

Route::get('/menu', function () {
    return view('menu');
});

Route::get('/reservation', function () {
    return view('reservasion');
});

Route::get('/testimonial', function () {
    return view('testimonial');
});

Route::get('/contact', function () {
    return view('contact');
});