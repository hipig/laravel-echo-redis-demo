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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/echo', function () {
    return view('echo');
 })->middleware('auth');


Route::get('/privatePush/{user}/{message}', function (\App\User $user, $message) {
    broadcast(new \App\Events\PrivateMessageEvent($user, $message));
});
