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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/blog','BlogPostsController@index')->name('blog');

Route::get('/post/{id}','BlogPostsController@show')->name('home.post');

Route::get('/search','BlogPostsController@search');

Route::get('/user/{id}','UsersProfileController@show')->name('profile');

Route::get('/user/edit/{id}','UsersProfileController@edit')->name('edit.profile');



Route::get('/post-category/{id}','AdminCategoriesController@categoryPosts')->name('category.posts');

Route::get('/logout',function(){

    auth()->logout();

    return redirect('/');

});


Route::group(['middleware' => 'admin'],function(){

    Route::get('/admin',function(){

        return view('admin.index');
    
    });

    Route::resource('admin/users','AdminUsersController');

    Route::resource('admin/posts','AdminPostsController');

    Route::resource('admin/categories','AdminCategoriesController');

    Route::resource('admin/media','AdminMediasController');

    Route::resource('admin/comments','PostCommentsController');

    Route::resource('admin/comment/replies','CommentRepliesController');

    Route::delete('admin/delete/media', 'AdminMediasController@deleteMedia');

});

Route::group(['middleware' => 'auth'],function(){

    Route::post('comment/reply','CommentRepliesController@createReply');

    Route::post('comment','PostCommentsController@store');

    Route::post('/create/post','AdminPostsController@store');

    Route::get('/create','BlogPostsController@create');

    Route::resource('/user','UsersProfileController');

});

