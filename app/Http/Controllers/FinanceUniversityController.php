<?php

namespace App\Http\Controllers;

use App\financeUniversity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Student_media;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\student\StudentsRequest;
use App\Student;
use App\Country;
use App\Markter;
use App\SalesMan;
use App\University;
use App\Commission;
use App\User;
use App\Agency;

class FinanceUniversityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->CanDoAction('admin', 'show-finance');

        if ($request->filter) {
            //    dd($request->all());
            $country_id = $request->country_id;
            $university = $request->university;
            $agency = $request->agency;
            $salesMan = $request->salesMan;
            $markter = $request->markter;
            $employee = $request->employee;
            $start_date = $request->start_date;
            $name = $request->name;
            $remain = $request->remain;
            $status_followed = $request->status_followed;
            $status_paied = $request->status_paied;
            $month = $request->month;
            $year = $request->year;


            $financeUniversity = new financeUniversity;
            if ($request->country_id) {
                $financeUniversity = $financeUniversity->with('request_uni.university')->whereHas('request_uni.university', function ($query) use ($country_id) {
                    $query->where('country_id', $country_id);
                });
            }
            if ($university) {
                $financeUniversity = $financeUniversity->with('request_uni')->whereHas('request_uni', function ($query) use ($university) {
                    $query->where('university_id', $university);
                });
            }
            if ($agency) {
                $financeUniversity = $financeUniversity->with('request_uni')->whereHas('request_uni', function ($query) use ($agency) {
                    $query->where('agency_id', $agency);

                });
            }
            if ($request->salesMan) {
                $financeUniversity = $financeUniversity->with('request_uni')->whereHas('request_uni', function ($query) use ($salesMan) {
                    $query->where('salesman_id', $salesMan);

                });
            }
            if ($markter) {
                $financeUniversity = $financeUniversity->with('request_uni')->whereHas('request_uni', function ($query) use ($markter) {
                    $query->where('markter_id', $markter);

                });
            }
            if ($start_date) {
                $financeUniversity = $financeUniversity->with('request_uni')->whereHas('request_uni', function ($query) use ($start_date) {
                    $query->where('start_date', $start_date);

                });
            }

            if ($employee) {
                $financeUniversity = $financeUniversity->where('creator', '=', "$employee");
            }
            if ($remain) {
                $financeUniversity = $financeUniversity->where('commission_remain', '>', "$remain");
            }

            if ($request->name) {
                $financeUniversity = $financeUniversity->with('request_uni.student')->whereHas('request_uni.student', function ($query) use ($name) {
                    $query->where('name', 'LIKE', "%{$name}%");

                });
            }


            if ($status_followed) {
                $financeUniversity = $financeUniversity->where('status_followed', $status_followed);
            }
            if ($status_paied) {
                $financeUniversity = $financeUniversity->where('status_paied', $status_paied);
            }
            if ($month) {
                $financeUniversity = $financeUniversity->with('request_uni')->whereHas('request_uni', function ($query) use ($month) {
                    $query->whereMonth('start_date', $month);

                });

            }
            if ($year) {
                $financeUniversity = $financeUniversity->with('request_uni')->whereHas('request_uni', function ($query) use ($year) {
                    $query->whereYear('start_date', $year);

                });
            }

            $financeUniversity = $financeUniversity->with('request_uni.student')->with('request_uni')->with('commissions')->orderBy('id', 'DESC')->paginate(10);
        } else {
            $financeUniversity = financeUniversity::with('request_uni.student')->with('request_uni')->with('commissions')->orderBy('id', 'DESC')->paginate(10);


        }


        // $financeUniversity = financeUniversity::with('request_uni.student')->with('request_uni.university')->orderBy('id', 'DESC')->paginate(10);

        $students = Student::get();


        $markters = Markter::get();

        $countries = Country::get();
        $SalesMens = SalesMan::get();
        $universities = University::get();
        $employees = User::get();
        return view('admin.finance.index', compact('financeUniversity', 'students', 'countries', 'universities', 'SalesMens', 'markters', 'employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\financeUniversity $financeUniversity
     * @return \Illuminate\Http\Response
     */
    public function show(financeUniversity $financeUniversity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\financeUniversity $financeUniversity
     * @return \Illuminate\Http\Response
     */
    public function edit(financeUniversity $financeUniversity)
    {
        $this->CanDoAction('admin', 'edit-finance');

        $commissions = Commission::where('finance_id', $financeUniversity->id)->get();

        $student_media = Student_media::where('student_id', $financeUniversity->student_id)->get();
        $universities = University::get();
        $agencies = Agency::get();
        $students = Student::get();


        return view('admin.finance.edit', compact('financeUniversity', 'student_media', 'students', 'commissions', 'universities', 'agencies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\financeUniversity $financeUniversity
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, financeUniversity $financeUniversity)
    {
        // dd($request->all());
        $financeUniversity->total = $request->total;
        $financeUniversity->pay = $request->paied;
        $financeUniversity->remain = $request->remain;

        $financeUniversity->commission_percentage = $request->commission_percentage;

        $financeUniversity->commission_percentage = $request->commission_percentage;
        $financeUniversity->commission_total = $request->commission_total;
        $financeUniversity->commission_received = $request->commission_received;
        $financeUniversity->commission_remain = $request->commission_remain;

        $financeUniversity->status_paied = $request->status_paied;
        $financeUniversity->status_followed = $request->status_followed;

        $financeUniversity->student_period = $request->student_period;
        $financeUniversity->university_note = $request->university_note;
        $financeUniversity->sat_note = $request->sat_note;
        $financeUniversity->creator = auth()->user()->name;
        $financeUniversity->save();
        $counter = count($request->commission);
        $commissions = Commission::where('finance_id', $financeUniversity->id)->delete();
        for ($x = 0; $x < $counter; $x++) {

            Commission::create([
                'finance_id' => $financeUniversity->id,
                'commission' => $request->commission[$x],
                'commission_date' => $request->commission_date[$x],

            ]);
        }
        Alert::success('Update  Opration', 'Finance Request University  Updated Succssfully');
        return redirect()->route('finance-university.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\financeUniversity $financeUniversity
     * @return \Illuminate\Http\Response
     */
    public function destroy(financeUniversity $financeUniversity)
    {
        $this->CanDoAction('admin', 'delete-finance');

    }
}
