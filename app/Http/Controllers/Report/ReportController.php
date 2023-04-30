<?php

namespace App\Http\Controllers\Report;

use App\Country;
use App\EnglishSchool;
use App\EnglishSchoolFinance;
use App\EnglishSchoolRequests;
use App\Exports\Report\ExcelSheetReport;
use App\Exports\Report\ExcelSheetEnglishSchoolReport;
use App\financeUniversity;
use App\Http\Controllers\Controller;
use App\Markter;
use App\SalesMan;
use App\Student;
use App\Student_media;
use App\University;
use App\universityRequests;
use App\User;
use App\Visa;
use Illuminate\Http\Request;
use Session;
use Excel;
use Alert;
use PDF;
use App\Http\Controllers\Report\EnglishSchoolReport;

class ReportController extends Controller
{
  public  $filterRequestData;


    /**
     * @return mixed
     */
    public function getFilterRequestData()
    {
        return $this->filterRequestData;
    }

    /**
     * @param mixed $filterRequestData
     */
    public function setFilterRequestData($filterRequestData): void
    {
        $this->filterRequestData = $filterRequestData;

    }



    /*
     *
     *   Report for university
     */


    public function GetReportUniversity(Request $request){
        $financeUniversity = financeUniversity::where('id',0)->paginate(10);
        if($request->filter){
            $ReportUniversity = new ReportUniversity($request);
            $financeUniversity= $ReportUniversity->GetReportsUniversity($request);

            $ReportUniversity->setFinanceUniversity(  $financeUniversity);
            $this->filterRequestData =$ReportUniversity->getFinanceUniversity();
//                        set( $this->filterRequestData);
//            $request->session()->all() =$this->filterRequestData;
            Session::put('filterRequestData', $this->filterRequestData);

        }


        $students =Student::get();


        $markters = Markter::get();

        $countries = Country::get();
        $SalesMens = SalesMan::get();
        $universities = University::get();
        $employees = User::get();
        return view('admin.report.university.university' ,compact('financeUniversity','students','countries','universities','SalesMens','markters','employees'));


    }



    public function DownloadExcelSheet( ){
      $data=  Session::get('filterRequestData');
        if($data->isEmpty()){
            Alert::error('Empty Data','at lest one record to download file excel ');
            return redirect()->back();
        }
        return Excel::download(new ExcelSheetReport($data), 'Report University.xlsx');
    }

    public function convertToPdf(){
        $pdf = PDF::Make();
        $data=  Session::get('filterRequestData');
        $filter = [
            'financeUniversity' => $data
        ];
        $pdf->loadView('admin.report.university.exports', $filter);
        return $pdf->stream('Report University.pdf');
    }



    /*
     *  Report For English School
     *
     */

    public function GetReportEnglishSchool(Request $request ){

        $EnglishSchoolFinance = EnglishSchoolFinance::where('id',0)->paginate(10);

        if($request->filter){
      $report = new EnglishSchoolReport();
            $EnglishSchoolFinance = $report->GetReportEnglishSchool($request);
            Session::put('filterRequestData',$EnglishSchoolFinance);
        }
        $students =Student::get();


        $markters = Markter::get();

        $countries = Country::get();
        $SalesMens = SalesMan::get();
        $EnglishSchools = EnglishSchool::get();
        $employees = User::get();
        return view('admin.report.englishschool.englishschool' ,compact('EnglishSchoolFinance','students','countries','EnglishSchools','SalesMens','markters','employees'));

    }

    public function DownloadExcelSheetEnglishSchool( ){
        $data=  Session::get('filterRequestData');
        if($data->isEmpty()){
            Alert::error('Empty Data','at lest one record to download file excel ');
            return redirect()->back();
        }
        return Excel::download(new ExcelSheetEnglishSchoolReport($data), 'Report English School .xlsx');
    }


/*
     *
     *
     * */

    public function convertToPdfEnglishSchool(){
        $pdf = PDF::Make();
        $data=  Session::get('filterRequestData');
        $filter = [
            'financeenglishschool' => $data
        ];
        $pdf->loadView('admin.report.englishschool.exports', $filter);
        return $pdf->stream('Report English School.pdf');
    }


/*
     *
     * */
    public function GetReportStudent(){

        return view('admin.report.student.student');
    }

    public function ShowReportStudent(Request  $request){
//        dd($request->all());
        $student = new Student();
        $name =$request->name;
        if($request->name){
            $student =$student->where('name','LIKE',"%{$name}%");
        }
        if($request->email){
            $student =$student->where('email',"$request->email");
        }
        $student = $student->first();
//        dd($student);


        $StudentsRequest=universityRequests::where('student_id',$student->id)->with('university')->with('universityFinance.commissions')->get();

        $englishSchoolsRequests = EnglishSchoolRequests::where('student_id',$student->id)->with('englishschool')->with('englishSchoolFinance.commissions')->get();

        $student_media = Student_media::where('student_id',$student->id)->get();
        $visas = Visa::where('student_id',$student->id)->get();
        return view('admin.report.student.student',compact('student','student_media','StudentsRequest','englishSchoolsRequests','visas'));

    }
}
