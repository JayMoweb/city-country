<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CountryStateCity;

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
Route::get('/index', function () {
    return view('index');
});
Route::get('/validation', function () {
    return view('validation	');
});
Auth::routes();
Route::get('/index',[CountryStateCity::class,'countryShow'])->name('index');
Route::post('/state',[CountryStateCity::class,'stateShow'])->name('state');
Route::post('/city',[CountryStateCity::class,'showCity'])->name('city');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
