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

Route::group(['middleware' => ['role:admin']], function(){

Route::get('/', function () {
    return view('welcome');
});
;

Route::get('/home', 'HomeController@index')->name('home');
Route::get('log-out',"EmployeesController@getLogout")->name('log-out');

//  ////////////////////////////Start Ajax Routes/////////////////////////////////////////////
Route::get('/place/getcities',"PlaceOfStudyController@getCities");
//  ////////////////////////////End Ajax Routes//////////////////////////////////////////////
//  ////////////////////////////Start normal Routes/////////////////////////////////////////////
Route::get('student/media/delete/{id}',"StudentController@deleteMedia");
Route::get('student-request/allrequests/download', 'StudentRequestController@All_Requests_In_Excel')->name('student-request.excel');
Route::get('student-request/request/download', 'StudentRequestController@Requests_In_Excel')->name('student-request.request-excel');
//  ////////////////////////////Start  normalRoutes/////////////////////////////////////////////
Route::resource('country', CountryController::class);
Route::resource('city', CityController::class);
Route::resource('place', PlaceOfStudyController::class);
Route::resource('student', StudentController::class);
Route::resource('student-request', StudentRequestController::class);

Route::resource('salesman', SalesManController::class);

Route::resource('visa',VisaController::class);

    Route::resource('employee',EmployeesController::class);



});
    //  ////////////////////////////Start  admission/////////////////////////////////////////////

Route::group(['middleware' => ['role:admission']], function(){
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', function () {
    return view('welcome');
});
Route::get('log-out',"EmployeesController@getLogout")->name('log-out');
    Route::get('/place/getcities',"PlaceOfStudyController@getCities");
    Route::get('student/media/delete/{id}',"StudentController@deleteMedia");
    Route::get('student-request/allrequests/download', 'StudentRequestController@All_Requests_In_Excel')->name('student-request.excel');
    Route::get('student-request/request/download', 'StudentRequestController@Requests_In_Excel')->name('student-request.request-excel');
    
    
    Route::resource('country', CountryController::class);
    Route::resource('city', CityController::class);
    Route::resource('place', PlaceOfStudyController::class);
    Route::resource('student', StudentController::class);
    Route::resource('student-request', StudentRequestController::class);
});
    //  ////////////////////////////End  admission/////////////////////////////////////////////

    //  ////////////////////////////Start  visa/////////////////////////////////////////////

Route::group(['middleware' => ['role:visa']], function(){
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', function () {
    return view('welcome');
});
Route::get('log-out',"EmployeesController@getLogout")->name('log-out');

Route::resource('visa',VisaController::class);

  
    Route::resource('student', StudentController::class);
});
    //  ////////////////////////////End  visa/////////////////////////////////////////////

    //  ////////////////////////////Start  Finance/////////////////////////////////////////////

Route::group(['middleware' => ['role:finance']], function(){
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', function () {
    return view('welcome');
});
Route::get('log-out',"EmployeesController@getLogout")->name('log-out');


  
});
    //  ////////////////////////////End  Finance/////////////////////////////////////////////


Auth::routes();
