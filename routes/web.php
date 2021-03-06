<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
Route::get('/', function () {
    return view('home');
});
Route::group(['middleware' => 'auth'], function () {
Route::get('/home', function () {
    return view('home');
});

Route::get('category', 'categoryController@index');

Route::get('product/{id}', [
    'as' => 'product.index',
    'uses' => 'productController@index'
]);
Route::get('productView/{id}', 'productViewController@index');
Route::get('shoppingCart', [
    'as' => 'shoppingCart',
    'uses' => 'shoppingCartController@index'
]);
Route::get('add-to-cart/{id}', [
    'as' => 'product.addToCart',
    'uses' => 'productController@getAddToCart'
]);
Route::get('removeItem/{id}', [
    'as' => 'removeItem',
    'uses' => 'shoppingCartController@removeItem'
]);
Route::get('/orderStore', [
    'as' => 'orderStore',
    'uses' => 'orderController@store'
]);
Route::get('/orders', [
    'as' => 'orders',
    'uses' => 'orderController@index'
]);
Route::get('/add/{id}', [
    'as' => 'add',
    'uses' => 'productController@getAddToCart'
]);
Route::get('/orderDetails/{id}', [
    'as' => 'orderDetails',
    'uses' => 'orderController@orderDetails'
]);
Route::post('/shoppingCart/update/{id}', [
    'uses' => 'ShoppingCartController@update',
    'as' => 'shoppingCart.update'
]);
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
});