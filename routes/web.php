<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CloudinaryUploadController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by theS RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => ['auth']], function(){
    Route::get('/posts/create', 'PostController@create');
    Route::delete('/posts/destroy/{post}', 'PostController@destroy');
    Route::post('/reviews', 'ReviewController@store');
    Route::get('/mypage/{user}', 'UserController@mypage');
    Route::get('/mypage/{user}/edit', 'UserController@edit');
    Route::put('/mypage/{user}', 'UserController@update');
    Route::get('/users/{user}/follow', 'FollowerController@follow');
    Route::get('/users/{user}/unfollow', 'FollowerController@unfollow');
});

Route::get('/', 'HomeController@index');
Route::get('/about', 'HomeController@about');
Route::post('/posts', 'PostController@store');
Route::get('/posts/index', 'PostController@index');
Route::get('/posts/{post}','PostController@show');
Route::get('/tags/index','TagController@index');
Route::get('/tags/{tag}','TagController@posts_sort');
Route::get('/tags/{tag}/rank', 'TagController@rank_posts');
Route::get('/rank', 'PostController@rank');
Route::get('/rank/reviews', 'PostController@rank_reviews');
Route::get('/rank/users', 'UserController@rank');
Route::get('/users/{user}', 'UserController@show');
Auth::routes();