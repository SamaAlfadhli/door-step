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

session_start();
Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/register', function () {

    return view('register');
});

Route::get('/resetpassword', function () {
    return view('resetpassword');
});
Route::get('/userprofile', function () {

    return view('userprofile');
});
Route::get('/groceries', function () {

    return view('groceries');
});
