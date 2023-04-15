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
Route::controller(NewsController::class)->prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('news/create', 'add')->name('news.add');
    Route::post('news/create', 'create')->name('news.create');
    // 以下を追記 Laravel15
    Route::get('news', 'index')->name('news.index');
    // 以下を追記 Laravel16 データの更新
    Route::get('news/edit', 'edit')->name('news.edit');
    Route::post('news/edit', 'update')->name('news.update');
    // 以下を追記 Laravel16 データの削除
    Route::get('news/delete', 'delete')->name('news.delete');
});

// 課題3：Laravel09
use App\Http\Controllers\AAAController;
Route::get('xxx', [AAAController::class, 'bbb']);

// 課題4：Laravel09, 課題：Laravel12, 課題：Laravel13
use App\Http\Controllers\Admin\ProfileController;
Route::controller(ProfileController::class)->prefix('admin')->name('admin.')->middleware('auth')->group(function() {
    Route::get('profile/create', 'add')->name('profile.add');
    Route::get('profile/edit', 'edit')->name('profile.edit');
    Route::post('profile/create', 'create')->name('profile.create');
    Route::post('profile/edit', 'update')->name('profile.update');
    // 課題：Laravel16
    Route::get('profile', 'index')->name('profile.index');
    Route::get('profile/delete', 'delete')->name('profile.delete');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
