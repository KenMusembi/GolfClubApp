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
Route::group(['prefix' => 'laravel-crud-search-sort-ajax-modal-form'], function () {
   
	Route::get('/', 'Crud5Controller@index');
	 Toastr()->info('Welcome To the site', 'Welcome', 
	["closeButton" => "true"]);
    Route::match(['get', 'post'], 'create', 'Crud5Controller@create');
      Route::match(['get', 'post'], 'view', 'Crud5Controller@enroll');
    Route::match(['get', 'put'], 'update/{id}', 'Crud5Controller@update');
    Route::delete('delete/{id}', 'Crud5Controller@delete');
	
	Auth::routes();
});

Route::get ( '/test', 'TestController@test_query');

Route::get ( '/testView', function(){
  return view('test');
});
Route::get ( '/', function(){
  return view('welcome');
});

Route::get('/', function () {
    Toastr()->info('Messages in here', 'Title', ["closeButton" => "true"]);

    return view('welcome');
});