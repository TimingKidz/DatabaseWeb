<?php
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
    Route::get('/getCart','DataController@getCart');
    Route::get('/getCartTotal','DataController@getCartTotal');
    Route::post('/getAddr/{id}','DataController@getAddr');
    Route::post('/getAddToCart/{id}/{qty}','DataController@getAddToCart');  
    Route::post('/deleteFromCart/{id}','DataController@deleteFromCart');  
    Route::put('/proceed','DataController@cartCheckout');
    Route::get('/getAllProducts','DataController@getAllProduct');
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
Route::get('/getcus','DataController@cus');





