<?php

use Illuminate\Support\Facades\Auth;
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

use \App\Http\Controllers\Admin\Account\IndexController as AccountController;
use \App\Http\Controllers\NewsController;
use \App\Http\Controllers\Admin\ParserController;
use \App\Http\Controllers\SocialController;
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
        Route::get('/', AccountController::class)->name('login');
        Route::get('/logout', function () {
            Auth::logout();
            return redirect()->route('login');
        })->name('account.logout');

    });
    });
//admin
    Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
        Route::resource('/categories', AdminCategoryController::class);
        Route::resource('/news', AdminNewsController::class);
        Route::get('/parser', [ParserController::class, 'index']);
        Route::resource('/account', AccountController::class);
        Route::get('/logout', function () {
            Auth::logout();
            return redirect()->route('login');
        })->name('admin.logout');
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
Route::group(['middleware' => 'guest'], function () {
    Route::get('/login/vk', [SocialController::class, 'login'])
        ->name('vk.login');
    Route::get('/callback/vk', [SocialController::class, 'callback'])
        ->name('vk.callback');
    Route::get('/login/facebook/', [SocialController::class, 'loginFB'])
        ->name('fb.login');
    Route::get('/login/callback/facebook', [SocialController::class, 'callbackFB'])
        ->name('fb.callback');
    Route::get('privacy_policy', [SocialController::class, 'privacy_policy'])
        ->name('callback');
    Route::get('/terms', [SocialController::class, 'terms'])
        ->name('terms');
});
