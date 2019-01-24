<?php

use App\DataTables\UsersDataTable;
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
//Route::get('notification', 'UsersController@notification');

Route::get('welcome', 'UsersController@index')->name('welcome');
Route::get('welcome/getdata', 'UsersController@getdata')->name('welcome.getdata');

Route::post('welcome/postdata', 'UsersController@postdata')->name('welcome.postdata');

Route::get('welcome/fetchdata', 'UsersController@fetchdata')->name('welcome.fetchdata');
Route::get('welcome/removedata', 'UsersController@removedata')->name('welcome.removedata');
Route::get('welcome/viewclubs', 'UsersController@viewclubs')->name('welcome.viewclubs');
Route::get('welcome/enroll', 'UsersController@enroll')->name('welcome.enroll');
Route::get('welcome/enrollData', 'UsersController@enrollData')->name('welcome.enrollData');


//Route::get('/', function (UsersDataTable $dataTable  ) {
    //return $dataTable->render('index');
//});

Auth::routes();

Route::get('/home', function(){
  return view('home');
});

Route::resource('users', 'UsersController');
Route::resource('clubs', 'ClubsController');

Route::get('/', function () {
    return view('welcome');
});
