<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\SettingController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->group(function(){
    Auth::routes();
    Route::group(['middleware' => 'auth'], function(){
        // Dashboard
        Route::get('/', [HomeController::class, 'index'])->name('home');
        //Setting 
        Route::match(['get', 'post'], '/setting/profile',[SettingController::class,'profile'])->name('setting.profile');
        Route::match(['get', 'post'], '/setting/password',[SettingController::class,'password'])->name('setting.password');
        /* CATEGORY */ 
        Route::get('/category',[CategoryController::class,'index'])->name('category');
        Route::match(['get', 'post'], '/category/create',[CategoryController::class,'create'])->name('category.create');

    });
});
