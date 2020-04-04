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

Route::get('/', function () {
    return view('home');
});
Route::get('/', 'HomeController@index')->name('home');

Auth::routes();

Route::resource('questions.answers', 'AnswersController')->except('index', 'show', 'create');

Route::group(
    ['prefix' => '/questions'],
    function () {
        Route::get('/', 'QuestionController@index')->name('allquestion');
        Route::get('/{slug}', 'QuestionController@show')->name('showquestion');
        Route::get('create/showform', 'QuestionController@showform')->name('showform');
        Route::get('/create', 'QuestionController@create')->name('createQuestion');
        Route::post('/store', 'QuestionController@store')->name('storequestion');
        Route::get('/edit/{id}', 'QuestionController@edit')->name('editQuestion');
        Route::put('/{id}', 'QuestionController@update')->name('updateQuestion');
        Route::delete('/{id}', 'QuestionController@destroy')->name('delQuestion');
    }
);
