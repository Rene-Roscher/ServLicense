<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'DashboardController@showDashboard')->name('admin.dashboard');

Route::prefix('licensors')->namespace('Licensor')->group(function () {
    Route::get('/', 'LicensorController@showLicensors')->name('admin.licensor.index');
    Route::get('/ajax/licensor/load', 'LicensorController@ajaxLicensorLoad')->name('admin.ajax.licensor.load');
    Route::prefix('{licensor}')->namespace('Single')->group(function () {
        Route::get('/', 'LicensorSingleController@showLicensor')->name('admin.licensor.single.index');
        Route::post('/update', 'LicensorSingleController@updateLicensor')->name('admin.ajax.licensor.update');
    });
});


