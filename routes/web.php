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
    if (isset($_SESSION["user"])) {
        return redirect('/userprofile');
    }
    return view('login');
});

Route::get('/register', function () {
    if (isset($_SESSION["user"])) {
        return redirect('/userprofile');
    }
    return view('register');
});

Route::get('/resetpassword', function () {
    return view('resetpassword');
});
Route::get('/userprofile', function () {
    // if (!isset($_SESSION["user"])) {
    //     return abort('404');
    // }
    return view('userprofile');
});
