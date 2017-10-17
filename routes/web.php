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
//Comments
Route::post('comments/{post_id}', ['uses' => 'CommentsController@store','as' => 'comments.store']);
Route::get('comments/{id}/edit', ['uses' => 'CommentsController@edit', 'as' => 'comments.edit']);
Route::put('comments/{id}', ['uses' => 'CommentsController@update', 'as' => 'comments.update']);
Route::delete('comments/{id}', ['uses' => 'CommentsController@destroy', 'as' => 'comments.destroy']);
Route::get('comments/{id}/delete', ['uses' => 'CommentsController@delete', 'as' => 'comments.delete']);
Route::get('comments/{id}', ['uses' => 'CommentsController@delete', 'as' => 'comments.show']);

Route::get('comments', ['uses' => 'CommentsController@index', 'as' => 'comments.index']);

Route::resource('tags', 'TagController', ['except' => ['create']]);

Route::resource('skills', 'SkillController', ['except' => ['create']]);

Route::resource('categories', 'CategoryController', ['except' => ['create']]);

Route::get('blog/{slug}', ['as' => 'blog.single', 'uses' => 'BlogController@getSingle'])->where('slug', '[\w\d\-\_]+');

Route::get('blog/category/{category}', ['as' => 'blog.category', 'uses' => 'BlogController@getCategory'])->where('category', '[\w\d\-\_]+');

Route::get('blog', ['uses' => 'BlogController@getIndex','as' => 'blog.index']);

Route::delete('blog/{id}', ['uses' => 'BlogController@comment_destory', 'as' => 'blog.comment_destory']);

Route::get('browse',['uses' => 'BrowseController@getIndex', 'as' => 'browse']);


Route::get('/', 'BrowseController@getMain');

Route::get('about', 'BrowseController@getAbout');

Route::get('contact', 'BrowseController@getContact');
Route::post('contact', 'BrowseController@postContact');

Route::resource('posts', 'PostController');

Route::resource('profile', 'ProfileController');

Route::resource('contacts', 'ContactController');

Route::resource('alerts', 'AlertController', ['except' => ['edit','update']]);

Auth::routes();

Route::get('/admin', 'AdminController@index');

Route::resource('users', 'UserController');

Route::resource('pages', 'PagesController');

// Route::get('search', 'ContactController@search');
Route::get('search', 'BrowseController@search');

