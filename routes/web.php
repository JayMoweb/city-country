<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CountryStateCity;
use App\Http\Controllers\forgotpasswordController;

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
Route::get('/loginCustom',function(){
	return view('loginCustom');
});

Route::get('/forgotPassword',function(){
	return view('forgotPassword');
});

Route::get('/dashboard',function(){
	return view('dashboard');
})->middleware("auth");

Route::get('/registration',function(){
	return view('registration');
});

Auth::routes();
Route::post('/create',[forgotpasswordController::class,'create'])->name('create');
Route::post('/loginCustom',[forgotpasswordController::class,'loginCustom'])->name('loginCustom');
Route::get('/logoutCustom',[forgotpasswordController::class,'logoutCustom'])->name('logoutCustom');
Route::post('/forgotPassword',[forgotpasswordController::class,'sendEmail'])->name('forgotPassword');
Route::get('/confirmpassword/{token}',[forgotpasswordController::class,'updatePassword'])->name('updatePassword');
Route::post('/saveUpdatePasssword/{token}',[forgotpasswordController::class,'saveUpdatePasssword'])->name('saveUpdatePasssword');


Route::get('/index',[CountryStateCity::class,'countryShow'])->name('index');
Route::post('/state',[CountryStateCity::class,'stateShow'])->name('state');
Route::post('/city',[CountryStateCity::class,'showCity'])->name('city');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
