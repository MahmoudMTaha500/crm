<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Report\ReportController;
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



Route::get('/home', 'HomeController@index')->name('home');
//Route::get('/', 'HomeController@index')->name('home');
Route::group(['middleware' => ['auth' ,  'role:employee|admin' ]], function(){

    Route::resource('bank',BankController::class);

    Route::resource('salesman', SalesManController::class);
    Route::resource('markter', MarkterController::class);
    // Route::resource('visa', VisaController::class);
    Route::resource('employee', EmployeesController::class);
    Route::get('report/university',[ReportController::class, "GetReportUniversity"])->name('report-university');
    Route::get('report/english-school',[ReportController::class, "GetReportEnglishSchool"])->name('report-english-school');
    Route::get('report/student',[ReportController::class, "GetReportStudent"])->name('report-student');
    Route::post('report/student/',[ReportController::class, "ShowReportStudent"])->name('report-student-post');


    Route::get('report/university/download',[ReportController::class, "DownloadExcelSheet"])->name('download-excel');
    Route::get('report/university/pdf',[ReportController::class, "convertToPdf"])->name('download-pdf');


    Route::get('report/english-school/download',[ReportController::class, "DownloadExcelSheetEnglishSchool"])->name('download-excel-english-school');
    Route::get('report/english-school/pdf',[ReportController::class, "convertToPdfEnglishSchool"])->name('download-pdf-english-school');

});

    //  ////////////////////////////Start  admission/////////////////////////////////////////////

Route::group(['middleware' => ['role:admission|admin']], function(){
    Route::get('/place/getcities',"PlaceOfStudyController@getCities");
    Route::get('student/media/delete/{id}',"StudentController@deleteMedia");
    Route::get('student-request/allrequests/download', 'StudentRequestController@All_Requests_In_Excel')->name('student-request.excel');
    Route::get('student-request/request/download', 'StudentRequestController@Requests_In_Excel')->name('student-request.request-excel');

    // ///////////////////  Start axios  University ////////////////////////////
    Route::get('university-request/allrequests/download', 'UniversityRequestsController@All_Requests_In_Excel')->name('university-request.excel');
    Route::get('university-request/request/download', 'UniversityRequestsController@Requests_In_Excel')->name('university-request.request-excel');

    Route::get('university-request/get-uni','UniversityRequestsController@getUni');
    Route::get('university-request/get-agency','UniversityRequestsController@getAgency');
    Route::get('university-request/get-students','UniversityRequestsController@getstudents');
    Route::get('university-request/get-agency-uni','UniversityRequestsController@getagencyUni');
    // ///////////////////  Route English school axios  ////////////////////////////
    Route::get('english-school-request/allrequests/download', 'EnglishSchoolRequestsController@All_Requests_In_Excel')->name('english-school-request.excel');
    Route::get('english-school-request/request/download', 'EnglishSchoolRequestsController@Requests_In_Excel')->name('english-school-request.request-excel');

    Route::get('english-school-request/get-english-school','EnglishSchoolRequestsController@getEnglishSchool');
    Route::get('english-school-request/get-agency','EnglishSchoolRequestsController@getAgency');
    Route::get('english-school-request/get-students','EnglishSchoolRequestsController@getstudents');
    Route::get('english-school-request/get-agency-uni','EnglishSchoolRequestsController@getagencyUni');
    // ///////////////////  End axios  ////////////////////////////

    Route::resource('country', CountryController::class);
    Route::resource('city', CityController::class);
    Route::resource('place', PlaceOfStudyController::class);
    Route::resource('agency',AgencyController::class);
    Route::resource('university',UniversityController::class);
    Route::resource('english-school',EnglishSchoolController::class);

    Route::resource('student-request', StudentRequestController::class);
    Route::resource('university-request', UniversityRequestsController::class);
    Route::resource('english-school-request', EnglishSchoolRequestsController::class);
});
    //  ////////////////////////////End  admission/////////////////////////////////////////////
    //  ////////////////////////////Start  visa/////////////////////////////////////////////

Route::group(['middleware' => ['role:visa|admin']], function(){
    // ///////////////////  Start axios  VISA ////////////////////////////
    Route::get('/visaType/gettype',"VisaTypeController@getType");

    // ///////////////////  Start axios  VISA ////////////////////////////


Route::resource('visa',VisaController::class);
Route::resource('visa-type',VisaTypeController::class);
});

Route::group(['middleware' => ['role:visa|admin|admission']], function(){
    Route::resource('student', StudentController::class);
});

    //  ////////////////////////////End  visa/////////////////////////////////////////////

    //  ////////////////////////////Start  Finance/////////////////////////////////////////////

Route::group(['middleware' => ['role:finance|admin']], function(){
Route::resource('finance-university',FinanceUniversityController::class);
Route::resource('finance-english-school',EnglishSchoolFinanceController::class);

 });
    //  ////////////////////////////End  Finance/////////////////////////////////////////////

    Route::get('log-out',"EmployeesController@getLogout")->name('log-out');

    Auth::routes();
