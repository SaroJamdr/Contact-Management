<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[HomeController::class,'index']);

Route::get('register',[AuthController::class,'register_page'])->name('register');
Route::post('register',[AuthController::class,'register']);
Route::get('login',[AuthController::class,'login_page'])->name('login');
Route::post('login',[AuthController::class,'login']);

Route::get('/home',[HomeController::class,'index'])->name('homePage');

Route::get('/contact',[ContactController::class,'index'])->name('contacts');
Route::get('/contact/create',[ContactController::class,'create'])->name('create.contact');
Route::post('/contact/create',[ContactController::class,'store']);
Route::get('/contact/edit/{id}',[ContactController::class,'edit'])->name('edit.contact');
Route::post('/contact/edit/{id}',[ContactController::class,'update']);