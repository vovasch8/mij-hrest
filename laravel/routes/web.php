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
    return view('home');
})->name('home');

Route::get('/forum', function () {
    return view('forum');
})->name('forum');

Route::get('/calendar', function () {
    return view('calendar');
})->name('calendar');

Route::get('/dictionary', function () {
    return view('dictionary');
})->name('dictionary');

Route::get('/admin-home', 'AdminController@showAdminPanel')->middleware(['auth'])->name('admin-home');

Route::get('/admin-home/addBlock', 'AdminController@addBlock')->middleware(['auth'])->name('addBlock');
Route::get('/admin-home/addLink', 'AdminController@addLink')->middleware(['auth'])->name('addLink');
Route::get('/admin-home/editLink', 'AdminController@editLink')->middleware(['auth'])->name('editLink');
Route::get('/admin-home/deleteLink', 'AdminController@deleteLink')->middleware(['auth'])->name('deleteLink');

require __DIR__.'/auth.php';
