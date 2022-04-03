<?php

use App\Http\Controllers\BrandsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\SizesController;
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

Route::get('/', function () {
    return view('welcome');
});


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    // CATOGERY
    Route::resource('categories', CategoriesController::class)->except(['show']);
    Route::get('/export', [CategoriesController::class, 'export']);
    Route::post('/importexcel', [CategoriesController::class, 'importexcel']);

    // BRAND
    Route::resource('brands', BrandsController::class);
    Route::get('/export/brand', [BrandsController::class, 'export']);
    Route::post('/import/brands', [BrandsController::class, 'importexcel']);

    // Size
    Route::resource('sizes', SizesController::class)->except(['show']);

});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
