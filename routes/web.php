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
// Route::group(['middleware' => ['auth', 'admin']], function () {
//     Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// });

// Route::group(['middleware' => ['auth', 'post']], function () {
//     Route::resource('posts', App\Http\Controllers\PostController::class);
// });

Route::get('index', 'App\Http\Controllers\Admin\AdminController@index');

Route::match(['get', 'post'], 'register', 'App\Http\Controllers\Admin\AdminController@register');
Route::match(['get', 'post'], 'login', 'App\Http\Controllers\Admin\AdminController@login');

Route::group(['middleware' => ['admin']], function () {


    Route::match(['get', 'post'], 'edit-detail/{id}', 'App\Http\Controllers\Admin\AdminController@editDetail');

    Route::get('active-users', 'App\Http\Controllers\Admin\AdminController@activeUsers');
    Route::get('view-detail/{id}', 'App\Http\Controllers\Admin\AdminController@viewDetail');

    Route::resource('posts', App\Http\Controllers\PostController::class);
    Route::get('block-post/{id}', 'App\Http\Controllers\PostController@blockPost');

    Route::get('unblock-post/{id}', 'App\Http\Controllers\PostController@unblockPost');

    Route::resource('comments', App\Http\Controllers\CommentController::class);

    Route::get('comments/{comment}', [App\Http\Controllers\CommentController::class, 'destroy'])->name('comments.destroy');

    Route::post('like', 'App\Http\Controllers\Post\LikeDislikeController@likeDislike')->name('like');

    Route::get('block-user/{id}', 'App\Http\Controllers\Admin\AdminController@blockUser');

    Route::get('unblock-user/{id}', 'App\Http\Controllers\Admin\AdminController@unblockUser');

    Route::get('blocked-user', 'App\Http\Controllers\Admin\AdminController@blockedUser');

    Route::get('delete-user/{id}', 'App\Http\Controllers\Admin\AdminController@deleteUser');

    Route::get('dropdown', 'App\Http\Controllers\Admin\AdminController@dropdown');
    Route::get('logout', 'App\Http\Controllers\Admin\AdminController@logout');
});
