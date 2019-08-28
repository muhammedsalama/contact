<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware'=>'api'],function (){
    //ur routes
    Route::get('contacts','ContactController@index');
    Route::get('contacts/{id}','ContactController@show');
    Route::post('contact/create','ContactController@store');
    Route::patch('contact/update/{id}','ContactController@update');
    Route::delete('contact/delete/{id}','ContactController@delete');


});


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
