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

Route::get('/', function () {
    return view('welcome');
});
//Positions
Route::get('positions','positionsController@index');
Route::get('positions/create','positionsController@create');
Route::post('positions/store','positionsController@store');
Route::get('positions/edit/{id}','positionsController@edit');
Route::post('positions/update/{id}','positionsController@update');
Route::get('positions/destroy/{id}','positionsController@destroy');
Route::get('positions/delete/{id}','positionsController@delete');
Route::get('positions/bin','positionsController@bin');
Route::get('positions/rollback/{id}','positionsController@rollback');
//Divisions
Route::get('divisions','divisionsController@index');
Route::get('divisions/create','divisionsController@create');
Route::post('divisions/store','divisionsController@store');
Route::get('divisions/edit/{id}','divisionsController@edit');
Route::post('divisions/update/{id}','divisionsController@update');
Route::get('divisions/destroy/{id}','divisionsController@destroy');
Route::get('divisions/delete/{id}','divisionsController@delete');
Route::get('divisions/bin','divisionsController@bin');
Route::get('divisions/rollback/{id}','divisionsController@rollback');
//Companies
Route::get('companies','companiesController@index');
Route::get('companies/create','companiesController@create');
Route::post('companies/store','companiesController@store');
Route::get('companies/edit/{id}','companiesController@edit');
Route::post('companies/update/{id}','companiesController@update');
Route::get('companies/destroy/{id}','companiesController@destroy');
Route::get('companies/delete/{id}','companiesController@delete');
Route::get('companies/bin','companiesController@bin');
Route::get('companies/rollback/{id}','companiesController@rollback');
//Employees
Route::get('employees','employeesController@index');
Route::get('employees/create','employeesController@create');
Route::post('employees/store','employeesController@store');
Route::get('employees/edit/{id}','employeesController@edit');
Route::post('employees/update/{id}','employeesController@update');
Route::get('employees/destroy/{id}','employeesController@destroy');
Route::get('employees/delete/{id}','employeesController@delete');
Route::get('employees/bin','employeesController@bin');
Route::get('employees/rollback/{id}','employeesController@rollback');