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

Route::get('/','PostController@home_page')->name('home_page');

Auth::routes();
//admin
Route::prefix('admin')->group(function () {
  Route::get('/', 'AdminController@index')->name('admin.dashboard');
  Route::get('dashboard', 'AdminController@index')->name('admin.dashboard');
  Route::get('register', 'AdminController@create')->name('admin.register');
  Route::post('register', 'AdminController@store')->name('admin.register.store');
  Route::get('login', 'Auth\AdminLoginController@login')->name('admin.auth.login');
  Route::post('login', 'Auth\AdminLoginController@loginAdmin')->name('admin.auth.loginAdmin');
  Route::post('logout', 'Auth\AdminLoginController@logout')->name('admin.auth.logout');

  Route::group(['middleware' => ['web','auth:admin']], function () {
//managing posts
  Route::get('/posts','AdminPostController@index')->name('admin.posts');
  Route::post('/posts/store','AdminPostController@store')->name('admin.posts.store');
  Route::get('/posts/edit/{id}','AdminPostController@edit')->name('admin.posts.edit');
  Route::post('/posts/update/{id}','AdminPostController@update')->name('admin.posts.update');
  Route::get('/posts/delete/{id}','AdminPostController@destroy')->name('admin.posts.delete');

  //managing categories
  Route::get('/categories', 'AdminCategoryController@index')->name('admin.categories');
  Route::get('/categories/add', 'AdminCategoryController@create')->name('admin.categories.create');
  Route::post('/category/store','AdminCategoryController@store')->name('admin.categories.store');
  Route::get('/categories/edit/{id}','AdminCategoryController@edit')->name('admin.categories.edit');
  Route::post('/categories/update/{id}','AdminCategoryController@update')->name('admin.categories.update');
  Route::get('/category/delete/{id}','AdminCategoryController@destroy')->name('admin.categories.delete');


  //managing tags
  Route::get('/tags','AdminTagController@index')->name('admin.tags');
  Route::get('/tags/add','AdminTagController@create')->name('admin.tags.create');
  Route::post('/tags/store','AdminTagController@store')->name('admin.tags.store');
  Route::get('/tags/edit','AdminTagController@create')->name('admin.tags.edit');
  Route::post('/tags/update/{id}','AdminTagController@update')->name('admin.tags.update');
  Route::get('/tags/delete/{id}','AdminTagController@destroy')->name('admin.tags.destroy');

});
});


//user
Route::group(['middleware' => ['web','auth']], function () {
  //adding post
  Route::get('/posts/add','UserPostController@create')->name('post.create');
  Route::post('/posts/store','UserPostController@store')->name('post.store');

  //user post manage
  Route::get('posts/myposts','UserPostController@index')->name('user.post');
  Route::get('posts/myposts/edit/{id}','UserPostController@edit')->name('user.post.edit');
  Route::post('posts/myposts/update/{id}','UserPostController@update')->name('user.post.update');
  Route::get('posts/myposts/delete/{id}','UserPostController@destroy')->name('user.post.delete');

  //adding comment
  Route::post('/comment/store/{posts_id}','CommentController@store')->name('comment.store');


  //user comment manage
  Route::get('/comment/mycoments','UserCommentController@index')->name('user.comment');
  Route::get('/comment/mycoments/edit/{id}','UserCommentController@edit')->name('user.comment.edit');
  Route::post('/comment/mycoments/update/{id}','UserCommentController@update')->name('user.comment.update');
  Route::get('/comment/mycoments/delete/{id}','UserCommentController@destroy')->name('user.comment.delete');

  //authenticated user adding category
  Route::get('/category/add', 'CategoryController@create')->name('category.create');
  Route::post('/category/store','CategoryController@store')->name('category.store');

  //authenticated user adding tag
  Route::get('/tag/add','TagController@create')->name('tags.create');
  Route::post('/tag/store','TagController@store')->name('tags.store');
});


//posts show
Route::get('/posts/details/{id}','PostController@show')->name('post.details');
Route::get('posts/all','PostController@index')->name('post.show_all');
Route::get('/posts/search','PostController@search')->name('post.search');

//user profile
Route::get('/home', 'HomeController@index')->name('profile');


//categories
//showing All Tags with related posts
Route::get('/category/all','CategoryPostController@index')->name('category.category_post');
Route::get('/category/details/{id}','CategoryPostController@show')->name('category.show');

//tags
Route::get('/tag/details/{id}','PostTagController@show')->name('tags.show');
//showing All Tags with related posts
Route::get('/tag/post_tag','PostTagController@index')->name('tags.post_tag');
