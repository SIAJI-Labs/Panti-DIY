<?php

/*
|--------------------------------------------------------------------------
| CMS Routes
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

    /**
     * Feature Manager
     * 
     */
    // Social Platform
    Route::resource('social-platform', 'SocialPlatformController')->only([
        'index', 'store', 'update', 'destroy'
    ]);
    Route::resource('social-account', 'SocialAccountController')->only([
        'index', 'store', 'update', 'destroy'
    ]);

    /**
     * Setting
     * 
     */
    // Website Setting
    Route::resource('website-setting', 'WebsiteSettingController')->only([
        'index', 'store'
    ]);
    // Contact Data
    Route::resource('contact-data', 'ContactDataController')->only([
        'index', 'store', 'update', 'destroy'
    ]);

    /**
     * User Profile
     * 
     */
    Route::resource('profile', 'ProfileController')->only([
        'index', 'update'
    ]);
    Route::post('profile/password', 'ProfileController@updatePassword')->name('profile.password');
});