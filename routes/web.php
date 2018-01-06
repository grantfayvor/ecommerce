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

use Illuminate\Http\Request;

// use Auth;

//View urls
/*Route::get('/admin/dashboard', ['middleware' => ['auth', 'admin'], function () {
    return view('admin/dashboard');
}])->name('admin');
Route::get('/admin/add-product', ['middleware' => ['auth', 'admin'], function () {
    return view('admin/add-product');
}]);
Route::get('/admin/view-products', ['middleware' => ['auth', 'admin'], function () {
    return view('admin/product');
}]);
Route::get('/admin/view-products-list', ['middleware' => ['auth', 'admin'], function () {
    return view('admin/product-list');
}]);*/

//admin view
Route::get('/admin/dashboard', 'MainController@adminDashboard')->name('admin');
Route::get('/admin/add-product', 'MainController@addProduct');
Route::get('/admin/view-products', 'MainController@viewProducts');
Route::get('/admin/view-products-list', 'MainController@viewProductsAsList');
Route::get('/admin/view-sales-list', 'MainController@viewSalesAsList');

//user view
Route::get('/', 'MainController@index');
Route::get('/cart', 'MainController@Cart');
Route::get('/checkout', 'MainController@checkout');
Route::get('/logout', 'UserController@logout');
Route::get('/home', 'MainController@home');
Route::get('/payment/success', 'MainController@paymentSuccessView');
Route::get('/payment/failure', 'MainController@paymentFailureView');

// Route::middleware('auth:admin')->get('/admin/dashboard', function(){ return view('admin/dashboard');});

Auth::routes();

//Product apis
Route::get('/api/products', 'ProductController@findAllProducts');
Route::post('/api/product/save', 'ProductController@saveProduct');
Route::post('/api/product/update', 'ProductController@updateProduct');
Route::get('/api/product/find/{param}', 'ProductController@search');
Route::delete('/api/cart/remove/{id}', 'ProductController@removeFromCart');
Route::get('/api/products/count', 'ProductController@countProducts');
Route::get('/api/product/delete/{id}', 'ProductController@deleteProduct');
Route::get('/api/products/status/{status}', 'ProductController@findProductsByStatus');
Route::get('/api/products/find', 'ProductController@findProductsByCategory');

Route::get('/product/image', 'MainController@viewProductImage');

//Cart apis
Route::post('/api/cart/add', 'CartController@addToCart');
Route::get('/api/cart/user', 'CartController@getUserCart');
Route::put('/api/cart/update', 'CartController@updateCart');
Route::get('/api/cart/one/{rowId}', 'CartController@getCartItem');
Route::delete('/api/cart/delete/{rowId}', 'CartController@removeFromCart');
Route::get('/api/cart/destroy', 'CartController@destroyCart');
Route::post('/api/cart/save', 'CartController@storeCartData');
Route::get('/api/cart/restore', 'CartController@restoreCart');
Route::get('/api/cart/count', 'CartController@getCountOfItems');

//Sale apis
Route::get('/api/sales', 'SaleController@getAllSales');

//User apis
Route::post('/api/user/save', 'UserController@saveUser');
Route::post('/api/user/authenticate', 'UserController@authenticateUser');
Route::get('/api/user/logout{id}', 'UserController@logout');
Route::get('/api/users/count', 'UserController@countUsers');

//Payment gateway
Route::post('/pay', 'PaymentController@redirectToGateway')->name('pay');
Route::get('/payment/callback', 'PaymentController@handleGatewayCallback');
