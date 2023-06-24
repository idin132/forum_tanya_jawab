<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;


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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [LoginController::class, 'login'])->name('login');
Route::post('actionlogin', [LoginController::class, 'actionlogin'])->name('actionlogin');
Route::post('actionlogout', [LoginController::class, 'actionlogout'])->name('actionlogout');

Route::resource('register', RegisterController::class);



Route::middleware('auth')->group(function () {

    Route::get('/profile', function () {
        return view('profile.index');
    })->name('profile');

    Route::get('edit', function () {
        return view('profile.edit');
    })->name('edit');

    Route::post('/profile', [UserController::class, 'edit'])->name('profile.edit');


    Route::get('home', [HomeController::class, 'index'])->name('home.index');

    Route::get('categories', [CategoriesController::class, 'index'])->name('categories.index');
    Route::resource('cat', CategoriesController::class);
});
