<?php

/*
 * CMS Pages Management
 */
Route::group(['namespace' => 'Websites'], function () {
    Route::resource('websites', 'WebsitesController', ['except' => ['show']]);

    //For DataTables
    Route::post('websites/get', 'WebsitesTableController')->name('websites.get');
});
