<?php

/**
 * Frontend Controllers
 * All route names are prefixed with 'frontend.'.
 */
Route::get('/', 'FrontendController@index')->name('index');
Route::get('macros', 'FrontendController@macros')->name('macros');
Route::get('contact', 'ContactController@index')->name('contact');
Route::post('contact/send', 'ContactController@send')->name('contact.send');

/*
 * These frontend controllers require the user to be logged in
 * All route names are prefixed with 'frontend.'
 */
Route::group(['middleware' => 'auth'], function () {
    Route::group(['namespace' => 'User', 'as' => 'user.'], function () {
        /*
         * User Dashboard Specific
         */
        Route::get('dashboard', 'DashboardController@index')->name('dashboard');

        /*
         * User Account Specific
         */
        Route::get('account', 'AccountController@index')->name('account');

        /*
         * User Profile Specific
         */
        Route::patch('profile/update', 'ProfileController@update')->name('profile.update');



        /*---Booh Dashboard---*/

        
        Route::get('bookDashboard', 'BooksController@index')->name('dashboard');
        Route::get('/cart', 'BooksController@cart')->name('cart');
        Route::get('/addtoCart/{id}', 'BooksController@addtoCart')->name('addtoCart');
        Route::get('/showCart', 'BooksController@showCart')->name('showCart');
        Route::get('/orderPlace/{rate}', 'BooksController@orderPlace')->name('orderPlace');


    });
});
