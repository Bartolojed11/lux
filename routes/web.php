<?php

Auth::routes();

    // Route::group(function() {
        Route::get('/', 'HomeController@index');
        Route::get('/shop', function () {
            return view('pages.index');
        });
        Route::get('/contact', function () {
            return view('pages.contact');
        });
        Route::get('/about', function () {
            return view('pages.about');
        });
        Route::get('/help', function () {
            return view('pages.help');
        });
    // });


Route::group(['namespace'=> 'Admin','middleware' => ['auth', 'AdminRole']], function () {
    //updating, viewing and adding of cloth
    Route::resource('/admin/pages' , 'ClothController');
    Route::get('/admin/pages/category/{item}' , 'ClothController@show');
    Route::get('/admin/pages/{id}/info' , 'ClothController@showClothInfo');
    Route::DELETE('/admin/pages/remove_item/{id}' ,'ClothController@remove_item');
    Route::DELETE('/admin/pages/remove_avlbty/{id}' ,'ClothController@remove_avlbty');
    
    //Customer Controllers
    Route::get('/admin/pages/customers/list' , 'CustomerController@showCustomersList');
    Route::get('/admin/pages/list/customer/{id}/order' , 'CustomerController@showCustomer');
    Route::get('/admin/pages/customer/{id}/cart' , 'CustomerController@showCustomerCart');
    Route::post('/admin/pages/customer/cart/confirm', 'CustomerController@confirmCustomerCart');
    Route::post('/admin/pages/customer/message' , 'CustomerController@messageCustomer');
    Route::get('/admin/pages/orders/on-delivery' , 'CustomerController@showOrdersOnDelivery');
    Route::post('/admin/pages/customer/cart/delivered' , 'CustomerController@delivered');
});