<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/user/{user}/posts', 'PostController@byUser');

Route::get('/posts/avg-ratings', 'PostController@avgRatings');

Route::get('/posts/{post}', 'PostController@show');

Route::get('/posts/rating/{rt}', 'PostController@byAboveRating');


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
