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
use \App\Http\Controllers\NewsController;
use \App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use \App\Http\Controllers\Admin\NewsController as AdminNewsController;
use \App\Http\Controllers\InfoPagesController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello/{name}', function (string $name) {
    return 'welcome ' . $name;
});

Route::get('/about', [InfoPagesController::class, 'about']);

//admin
Route::group(['prefix'=> 'admin'], function(){
    Route::resource('/categories', AdminCategoryController::class);
    Route::resource('/news', AdminNewsController::class);
});

//news
Route::get('/news', [NewsController::class, 'index'])
    ->name('news.index');

Route::get('/news/{id}', [NewsController::class, 'show'])
    ->name('news.show')
    ->where('id', '\d+');

Route::get('/news/categories', [NewsController::class, 'categories'])
    ->name('news.categories');

Route::get('/news/categories-{id}', [NewsController::class, 'categoriesShow'])
    ->name('news.categoriesShow');
