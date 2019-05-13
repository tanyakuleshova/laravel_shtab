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


Route::get('/', 'MainController@index');
Route::get('/news', 'MainController@news');
Route::get('/news/{news_by_id}', 'MainController@show_news');
Route::get('/investigations', 'MainController@investigations');
Route::get('/investigations/{investigation_by_id}', 'MainController@show_investigations');
Route::get('/join-us', 'MainController@join_us');
Route::get('/support-us', 'MainController@support_us');

Route::post('/join', 'ProcessFormsController@store_join_form');
Route::post('/join-us', 'ProcessFormsController@store_donation_form');

Route::post('/news', 'ProcessFormsController@store_curroption_info_form');
Route::post('/about', 'ProcessFormsController@store_subscribe_form');
Route::post('/investigations', 'ProcessFormsController@store_footer_subscribe_form');


Route::get('/about', 'MainController@about');
Route::get('/contacts', 'MainController@contacts');

Route::any('callback','LiqpayController@callback')->name('callback');

Route::any('/search','SearchController@search')->name('search');



Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
