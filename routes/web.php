<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\InvoicesController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\InvoicesDetailsController;

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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();
//Auth::routes(['register' => false]);



Route::get('/home', 'HomeController@index')->name('home');



Route::resource('invoices','InvoicesController');

Route::resource('sections','SectionsController');

Route::resource('products','ProductsController');

Route::get('/section/{id}', 'InvoicesController@getproducts');

Route::get('InvoicesDetails/{id}','InvoicesDetailsController@edit');

Route::get('View_file/{invoice_number}/{file_name}', 'InvoicesDetailsController@open_file');

Route::get('download/{invoice_number}/{file_name}', 'InvoicesDetailsController@get_file');

Route::post('delete_file', 'InvoicesDetailsController@destroy')->name('delete_file');













Route::get('/{page}', 'AdminController@index');