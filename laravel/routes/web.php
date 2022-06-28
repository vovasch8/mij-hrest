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
Route::get('/category-articles/{id}', 'SiteController@filterArticles')->name('category-articles');
Route::post('/loadArticles', 'SiteController@loadArticles')->name('loadArticles');
Route::get('/calendar', 'SiteController@showCalendar')->name('calendar');
Route::get('/dictionary', 'SiteController@showDictionary')->name('dictionary');

Route::get('/forum', 'SiteController@showForum')->name('forum');
Route::get('/forum/category/{id}', 'ForumController@showForumCategory')->name('filter-topics');
Route::get('/forum/topic/{id}', 'ForumController@showTopic')->name('topic');
Route::get('/forum/createTopic', 'ForumController@createTopic')->name('createTopic');
Route::get('/forum/createReply', 'ForumController@createReply')->name('createReply');

Route::post('/forum/sendMessage', 'ForumController@sendMessage')->name('sendMessage');
Route::post('/forum/sortTopics', 'ForumController@sortTopics')->name('sortTopics');
Route::post('/forum/searchTopics', 'ForumController@searchTopics')->name('searchTopics');
Route::post('/forum/searchReply', 'ForumController@searchReply')->name('searchReply');

Route::get('/forum/forumAddCategory', 'ForumController@addCategory')->name('forumAddCategory');
Route::get('/forum/forumEditCategory', 'ForumController@editCategory')->name('forumEditCategory');
Route::get('/forum/forumDeleteCategory', 'ForumController@deleteCategory')->name('forumDeleteCategory');

Route::get('/forum/editTopic', 'ForumController@editTopic')->name('editTopic');
Route::get('/forum/deleteTopic', 'ForumController@deleteTopic')->name('deleteTopic');


Route::get('/profile', 'CabinetController@showProfile')->middleware(['auth'])->name('profile');
Route::get('/editProfile/{id}', 'UserController@editProfile')->middleware(['auth'])->name('editProfile');
Route::get('/user/{id}', 'CabinetController@showUser')->middleware(['auth'])->name('user');

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
Route::get('/admin-category-articles/{id}', 'AdminController@filterArticles')->name('admin-category-articles');
Route::post('/loadAdminArticles', 'AdminController@loadAdminArticles')->name('loadAdminArticles');

Route::get('/admin-users', 'AdminController@showUsersPanel')->middleware(['auth'])->name('admin-users');

Route::get('/admin-users/deleteUser', 'UserController@deleteUser')->middleware(['auth'])->name('deleteUser');
Route::get('/admin-users/editRole', 'UserController@editRole')->middleware(['auth'])->name('editRole');

Route::get('/admin-forum', 'AdminController@showForumPanel')->middleware(['auth'])->name('admin-forum');

require __DIR__.'/auth.php';
