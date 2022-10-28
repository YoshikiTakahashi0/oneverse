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
    Route::post('/reviews', 'ReviewController@store');
});

Route::get('/', 'HomeController@index');
Route::post('/posts', 'PostController@store');
Route::get('/posts/index', 'PostController@index');
Route::get('/posts/{post}','PostController@show');
Route::get('/tags/index','TagController@index');
Route::get('/tags/{tag}','TagController@posts_sort');
ROute::get('/rank', 'PostController@rank');
Auth::routes();