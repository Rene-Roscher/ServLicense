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
use Yajra\DataTables\DataTables;
use App\Models\User;

Route::get('/', function () {
    return 'in progress 12%';
});

Auth::routes(['verify' => true]);
