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
Route::get('/faqs', 'FaqsController@index');
Route::view('/ask-a-teacher', 'front.ask-us.page');
Route::get('/faqs/{slug}', 'FaqsController@show');
Route::view('/info', 'front.info.page');
Route::view('/blog', 'front.blog.index');
Route::view('/blog-post', 'front.blog.show');

Route::view('/pdf', 'front.pdf');


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

        Route::get('faqs', 'FaqsController@index');
        Route::get('faqs/{faq}', 'FaqsController@show');
        Route::post('faqs', 'FaqsController@store');
        Route::post('faqs/{faq}', 'FaqsController@update');
        Route::delete('faqs/{faq}', 'FaqsController@delete');

        Route::post('published-faqs', 'PublishedFaqsController@store');
        Route::delete('published-faqs/{faq}', 'PublishedFaqsController@delete');

        Route::get('faqs/{faq}/full-answer/edit', 'FaqFullAnswerController@edit');
        Route::post('faqs/{faq}/full-answer', 'FaqFullAnswerController@update');

        Route::get('info-links', 'InfoLinksController@index');
        Route::get('info-links/{info_link}', 'InfoLinksController@show');
        Route::post('info-links', 'InfoLinksController@store');
        Route::post('info-links/{info_link}', 'InfoLinksController@update');
        Route::delete('info-links/{info_link}', 'InfoLinksController@delete');

    });

});
