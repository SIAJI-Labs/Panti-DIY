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

Auth::routes();

Route::group([
    'prefix' => 'cms',
    'as' => 'cms.',
    'namespace' => 'Cms',
    'middleware' => ['web', 'auth']
], function(){
    Route::get('/', function () {
        return view('content.cms.dashboard.index');
    })->name('index');

    // Setting
    // Website Setting
    Route::resource('website-setting', 'WebsiteSettingController')->only([
        'index', 'update'
    ]);

    // User Profile
    Route::resource('profile', 'ProfileController')->only([
        'index', 'update'
    ]);
    Route::post('profile/password', 'ProfileController@updatePassword')->name('profile.password');

    // JSON
    Route::group([
        'prefix' => 'json',
        'as' => 'json.'
    ], function(){
        // JSON Select2
        Route::group([
            'prefix' => 'select2',
            'as' => 'select2.'
        ], function(){

        });
        // JSON Datatable
        Route::group([
            'prefix' => 'datatable',
            'as' => 'datatable.'
        ], function(){

        });
    });
});