<?php


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/questions', 'QuestionsController')->except('show');
Route::resource('/questions.answers', 'AnswersController')->only('store', 'edit', 'update', 'destroy');
Route::get('/questions/{slug}', 'QuestionsController@show')->name('questions.show');

Route::post('/answers/{answer}/accept', 'AcceptAnswerController')->name('answers.accept');
Route::post('/questions/{question}/favorite', 'FavoritesController@store')->name('questions.favorite');

Route::post('/answers/{answer}/vote', 'voteAnswerController')->name('answers.vote');
Route::post('/questions/{question}/vote', 'VoteQuestionController')->name('questions.vote');