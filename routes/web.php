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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
	return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group([
	'middleware' => 'permission:can-add-post',
	'prefix' => 'posts'
], function () {
	Route::get('/add', 'PostController@add')->name('posts.add');
	Route::get('/create', 'PostController@create')->name('posts.create');
});

Route::group([
	'prefix' => 'posts'
], function () {
	Route::get('/', 'PostController@index')->name('posts.index');
	Route::get('/{postId}', 'PostController@view')->name('posts.view');
	Route::get('/like/{postId}', 'PostController@like')->name('posts.like');
	Route::get('/follow/{postId}', 'PostController@follow')->name('posts.follow');

});


//Route::get('add-permission', function() {
//	Permission::create([
//		'name' => 'can-read-post'
//	]);
//
//	$user = User::find(2);
//	$user->givePermissionTo('can-read-post');
//});
