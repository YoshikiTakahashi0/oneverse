<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CloudinaryUploadController;

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

Route::get('/', "HomeController@index");
Route::post('/posts', 'PostController@store');
Route::get('/posts/index', "PostController@index");
Auth::routes();

Route::group(['middleware' => ['auth']], function(){
    Route::get('/posts/create', "PostController@create");
});