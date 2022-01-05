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

Route::get('/admin', function () {
    return view('admin.dashborad');
});



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
Route::resource('salesman', SalesManController::class);
Route::resource('student-request', StudentRequestController::class);
Route::resource('visa',VisaController::class);