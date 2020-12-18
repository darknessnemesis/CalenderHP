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
Route::get('/adminwait', function () {
    return view('admin_wait');
});
Route::get('/adminhistory', function () {
    return view('admin_history');
});
Route::get('/adminamount', function () {
    return view('admin_amount');
});
Route::get('/adminmember', function () {
    return view('admin_member');
});
Route::get('/adminstatic', function () {
    return view('admin_static');
});
Route::get('/admintest', function () {
    return view('admin_test');
});
Route::get('/homepage', function () {
    return view('homepage');
});
Route::get('/test', function () {
    return view('admin/homepage.blade.php');
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

