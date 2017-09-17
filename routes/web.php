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
Route::match(['get', 'post'], '/predictions/create', 'PredictionController@create');
Route::match(['get', 'post'], 'predictions/freemium/view', 'PredictionController@view');
Route::post('user/rating', 'RatingController@rate');



Route::group(['prefix' => 'predictors'], function () {
    Route::get('/', 'PredictorController@index');
    Route::get('/{id}', 'PredictorController@show');
    Route::post('/subscribe', 'PredictorController@subscribe');

});

Route::get('/subscriptions', 'SubscriptionController@index')->name('my-subscriptions');
Route::get('/subscriptions/{id}', 'SubscriptionController@show')->name('show-subscription');