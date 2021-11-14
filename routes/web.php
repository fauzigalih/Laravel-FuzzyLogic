<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SettingController;

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

Route::get('/', [HomeController::class, 'index']);
Route::get('/home/store', [HomeController::class, 'store']);
Route::get('/result', [HomeController::class, 'result']);

Route::resource('data', DataController::class);
Route::resource('setting', SettingController::class);


Route::get('/about', function () {
return view('about.index', [
        'title' => 'About'
    ]);
});