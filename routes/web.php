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


Route::group(['middleware' => 'checkuser'], function () {
    //...Cart Route
    Route::get('/getCart', 'CartController@getCart');
    Route::get('/getCartTotal', 'CartController@getCartTotal');
    Route::post('/getAddr/{id}', 'CartController@getAddr');
    Route::post('/getVoucher/{id}', 'CartController@getVoucher');
    Route::post('/getAddToCart/{id}/{qty}', 'CartController@getAddToCart');
    Route::post('/deleteFromCart/{id}', 'CartController@deleteFromCart');
    Route::put('/proceed', 'CartController@cartCheckout');

    Route::get('/getAllProducts', 'DataController@getAllProduct');
    Route::get('/products', 'DataController@indexem');
    Route::get('/customer', 'DataController@customer');
    Route::get('/customer/{id}', 'DataController@customerdetail');
    Route::group(['middleware' => 'checkauth'], function () {
        Route::get('/ERM', 'DataController@erm');
        Route::get('/ermReq', 'DataController@ermReq');
    });
    Route::group(['middleware' => 'checkauthsale'], function () { });
    Route::delete('/products/{code}', 'DataController@deletepro');
    Route::delete('/customers/{code}', 'DataController@deletecus');
    Route::delete('/stockin/{code}','DataController@deletestockHeader');

    Route::post('/logout', 'DataController@logout');
    Route::post('/customers', 'DataController@addcus');
    Route::put('/updateorder', 'DataController@updateorder');
    Route::get('/getcus', 'DataController@getcustomer');
    Route::get('/saleorder', 'DataController@orders');
    Route::get('/saleorderreq', 'DataController@saleorder');
    Route::get('/saleorder/{id}', 'DataController@saleorderdetail');

    Route::get('/stockin', 'DataController@stockin');
    Route::post('/addstock','DataController@addstockin');
    Route::get('/getstock','DataController@getstockin');
    Route::get('/stockin/{stockNumber}','DataController@stockindetails');
    Route::get('/stockinreq','DataController@stockHD');
    Route::post('/customerAddr', 'DataController@addMulAddr');
    Route::put('/customerAddrupdate', 'DataController@updateMulAddr');
    Route::post('/customerAddrdelete/{map}', 'DataController@deleteMulAddr');
    // Route::get('/getcus','DataController@cus');
    Route::post('/customer/{id}', 'DataController@customerdetail_id');
    Route::put('/comment/{id}', 'DataController@editComment');
    Route::put('/commentstock/{id}','DataController@editCommentstock');
});
Route::group(['middleware' => 'guest'], function () {
    Route::get('/', 'DataController@index');
});

Route::post('/login', 'DataController@login');
Route::post('/logout', 'DataController@logout');

Route::get('/getpass', 'DataController@passGen');
Route::get('/test', 'DataController@test');
Route::get('/dashboard', 'DataController@dashboard');
Route::put('/employees', 'DataController@updateerm');
// Route::get('/','DataController@index');
