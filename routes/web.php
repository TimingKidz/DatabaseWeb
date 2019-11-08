<?php

use App\Http\Controllers\DataController;
use Illuminate\Http\Request;
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


Route::group(['middleware' => 'checkuser'],function(){
    Route::get('/products','DataController@indexem');
    Route::get('/customer','DataController@customer');
    Route::get('/customer/{id}','DataController@customerdetail');

});
Route::group(['middleware' => 'guest'],function(){
    Route::get('/','DataController@index');
});

// Route::get('/','DataController@index');
Route::delete('/products/{code}','DataController@deletepro');
Route::post('/login','DataController@login');
Route::post('/logout','DataController@logout');
Route::post('/customerAddr','DataController@addMulAddr');
Route::put('/customerAddrupdate','DataController@updateMulAddr');
Route::post('/customerAddrdelete/{map}','DataController@deleteMulAddr');
Route::get('/getcus','DataController@cus');
Route::post('/customer/{id}','DataController@customerdetail_id');





