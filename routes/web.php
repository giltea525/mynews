<?php

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

use App\Http\Controllers\Admin\NewsController;
Route::controller(NewsController::class)->prefix('admin')->group(function()
{
    Route::get('news/create', 'add')->middleware('auth');
});

// 課題3：Laravel09
use App\Http\Controllers\AAAController;
Route::get('xxx', [AAAController::class, 'bbb']);

// 課題4：Laravel09
use App\Http\Controllers\Admin\ProfileController;
Route::controller(ProfileController::class)->prefix('admin/profile')->group(function()
{
    Route::get('create', 'add')->middleware('auth');
    Route::get('edit', 'edit')->middleware('auth');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
