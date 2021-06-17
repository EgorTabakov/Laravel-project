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

use \App\Http\Controllers\Account\IndexController as AccountController;
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
Route::get('/feedback', [InfoPagesController::class, 'feedback']);
Route::post('/feedback', [InfoPagesController::class, 'store']);
Route::get('/order', [InfoPagesController::class, 'order']);
Route::post('/order', [InfoPagesController::class, 'orderStore']);
//account
Route::group(['middleware' => 'auth'], function () {
    Route::group(['prefix' => 'account'], function () {
        Route::get('/', AccountController::class)->name('account');
        Route::get('/logout', function () {
            \Auth::logout();
            return redirect()->route('login');
        })->name('account.logout');

        Route::get('/edit', [AccountController::class, 'edit'])->name('account.edit');
        Route::post('/update', [AccountController::class, 'update'])->name('account.update');
        Route::get('/index', [AccountController::class, 'index'])->name('account.index');
        Route::get('/destroy', [AccountController::class, 'destroy'])->name('account.destroy');
    });
//admin
    Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
        Route::resource('/categories', AdminCategoryController::class);
        Route::resource('/news', AdminNewsController::class);

    });
});

//news
Route::get('/news', [NewsController::class, 'index']);

Route::get('/news/{id}', [NewsController::class, 'show'])
    ->name('news.show')
    ->where('id', '\d+');

Route::get('/news/categories', [NewsController::class, 'categories'])
    ->name('news.categories');

Route::get('/news/categories-{id}', [NewsController::class, 'categoriesShow'])
    ->name('news.categoriesShow');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
