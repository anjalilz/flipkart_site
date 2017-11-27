<?php
/**
 * All route names are prefixed with 'admin.'.
 */
Route::get('dashboard', 'DashboardController@index')->name('dashboard');
Route::get('/addBooks', 'DashboardController@addBooks')->name('addBooks');
Route::post('/save', 'DashboardController@save')->name('save');
Route::get('/edit/{id}', 'DashboardController@edit')->name('edit');
Route::post('/update', 'DashboardController@update')->name('update');
Route::get('/delete/{id}', 'DashboardController@delete')->name('delete');
