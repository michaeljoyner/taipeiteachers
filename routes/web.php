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

Route::post('test-yes', function() {
    sleep(2);
    if(str_contains(request('email'), 'mooz')) {
        return 'ok';
    }
    return abort(400);
});

Route::post('test-no', function() {
    return abort(505);
});

Route::view('/', 'front.home.page');
Route::view('/new-teachers', 'front.new-teachers.page');
Route::view('/experienced-teachers', 'front.old-teachers.page');
Route::view('/schools', 'front.schools.page');
Route::view('/faqs', 'front.faqs.page');



$this->get('admin/login', 'Auth\LoginController@showLoginForm')->name('login');
$this->post('admin/login', 'Auth\LoginController@login');
$this->post('admin/logout', 'Auth\LoginController@logout')->name('logout');


Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function() {

    Route::group(['middleware' => 'auth'], function() {

        Route::redirect('/', '/admin/schools');

        Route::view('schools/search', 'admin.schools.search');

        Route::get('schools', 'SchoolsController@index');
        Route::get('schools/{school}', 'SchoolsController@show');
        Route::post('schools', 'SchoolsController@store');
        Route::post('schools/{school}', 'SchoolsController@update');
        Route::delete('schools/{school}', 'SchoolsController@delete');

        Route::post('schools/{school}/image', 'SchoolImageController@store');
        Route::delete('schools/{school}/image', 'SchoolImageController@delete');

    });

});
