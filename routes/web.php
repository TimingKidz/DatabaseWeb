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
    Route::post('/getVoucher/{id}','DataController@getVoucher');
    Route::post('/getAddToCart/{id}/{qty}','DataController@getAddToCart');  
    Route::post('/deleteFromCart/{id}','DataController@deleteFromCart');  
    Route::put('/proceed','DataController@cartCheckout');
    Route::get('/getAllProducts','DataController@getAllProduct');
    Route::get('/products','DataController@indexem');
    Route::get('/customer','DataController@customer');
    Route::get('/customer/{id}','DataController@customerdetail');
    Route::group(['middleware' => 'checkauth'],function(){
        Route::get('/ERM','DataController@erm');
        Route::get('/ermReq','DataController@ermReq');
    
    });
    Route::group(['middleware' => 'checkauthsale'],function(){
       
    
    });
    Route::delete('/products/{code}','DataController@deletepro');
    Route::delete('/customers/{code}','DataController@deletecus');
   
    Route::post('/logout','DataController@logout');
    Route::post('/customers','DataController@addcus');
    Route::put('/updateorder','DataController@updateorder');
    Route::get('/getcus','DataController@getcustomer');
    Route::get('/saleorder','DataController@orders');
    Route::get('/saleorderreq','DataController@saleorder');
    Route::get('/saleorder/{id}','DataController@saleorderdetail');

    Route::get('/stockin','DataController@stockin');

});
Route::group(['middleware' => 'guest'],function(){
    Route::get('/','DataController@index');
});

Route::post('/login','DataController@login');
Route::get('/getpass','DataController@passGen');

Route::put('/employees','DataController@updateerm');
// Route::get('/','DataController@index');





