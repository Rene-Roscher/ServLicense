<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;

//twofactor
Route::any('/twofactor', 'TwoFactorController@manage')->middleware('can:has2factor')->name('licensor.twofactor.auth');

/* Dashboard */
Route::get('/', 'DashboardController@showDashboard')->name('licensor.dashboard');
Route::get('/paymentModal', 'DashboardController@ajaxPaymentModal')->name('ajax.licensor.paymentmodal.load');
/* Ajax */
Route::get('/ajax/sessions/load', 'DashboardController@ajaxSessionsLoad')->name('ajax.licensor.sessions.load');

/* Session */
Route::delete('session/{session}/destroy', 'DashboardController@sessionDestory')->name('customer.session.destory');

/* Setting */
Route::prefix('settings')->namespace('Setting')->group(function () {
    Route::get('/', 'SettingController@showSettings')->name('licensor.setting.index');
    /* Ajax */
    Route::post('/ajax/activate/2factor', 'SettingController@ajaxActivate2Factor')->name('ajax.licensor.activate2factor.check');
    Route::any('/ajax/deactivate/2factor', 'SettingController@ajaxDeactivate2Factor')->name('ajax.licensor.deactivate2factor.check');
});

/* Accounting */
Route::prefix('accounting')->namespace('Accounting')->group(function () {
    Route::get('/', 'AccountingController@index')->name('licensor.accounting.index');
    /* Ajax */
    Route::get('/ajax/transactions/load', 'AccountingController@ajaxTransactionsLoad')->name('ajax.licensor.transactions.load');
    /* Payment */
    Route::post('/payment/{payment_method}/create', 'AccountingController@create')->name('licensor.accounting.create');
    Route::post('/payment/{payment_method}/check', 'AccountingController@check')->name('licensor.accounting.check');
});
