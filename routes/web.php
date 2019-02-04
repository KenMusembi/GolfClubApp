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
Route::get('enroll-user/{userId}', 'UsersController@enroll')->name('enroll-user');
Route::get('welcome/enrollData', 'UsersController@enrollData')->name('welcome.enrollData');

//Route::get('/', function (UsersDataTable $dataTable  ) {
    //return $dataTable->render('index');
//});

Auth::routes();

Route::get('/home', function(){
  return view('home');
});


//Route::get('/clubs', function(){  return view('clubs');});
Route::get('clubs', 'ClubsController@index')->name('clubs');
Route::get('clubs/getdata', 'ClubsController@getdata')->name('clubs.getdata');
Route::get('myclubs/{user_id}', 'ClubsController@myclubs')->name('myclubs');

Route::get('admin', 'ClubsController@index2')->name('admin');
Route::get('admin_enroll/{user_id}', 'ClubsController@admin_enroll')->name('admin_enroll');
Route::get('admin_approve', 'ClubsController@admin_approve')->name('admin_approve');
Route::get('admin/admin_view', 'ClubsController@admin_view')->name('admin.admin_view');
Route::get('admin_deny', 'ClubsController@admin_deny')->name('admin_deny');

Route::resource('users', 'UsersController');
Route::resource('clubs', 'ClubsController');

Route::get('/', function () {
    return view('home');
});
