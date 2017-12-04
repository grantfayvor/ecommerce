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
Route::get('/admin/dashboard', function () {
    return view('admin/dashboard');
})->name('admin');
Route::get('/admin/add-product', function () {
    return view('admin/add-product');
});
Route::get('/admin/view-products', function () {
    return view('admin/product');
});
Route::get('/admin/view-products-list', function () {
    return view('admin/product-list');
});
Route::get('/', 'MainController@index');
Route::get('/cart', 'MainController@Cart');
Route::get('/checkout', function () {
    return view('checkout');
});
Route::get('/logout', function () {
    Auth::logout();
    return redirect('/login');
});

Route::get('/home', function () {
    return redirect()->to('/');
});

Route::get('/payment/success', function () {
    return view('payment-success');
});

// Route::middleware('auth:admin')->get('/admin/dashboard', function(){ return view('admin/dashboard');});

Auth::routes();

// Route::get('/home', 'MainController@index')->name('home');

//Product apis
Route::get('/api/products', 'ProductController@findAllProducts');
Route::post('/api/product/save', 'ProductController@saveProduct');
Route::put('/api/product/update/{id}', 'ProductController@updateProduct');
Route::get('/api/product/find/{param}', 'ProductController@search');
Route::post('/api/cart/put{id}', 'ProductController@addToCart');
Route::get('/api/cart/user', 'ProductController@getUserCart');
Route::delete('/api/cart/remove/{id}', 'ProductController@removeFromCart');
Route::get('/api/products/count', 'ProductController@countProducts');
Route::get('/api/product/delete/{id}', 'ProductController@deleteProduct');
Route::get('/api/products/status/{status}', 'ProductController@findProductsByStatus');
Route::get('/api/products/find', 'ProductController@findProductsByCategory');

//User apis
Route::post('/api/user/save', 'UserController@saveUser');
Route::post('/api/user/authenticate', 'UserController@authenticateUser');
Route::get('/api/user/logout{id}', 'UserController@logout');
Route::get('/api/users/count', 'UserController@countUsers');

//Payment gateway
Route::post('/pay', 'PaymentController@redirectToGateway')->name('pay');
Route::get('/payment/callback', 'PaymentController@handleGatewayCallback');
