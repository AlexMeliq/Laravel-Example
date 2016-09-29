<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


get('/', ['as' => 'home', function () {
    return view('welcome');
}] );





/*post routes*/
get('/blog', ['as' => 'posts', 'uses' => 'PostController@index'] );

Route::get('/blog/unpublished', ['middleware' => 'roles', 'uses' => 'PostController@unpublished'] );

//get('post/create', ['as' => 'post.create', 'uses' => 'PostController@create'] );
//post('post',       ['as' => 'post.store', 'uses' => 'PostController@store'] );
//get('post/[post]', ['as' => 'post.show', 'uses' => 'PostController@show'] );
//delete('post/[post]/destroy', ['as' => 'post.destroy', 'uses' => 'PostController@destroy'] );
//post('post/[post]', ['as' => 'post.update', 'uses' => 'PostController@update'] );

//or use
$router->resource('post', 'PostController');
/*
 * User Routes
 * =================
 * */
get('user/create', ['as' => 'user.create', 'uses' => 'UserController@create'] );
post('/my-users',       ['as' => 'user.store', 'uses' => 'UserController@store'] );




get('/about', ['as' => 'abouts', 'uses' => 'AboutController@index'] );
