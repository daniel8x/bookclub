<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/','PagesController@index');
Route::get('/books',[
  'as' => 'book.index',
  'uses' => 'BookController@index']);

Route::get('/books/create',[
  'as' => 'book.create',
  'uses' => 'BookController@create'
])->middleware('auth');

Route::post('/books/create', [
  'as' => 'book.store',
  'uses' => 'BookController@store'
])->middleware('auth');

Route::get('/books/{id}/edit',[
  'as' => 'book.edit',
  'uses' => 'BookController@edit'
])->middleware('auth');
Route::post('/books/{id}',[
  'as'=> 'book.update',
  'uses' => 'BookController@update'
])->middleware('auth');

Route::get('/books/{id}/delete',[
  'as'=>'book.destroy',
  'uses'=>'BookController@destroy'
])->middleware('auth');


Route::get('/books/{id}', [
  'as' => 'book.show',
  'uses' =>  'BookController@show'

])->middleware('auth');




Route::get('/suggestions',[
'as' => 'suggestion.show',
'uses' => 'SuggestionController@show'
  ])->middleware('auth');


  Route::post('/user/suggestions/create',[
  'as' => 'suggestion.user.create',
  'uses' => 'SuggestionController@store'
    ])->middleware('auth');


Route::get('/user/suggestions/',[
  'as'=> 'suggestion.user.show',
  'uses'=> 'SuggestionController@usershow'
])->middleware('auth');

Route::get('/user/suggestions/delete/{id}',[
  'as'=> 'suggestion.user.delete',
  'uses'=> 'SuggestionController@delete'
])->middleware('auth');




Route::get('/users',[
    'as' => 'user.show',
    'uses' => 'UserController@show'
])->middleware('auth');



Auth::routes();
Route::get('/logout','PagesController@index');
Route::get('/home', 'PagesController@index');
