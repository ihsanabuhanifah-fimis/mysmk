<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

Route::post('register', 'ApiController@register');
Route::get('users', 'ApiController@users');
Route::post('login', 'ApiController@login');
Route::get('profile','ApiController@profile')->middleware('auth:api');

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });



// Auth::routes();

// Route::get('/Dashboard', 'HomeController@index')->name('dashboard');