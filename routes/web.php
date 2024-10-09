<?php

use App\Http\Controllers\AuthManager;
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
})->name('home');

Route::get('/login',[AuthManager::class,'login'])->name('login');
Route::post('/login',[AuthManager::class,'loginPost'])->name('login.post');
Route::get('/registration',[AuthManager::class,'registration'])->name('registration');
Route::post('/registration',[AuthManager::class,'registrationPost'])->name('registration.post');
Route::get('/logout',[AuthManager::class,'logout'])->name('logout');
Route::group(['middleware'=> 'auth'],function(){
    Route::get('/profile',function (){
        return "hi";
    });

});
Route::get('catergories',[App\Http\Controllers\CategoryController::class,'index']);
Route::get('catergories/create',[App\Http\Controllers\CategoryController::class,'create']);
Route::post('catergories/create',[App\Http\Controllers\CategoryController::class,'store']);
Route::get('catergories/{id}/edit', [App\Http\Controllers\CategoryController::class,'edit']);
Route::put('catergories/{id}/edit', [App\Http\Controllers\CategoryController::class,'update']);
Route::get('catergories/{id}/delete', [App\Http\Controllers\CategoryController::class,'destroy']);


