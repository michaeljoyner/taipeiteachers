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

Route::get('/', function () {
    return 'Hello there...';
});

$this->get('admin/login', 'Auth\LoginController@showLoginForm')->name('login');
$this->post('admin/login', 'Auth\LoginController@login');
$this->post('admin/logout', 'Auth\LoginController@logout')->name('logout');


Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function() {

    Route::group(['middleware' => 'auth'], function() {

        Route::get('/', function() {
            return redirect('/admin/schools');
        });

        Route::get('schools/search', function() {
            return view('admin.schools.search');
        });

        Route::get('schools', 'SchoolsController@index');
        Route::get('schools/{school}', 'SchoolsController@show');
        Route::post('schools', 'SchoolsController@store');
        Route::post('schools/{school}', 'SchoolsController@update');
        Route::delete('schools/{school}', 'SchoolsController@delete');

        Route::get('school-form', function() {
            return view('admin.schools.show');
        });

        
    });

});
