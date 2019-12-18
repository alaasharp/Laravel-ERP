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

/////////Pages
Route::get('/','IndexController@index');
Route::get('/logout','UsersController@logout');


/* Admin Location */
Auth::routes(['register'=>false]);
Route::group(['prefix'=>'admin','middleware'=>['auth','admin']],function (){
    Route::get('/', 'AdminController@index')->name('admin_home');


    /// Companies
    Route::resource('/companies','CompaniesController');
    Route::get('delete-companie/{id}','CompaniesController@destroy');
    Route::get('/check_companie_name','CompaniesController@checkCateName');


    /// Employees
    Route::resource('/employees','EmployeesController');
    Route::get('delete-employee/{id}','EmployeesController@destroy');
    Route::get('/check_employee_name','EmployeesController@checkCateName');
    
});