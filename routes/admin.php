<?php

Route::group(['prefix' => 'admin'], function () {
    Route::get('login', 'LoginController@show_login_form')->name('admin.login');
    Route::post('login', 'LoginController@login')->name('admin.login.post');
    Route::get('logout', 'LoginController@logout')->name('admin.logout');


    Route::group(['middleware' => ['auth:admin']], function () {
        Route::get('/', 'AdminDashboardController@index')->name('admin.dashboard.index');

        Route::get('/settings', 'Admin\SettingController@index')->name('admin.settings');
        Route::group(['prefix' => 'settings'], function () {
            Route::get('/site', 'Admin\SettingController@logo')->name('admin.settings.site');
            Route::get('/footer', 'Admin\SettingController@footer')->name('admin.settings.footer');
            Route::get('/social', 'Admin\SettingController@social')->name('admin.settings.social');
            Route::get('/analytics', 'Admin\SettingController@analytics')->name('admin.settings.analytics');
            Route::get('/payments', 'Admin\SettingController@payments')->name('admin.settings.payments');
        });
        Route::post('/settings', 'Admin\SettingController@update')->name('admin.settings.update');

        Route::get('/bookings', 'Admin\SettingController@change')->name('admin.bookings');
        Route::get('/reviews', 'Admin\SettingController@change')->name('admin.reviews');

        Route::group(['prefix' => 'genre'], function () {
            Route::get('/add', 'Admin\GenreController@add')->name('admin.genre');
            Route::get('/view', 'Admin\GenreController@view')->name('admin.genre.view');
            Route::get('/category', 'Admin\GenreController@change')->name('admin.category.add');
            Route::get('/category_view', 'Admin\GenreController@change')->name('admin.category.view');
            Route::get('/{genre_id}/edit', 'Admin\GenreController@edit')->name('admin.genre.edit');
            Route::get('/{genre_id}/delete', 'Admin\GenreController@delete')->name('admin.genre.delete');
            Route::post('/update', 'Admin\GenreController@update')->name('admin.genre.update');
            Route::post('/store', 'Admin\GenreController@store')->name('admin.genre.store');

        });

        Route::group(['prefix'=>'attributes'], function () {
            Route::get('/add', 'Admin\AttributesController@add')->name('admin.attributes.add');
            Route::get('/view', 'Admin\AttributesController@view')->name('admin.attributes.view');
            Route::post('/store', 'Admin\AttributesController@store')->name('admin.attributes.store');
            Route::get('/{id}/edit', 'Admin\AttributesController@edit')->name('admin.attributes.edit');
            Route::post('/update', 'Admin\AttributesController@update')->name('admin.attributes.update');
            Route::get('/{id}/delete', 'Admin\AttributesController@delete')->name('admin.attributes.delete');

            Route::get('/{id}/add_attributes', 'Admin\AttributeValueController@add_attribute_value')->name('admin.attributes.value.add');
            Route::get('/{id}/view_attributes', 'Admin\AttributeValueController@view_attribute_value')->name('admin.attributes.value.view');
            Route::get('/{id}/edit_attribute_value', 'Admin\AttributeValueController@edit_attribute_value')->name('admin.attributes.value.edit');
            Route::get('/{id}/delete_attributes', 'Admin\AttributeValueController@delete_attribute_value')->name('admin.attributes.value.delete');
            Route::post('/store_value', 'Admin\AttributeValueController@store_value')->name('admin.attributes.store_value');
            Route::post('/update_value', 'Admin\AttributeValueController@update_value')->name('admin.attributes.update_value');

        });

        Route::group(['prefix'=>'movies'], function () {
            Route::get('/add', 'Admin\SettingController@change')->name('admin.movies');
            Route::get('/view', 'Admin\SettingController@change')->name('admin.movies.view');
        });

    });


});
