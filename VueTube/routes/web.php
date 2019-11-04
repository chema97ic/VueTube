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

Route::resource('channels', 'ChannelController');

Route::get('videos/{video}/comments', 'CommentController@index');

Route::get('comments/{comment}/replies', 'CommentController@show');

Route::get('videos/{video}', 'VideoController@show');

Route::put('videos/{video}', 'VideoController@updateViews');

Route::put('videos/{video}/update', 'VideoController@update')->middleware(['auth'])->name('videos.update');

Route::middleware(['auth'])->group(function () {
    Route::post('comments/{video}', 'CommentController@store');

    Route::get('channels/{channel}/videos', 'UploadVideoController@index')->name('channels.upload');

    Route::post('channels/{channel}/videos', 'UploadVideoController@store');

    Route::post('votes/{entityId}/{type}', 'VoteController@vote');

    Route::resource('channels/{channel}/subscriptions', 'SubscriptionController')->only(['store', 'destroy']);
});