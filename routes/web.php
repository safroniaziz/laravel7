<?php

use Illuminate\Support\Facades\Route;

Route::get('/',function(){
    return view('home');
})->name('home');

Route::view('/contact','contact');
Route::view('/about','about')->name('about');
Route::view('/login','login');

Route::get('/posts','PostController@index')->name('posts');
Route::get('/posts/create','PostController@create')->name('post.create');
Route::post('/posts/store','PostController@store')->name('post.store');
Route::get('/posts/{post:slug}/edit','PostController@edit')->name('post.edit');
Route::patch('/posts/{post:slug}/edit','PostController@update')->name('post.update');
Route::delete('/posts/{post:slug}/delete','PostController@destroy')->name('post.destroy');
Route::get('/posts/{post:slug}','PostController@show')->name('post.detail');

Route::get('/categories/{category:slug}','CategoryController@show')->name('category.show');
Route::get('/tags/{tag:slug}','TagController@show')->name('tag.show');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
