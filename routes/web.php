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
Route::post('user/rating', 'RatingController@rate');
Route::post('/fetch-match', 'PredictionController@fetch_match')->name('fetch-match');
Route::group(['prefix' => 'predictions'], function(){
    Route::match(['get', 'post'], '/create', 'PredictionController@create');
    Route::match(['get', 'post'], '/freemium/matches/view/{id}', 'PredictionController@view_free_matches');
    Route::match(['get', 'post'], '/view/{id}', 'PredictionController@view_predictions');
    Route::post('/rate', 'PredictionController@rating');
});

Route::group(['prefix' => 'predictors'], function () {
    Route::get('/', 'PredictorController@index');
    Route::get('/{id}', 'PredictorController@show');
    Route::post('/subscribe', 'PredictorController@subscribe');

});

Route::get('/subscriptions', 'SubscriptionController@index')->name('my-subscriptions');
Route::get('/subscriptions/{id}', 'SubscriptionController@show')->name('show-subscription');