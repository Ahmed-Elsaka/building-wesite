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

// Admin route
Route::group(['middleware'=>['web','admin']], function(){
    Route::get('/users/data',['as' => 'users.data', 'uses'=>'UsersController@anyData']);
    Route::get('/adminpanel/bu/data',['as' => 'adminpanel.bu.data', 'uses'=>'BuController@anyData']);
    #admin
    Route::get('/adminpanel','AdminController@index');
    #users
    Route::resource('users','UsersController');
    Route::get('/users/{id}/delete','UsersController@destroy');
    Route::post('/user/changepassword','UsersController@UpdatePassword');
#Stie setting
    Route::get('/adminpanel/sitesetting','SiteSettingController@index');
    Route::post('/adminpanel/sitesetting','SiteSettingController@store');


    #users
    Route::resource('/adminpanel/bu','BuController');
    Route::get('/adminpanel/bu/{id}/delete','BuController@destroy');

});


// User route
Route::get('/ShowAllBuildings','BuController@showAllEnable');
Route::get('/ForRent','BuController@ForRent');
Route::get('/ForBuy','BuController@ForBuy');
Route::get('/type/{type}','BuController@ShowByType');
Route::get('/search','BuController@search');
Route::get('/SingleBuilding/{id}','BuController@SingleBuilding');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');