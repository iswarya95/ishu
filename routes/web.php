<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
Auth::routes();

Route::group(['middleware' => ['guest']], function () {
    
    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/home', function () {
        return view('frontend.home');
    });
    
    
    // ADMIN
    Route::get('admin/login', 'backend\Auth\LoginController@getLoginForm');
    Route::post('admin/authenticate', 'backend\Auth\LoginController@authenticate');
    
    Route::get('admin/register', 'backend\Auth\RegisterController@getRegisterForm');
    Route::post('admin/saveregister', 'backend\Auth\RegisterController@saveRegisterForm');
    
    // USER 
    Route::get('user/login', 'frontend\Auth\LoginController@getLoginForm');
    Route::post('user/authenticate', 'frontend\Auth\LoginController@authenticate');
    
    Route::get('user/register', 'frontend\Auth\RegisterController@getRegisterForm');
    Route::post('user/saveregister', 'frontend\Auth\RegisterController@saveRegisterForm');


});


Route::group(['middleware' => ['user']], function () {
    
    Route::post('user/logout', 'frontend\Auth\LoginController@getLogout');
    Route::get('user/dashboard', 'frontend\UserController@dashboard');
    Route::get('user/order/create/{id}', 'User\OrderController@create');
 Route::post('user/order/store/{id}', 'User\OrderController@store');
 Route::get('user/order/show/{id}', 'User\OrderController@show');
 Route::get('user/order/edit/{id}', 'User\OrderController@edit');
 Route::post('user/order/update/{id}', 'User\OrderController@update');
 Route::get('user/order/delete/{id}', 'User\OrderController@delete');
    Route::resource('user/order', 'User\OrderController');
      Route::resource('user/product', 'User\ProductController');

    Route::get('user/password', 'User\OrderController@password');
    Route::post('user/password', 'User\OrderController@updatePassword');

   Route::get('user/product', 'User\ProductController@index'); 
    Route::get('user/product/create', 'User\ProductController@create'); 
    
    Route::get('user/dashboard1/', function () {
        
        return view('frontend.dashboard');
    });
    
});



Route::group(['middleware' => ['admin']], function () {
    
    
    Route::get('admin/dashboard', 'backend\AdminController@dashboard');
    Route::post('admin/logout', 'backend\Auth\LoginController@getLogout');

   // Route::group(['middleware' => 'auth'], function (){
       //  Route::get('/', 'OrderController@index');

   Route::get('admin/order/create', 'OrderController@create');
 Route::post('admin/order/store', 'OrderController@store');
 Route::get('admin/order/edit/{id}', 'OrderController@edit');
 Route::post('admin/order/update/{id}', 'OrderController@update');
 Route::get('admin/order/delete/{id}', 'OrderController@delete');
    Route::resource('admin/order', 'OrderController');
      Route::resource('admin/product', 'ProductController');
   /*  Route::get('admin/logout', function (){
        Auth::logout();
        return redirect('/login');
    });*/

    Route::get('admin/password', 'OrderController@password');
    Route::post('admin/password', 'OrderController@updatePassword');

   Route::resource('product', 'ProductController'); 
//});

});
/*Route::group(['middleware' => 'auth'], function () {

    Route::get('/', 'OrderController@index');

    Route::resource('order', 'OrderController');

    Route::resource('product', 'ProductController');

    Route::get('logout', function (){
        Auth::logout();
        return redirect('/');
    });

    Route::get('password', 'OrderController@password');
    Route::post('password', 'OrderController@updatePassword');

});
Route::group(['middleware' => 'auth.basic'], function () {
    Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => 'auth.admin'], function() {
        
    });
});*/