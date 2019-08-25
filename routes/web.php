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

Route::get('/posts', 'PostController@index')->name('posts.index');
Route::get('/posts/{postId}', 'PostController@view')->name('posts.view');

Route::group([
	'prefix' => 'posts',
	'permission' => 'can-add-post'
], function () {

	Route::get('/add', 'PostController@add')
		->name('posts.add');

	Route::get('/create', 'PostController@create')
		->name('posts.create');

});

//Route::get('add-permission', function() {
//	Permission::create([
//		'name' => 'can-add-post'
//	]);
//
//	$user = User::find(1);
//	$user->givePermissionTo('can-add-post');
//});
