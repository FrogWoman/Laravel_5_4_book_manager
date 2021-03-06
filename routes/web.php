<?php
use Illuminate\Http\Request;

//認証
Auth::routes();
//Route::get('/home', 'BooksController@index')->name('home');
Route::get('/home', 'BooksController@index');

//公開ページ:index
Route::get('/','PublicbooksController@index');

//公開ページ:description
Route::post('/public_description/{books}','PublicbooksController@description');

//本のダッシュボード表示
//Route::get('/','BooksController@index');

//新「本」を追加
Route::post('/books','BooksController@store');

//更新画面
Route::post('/booksedit/{books}','BooksController@edit');

//更新処理
Route::post('/books/update','BooksController@update');

//本を削除
Route::delete('/book/{book}','BooksController@destroy');