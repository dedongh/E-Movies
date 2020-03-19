<?php

Route::group(['prefix' => 'admin'], function () {
    Route::get('login', 'LoginController@show_login_form')->name('admin.login');
    Route::post('login', 'LoginController@login')->name('admin.login.post');
    Route::get('logout', 'LoginController@logout')->name('admin.logout');




    Route::group(['middleware'=>['auth:admin']], function () {
        Route::get('/', 'AdminDashboardController@index')->name('admin.dashboard.index');
    });


});
