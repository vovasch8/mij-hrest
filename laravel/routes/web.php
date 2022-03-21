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

Route::get('/', 'SiteController@showSite')->name('home');
Route::get('/article/{id}', 'SiteController@showArticle')->name('article');
Route::get('/filter-articles/{id}', 'SiteController@filterArticles')->name('filter-articles');
Route::get('/calendar', 'SiteController@showCalendar')->name('calendar');
Route::get('/forum', 'SiteController@showForum')->name('forum');
Route::get('/dictionary', 'SiteController@showDictionary')->name('dictionary');

Route::get('/profile', 'CabinetController@showProfile')->middleware(['auth'])->name('profile');
Route::get('/editProfile', 'UserController@editProfile')->middleware(['auth'])->name('editProfile');


//Admin routes
Route::get('/admin-home', 'AdminController@showAdminPanel')->middleware(['auth'])->name('admin-home');

Route::get('/admin-home/addBlock', 'AdminController@addBlock')->middleware(['auth'])->name('addBlock');
Route::get('/admin-home/addLink', 'AdminController@addLink')->middleware(['auth'])->name('addLink');
Route::get('/admin-home/editLink', 'AdminController@editLink')->middleware(['auth'])->name('editLink');
Route::get('/admin-home/deleteLink', 'AdminController@deleteLink')->middleware(['auth'])->name('deleteLink');

Route::get('/admin-articles', 'AdminController@showArticlesPanel')->middleware(['auth'])->name('admin-articles');

Route::get('/admin-articles/addCategory', 'ArticleController@addCategory')->middleware(['auth'])->name('addCategory');
Route::get('/admin-articles/addArticle', 'ArticleController@addArticle')->middleware(['auth'])->name('addArticle');
Route::get('/admin-articles/editArticle', 'ArticleController@editArticle')->middleware(['auth'])->name('editArticle');
Route::get('/admin-articles/deleteArticle', 'ArticleController@deleteArticle')->middleware(['auth'])->name('deleteArticle');

require __DIR__.'/auth.php';
