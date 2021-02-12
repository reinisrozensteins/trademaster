<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StockControlller;

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

Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::prefix('stock')->group(function () {

        Route::get('/', [StockControlller::class, 'index'])->name('stock');

        Route::get('/add', [StockControlller::class, 'create'])->name('stock.add');
        Route::post('/add', [StockControlller::class, 'store']);

    });

});
