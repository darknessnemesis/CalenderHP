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
Route::get('/adminwaitleave', function () {
    return view('admin_waitleave');
});
Route::get('/adminhistoryleave', function () {
    return view('admin_historyleave');
});
Route::get('/adminstatic', function () {
    return view('admin_static');
});
Route::get('/adminmember', function () {
    return view('admin_member');
});
Route::get('/homepage', function () {
    return view('homepage');
});



//Route for normal user
Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@index');
});
//Route for admin
Route::group(['prefix' => 'admin'], function(){
    Route::group(['middleware' => ['admin']], function(){
        Route::get('/admin', 'admin\AdminController@index');
    });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

