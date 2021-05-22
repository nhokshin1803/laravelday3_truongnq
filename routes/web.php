<?php

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

use App\Http\Resources\User as UserResource;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('form', 'FormController@index')->name('form');

Route::post('form', 'FormController@store');
        
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/upload', 'UserController@uploadAvatar');

Route::get('/user', function () {
    return new UserResource(User::find(1));
});

Route::get('exception/index', 'ExceptionController@index');