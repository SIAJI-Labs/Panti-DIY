<?php

/*
|--------------------------------------------------------------------------
| Datatable Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/**
 * JSON
 */
Route::group([
    'prefix' => 'json',
    'as' => 'json.',
    'namespace' => 'Json'
], function(){
    /**
     * Orphanage
     * 
     */
    Route::group([
        'namespace' => 'Orphanage'
    ], function(){
        // Orphanage
        Route::get('orphanage', 'OrphanageController@jsonAll')->name('orphanage.all');
        Route::get('orphanage/{id}', 'OrphanageController@jsonId')->name('orphanage.id');
    });

    /**
     * Feature Manager
     * 
     */
    // Statistic
    Route::get('statistic', 'StatisticController@jsonAll')->name('statistic.all');
    Route::get('statistic/{id}', 'StatisticController@jsonId')->name('statistic.id');

    /**
     * Social
     * 
     */
    // Social Platform
    Route::get('social-platform', 'SocialPlatformController@jsonAll')->name('social-platform.all');
    Route::get('social-platform/{id}', 'SocialPlatformController@jsonId')->name('social-platform.id');
    // Social Account
    Route::get('social-account', 'SocialAccountController@jsonAll')->name('social-account.all');
    Route::get('social-account/{id}', 'SocialAccountController@jsonId')->name('social-account.id');

    /**
     * Setting
     * 
     */
    // Contact Data
    Route::get('contact-data', 'ContactDataController@jsonAll')->name('contact-data.all');
    Route::get('contact-data/{id}', 'ContactDataController@jsonId')->name('contact-data.id');

    /**
     * Location
     * 
     */
    Route::group([
        'namespace' => 'Location'
    ], function(){
        // Province
        Route::get('province', 'ProvinceController@jsonAll')->name('province.all');
        // Regency
        Route::get('regency', 'RegencyController@jsonAll')->name('regency.all');
        // District
        Route::get('district', 'DistrictController@jsonAll')->name('district.all');
        // Village
        Route::get('village', 'VillageController@jsonAll')->name('village.all');
    });

    /**
     * JSON Datatable
     */
    Route::group([
        'prefix' => 'datatable',
        'as' => 'datatable.',
        'namespace' => 'Datatable'
    ], function(){
        /**
         * Orphanage
         * 
         */
        Route::group([
            'namespace' => 'Orphanage'
        ], function(){
            // Orphanage
            Route::get('orphanage', 'OrphanageController@datatableAll')->name('orphanage.all');
        });

        /**
         * Feature Manager
         * 
         */
        // Social Platform
        Route::get('statistic', 'StatisticController@datatableAll')->name('statistic.all');

        /**
         * Social
         * 
         */
        // Social Platform
        Route::get('social-platform', 'SocialPlatformController@datatableAll')->name('social-platform.all');
        // Social Account
        Route::get('social-account', 'SocialAccountController@datatableAll')->name('social-account.all');

        /**
         * Settings
         * 
         */
        // Contact Data
        Route::get('contact-data', 'ContactDataController@datatableAll')->name('contact-data.all');
    });

    /**
     * JSON Select2
     * 
     */
    Route::group([
        'prefix' => 'select2',
        'as' => 'select2.',
    ], function(){
        /**
         * Location
         * 
         */
        Route::group([
            'namespace' => 'Location'
        ], function(){
            // Province
            Route::get('province', 'ProvinceController@selectAll')->name('province.all');
            // Regency
            Route::get('regency', 'RegencyController@selectAll')->name('regency.all');
            // District
            Route::get('district', 'DistrictController@selectAll')->name('district.all');
            // Village
            Route::get('village', 'VillageController@selectAll')->name('village.all');
        });
    });
});