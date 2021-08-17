<?php

Route::group(['namespace' => 'Botble\Manage\Http\Controllers', 'middleware' => 'web'], function () {

    Route::group(['prefix' => config('core.base.general.admin_dir'), 'middleware' => 'auth'], function () {

        Route::group(['prefix' => 'histories', 'as' => 'history.'], function () {
            Route::resource('', 'HistoryController')->parameters(['' => 'history']);
            Route::delete('items/destroy', [
                'as'         => 'deletes',
                'uses'       => 'HistoryController@deletes',
                'permission' => 'history.destroy',
            ]);
        });

        Route::group(['prefix' => 'parishes', 'as' => 'parish.'], function () {
            Route::resource('', 'ParishController')->parameters(['' => 'parish']);
            Route::delete('items/destroy', [
                'as'         => 'deletes',
                'uses'       => 'ParishController@deletes',
                'permission' => 'parish.destroy',
            ]);
        });

        Route::group(['prefix' => 'priests', 'as' => 'priest.'], function () {
            Route::resource('', 'PriestController')->parameters(['' => 'priest']);
            Route::delete('items/destroy', [
                'as'         => 'deletes',
                'uses'       => 'PriestController@deletes',
                'permission' => 'priest.destroy',
            ]);
        });

        Route::group(['prefix' => 'deaneries', 'as' => 'deanery.'], function () {
            Route::resource('', 'DeaneryController')->parameters(['' => 'deanery']);
            Route::delete('items/destroy', [
                'as'         => 'deletes',
                'uses'       => 'DeaneryController@deletes',
                'permission' => 'deanery.destroy',
            ]);
        });

        Route::group(['prefix' => 'manages', 'as' => 'manage.'], function () {
            Route::resource('', 'ManageController')->parameters(['' => 'manage']);
            Route::delete('items/destroy', [
                'as'         => 'deletes',
                'uses'       => 'ManageController@deletes',
                'permission' => 'manage.destroy',
            ]);
        });

        Route::group(['prefix' => 'lichpvs', 'as' => 'lichpv.'], function () {
            Route::resource('', 'LichpvController')->parameters(['' => 'lichpv']);
            Route::delete('items/destroy', [
                'as'         => 'deletes',
                'uses'       => 'LichpvController@deletes',
                'permission' => 'lichpv.destroy',
            ]);
        });
    });

    //route for slug
    Route::group(apply_filters(BASE_FILTER_GROUP_PUBLIC_ROUTE, []), function () {

        Route::get('/deanery/{slug}', [
            'uses' => 'PublicController@getBySlug',
        ]);

        Route::get('/parish/{slug}', [
            'uses' => 'PublicController@getBySlug',
        ]);

        Route::get('/priest/{slug}', [
            'uses' => 'PublicController@getBySlug',
        ]);

        Route::get('/history/{slug}', [
            'uses' => 'PublicController@getBySlug',
        ]);

        Route::get('/deanery', [
            'uses' => 'PublicController@getAllDeanery',
        ])->name('deanery');

        Route::get('/lichpv/{slug}', [
            'uses' => 'PublicController@getBySlug',
        ]);

    });

});
