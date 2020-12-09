<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'App\Http\Controllers\ItemsController@index')->name('index');
Route::get('/logout', 'App\Http\Controllers\ItemsController@getLogout');
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
Route::get('/ruby', 'App\Http\Controllers\ItemsController@ruby')->name('ruby');
Route::post('/ruby', 'App\Http\Controllers\ItemsController@rubyCreate');
Route::get('/ruby/{id}', 'App\Http\Controllers\ItemsController@show')->name('rubyShow');
Route::get('/ruby/{id}/edit', 'App\Http\Controllers\ItemsController@edit')->name('rubyEdit');
Route::post('/ruby/{id}', 'App\Http\Controllers\ItemsController@update')->name('rubyUpdate');
Route::delete('/ruby/{id}/destroy', 'App\Http\Controllers\ItemsController@destroy')->name('rubyDestroy');

Route::get('/html', 'App\Http\Controllers\HtmlsController@html')->name('html');
Route::post('/html', 'App\Http\Controllers\HtmlsController@htmlCreate');
Route::get('/html/{id}', 'App\Http\Controllers\HtmlsController@show')->name('htmlShow');
Route::get('/html/{id}/edit', 'App\Http\Controllers\HtmlsController@edit')->name('htmlEdit');
Route::post('/html/{id}', 'App\Http\Controllers\HtmlsController@update')->name('htmlUpdate');
Route::delete('/html/{id}/destroy', 'App\Http\Controllers\HtmlsController@destroy')->name('htmlDestroy');
