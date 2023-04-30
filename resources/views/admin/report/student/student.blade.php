@extends('admin.app')
@section('admin.content')

    <style>
        h3{
            color: #007bff;
        }
        .modal-backdrop{
            z-index: -1;
        }
    </style>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Students Section
                </div>
                <div class="card-body">
                    <div class="card-title">
                        <h3 class="text-center title-2">Information Student </h3>
                    </div>


                        <form action="{{ route('report-student') }}" method="post" class="form-horizontal">
                            @csrf
                            <div class="row">

                                <div class=" col-6">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-user"></i>
                                        </div>
                                        <input type="text" id="input1-group1" name="name" placeholder="Name Of Student" class="form-control">
                                    </div>
                                </div>


                                <div class=" col-6">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="far fa-envelope"></i>
                                        </div>
                                        <input type="email" id="input2-group1" name="email" placeholder="Email" class="form-control">

                                    </div>
                                </div>

                                <div class=" col-12  m-t-15" style="text-align: center">

                            <button type="submit" class="btn btn-success btn-sm">
                                <i class="fa fa-search"></i> Search For Report
                            </button>
                                </div>
                            </div>

                        </form>
@if(isset($student))
    <div class="row">
                    <table class="table table-striped table-bordered">
                        <tbody class="text-left">
                        <tr>
                            <th>Name</th>
                            <td>{{ $student->name }}</td>
                        </tr>
                        <tr>
                            <th>E-mail</th>
                            <td>
                                {{ $student->email }}
                            </td>
                        </tr>
                        <tr>
                            <th>Phone</th>
                            <td>{{ $student->phone }}</td>
                        </tr>
                        <tr>
                            <th>Nationality</th>
                            <td>{{ $student->nationality }}</td>
                        </tr>
                        <tr>
                            <th>Student Type</th>
                            <td>{{$student->student_type}}</td>

                        </tr>


                        <tr>
                            <th>Media</th>
                            @if(!$student_media->isEmpty())
                                @foreach($student_media as $media)
                                    <td style="display:block;">
                                        <a href="{{url($media->media_path)}}" target="_blank">


                                            {{ $media->media_name }}
                                        </a>
                                    </td>
                                @endforeach
                            @else
                                <td> Opps! there are no media Here. </td>

                            @endif

                        </tr>
                        </tbody>
                        <hr >

                    </table>
    </div>
                    <div class="row">
                        <div class="col-lg-12">

                         <div class="card-title m-t-30">
                        <h3 class="text-center title-2">Information Student  Universities </h3>
                    </div>
                        <div class="table-responsive table--no-card m-b-30 m-t-30">
                            <table class="table table-border  ">

                        <tbody  class="text-left">

                        <th>University </th>
                        <th>Agency</th>
                        <th>Kind Of Course</th>
                        <th>Sales Man</th>
                        <th>Start Date</th>

                        <th>Status</th>
                        <th>Text Note</th>
                        @if(!$StudentsRequest->isEmpty() )
                            @foreach( $StudentsRequest as $request)
                                <tr>
                                    <td> {{$request->university->name }} </td>
                                    <td> {{ $request->agency->name }}</td>
                                    <td> {{ $request->kind_of_course }}</td>
                                    <td> {{ $request->salesman->name }}</td>
                                    <td> {{ $request->start_date }}</td>
                                    <td> {{ $request->status }}</td>
                                    <td> {{ $request->text_note ? $request->text_note:'----'  }}</td>
                                </tr>
                            @endforeach
                        @else
                            <tr> <td colspan='9' style="text-align: center">!Opps there are no Information For University Requests  </td></tr>
                        @endif



                        </tbody>
                    </table>
                   </div>
                    </div>
                    </div>
                        <div class="row">
                        <div class="col-lg-12">

                         <div class="card-title m-t-30">
                        <h3 class="text-center title-2">Information Student  Universities Commissions  </h3>
                    </div>
                        <div class="table-responsive table--no-card m-b-30 m-t-30">
                            <table class="table table-border  ">

                        <tbody  class="text-left">

                        <th>Paid </th>
                        <th>Remain </th>
                        <th>Total </th>

                        <th>Commission  Total</th>
                        <th>Commission  received</th>
                        <th>Commission  Remain</th>
                        <th>Commission  percentage</th>

                        <th>Commission  Details</th>

                            @forelse( $StudentsRequest as $request)
                                @forelse($request->universityFinance as $finance)
                                    <div class="modal fade" id="smallmodal-{{$finance->id}}" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-sm" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="smallmodalLabel">Commission  Details</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    @if(!$finance->commissions->isEmpty())
                                                        @foreach($finance->commissions as $comm)
                                                            {{-- {{dump( $comm) }} --}}

                                                            <p >
                                                                Commission  : <strong>{{$comm->commission}}</strong> </p>
                                                            <p >
                                                                Commission Date :<strong>{{$comm->commission_date}}</strong></p>
                                                        @endforeach
                                                    @else
                                                        <p >
                                                            there are no Commissions Here </p>
                                                    @endif

                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                    <button type="button" class="btn btn-primary">Confirm</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <tr>
                                        <td>{{$finance->pay}}</td>
                                        <td>{{$finance->remain}}</td>
                                        <td>{{$finance->total}}</td>

                                        <td>{{$finance->commission_total}}</td>
                                        <td>{{$finance->commission_received}}</td>
                                        <td>{{$finance->commission_remain}}</td>
                                        <td>{{$finance->commission_percentage}}</td>

                                        <td class="text-center">
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-primary  "  data-toggle="modal" data-target="#smallmodal-{{$finance->id}}">

                                                <i class="fas fa-eye"></i>
                                            </button>

                                        </td>
                                    </tr>
                                @empty

                                @endforelse

                            @empty
                            <tr> <td colspan='9' style="text-align: center">!Opps there are no Information For University Commissions  </td></tr>

                            @endforelse



                        </tbody>
                    </table>
                   </div>
                    </div>
                    </div>


                        <div class="row">
                            <div class="col-lg-12">

                                <div class="card-title m-t-30">
                                    <h3 class="text-center title-2">Information Student  English Schools </h3>
                                </div>
                                <div class="table-responsive table--no-card m-b-30 m-t-30">
                                    <table class="table table-border  ">

                        <tbody  class="text-left">

                        <th>English School </th>
                        <th> Course</th>

                        <th>Sales Man</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Duration</th>
                        <th>Residence</th>

                        <th>Status</th>
                        <th>Text Note</th>
                        @if(!$englishSchoolsRequests->isEmpty() )
                            @foreach( $englishSchoolsRequests as $request)
                                <tr>
                                    <td>{{$request->englishschool->name}}</td>
                                    <td>{{$request->course}}</td>
                                    <td>{{$request->salesman->name}}</td>
                                    <td>{{$request->start_date}}</td>
                                    <td>{{$request->end_date}}</td>
                                    <td>{{$request->duration}}</td>

                                    <td>{{$request->residence ?? '----'}}</td>
                                    <td>{{$request->status}}</td>


                                    <td> {{ $request->text_note ? $request->text_note:'----'  }}</td>
                                </tr>
                            @endforeach
                        @else
                            <tr> <td colspan='9' style="text-align: center">!Opps there are no Information For  English Schools  </td></tr>
                        @endif



                        </tbody>
                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">

                                <div class="card-title m-t-30">
                                    <h3 class="text-center title-2">Information Student  English Schools Commissions  </h3>
                                </div>
                                <div class="table-responsive table--no-card m-b-30 m-t-30">
                                    <table class="table table-border  ">

                                        <tbody  class="text-left">

                                        <th>Paid </th>
                                        <th>Remain </th>
                                        <th>Total </th>

                                        <th>Commission  Total</th>
                                        <th>Commission  received</th>
                                        <th>Commission  Remain</th>
                                        <th>Commission  percentage</th>

                                        <th>Commission  Details</th>
                        @forelse( $englishSchoolsRequests as $request)
                                @forelse($request->englishSchoolFinance as $finance)
                                <div class="modal fade" id="smallmodal-english{{$finance->id}}" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-sm" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="smallmodalLabel">Commission  Details</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                @if(!$finance->commissions->isEmpty())
                                                    @foreach($finance->commissions as $comm)
                                                        {{-- {{dump( $comm) }} --}}

                                                        <p >
                                                            Commission  : <strong>{{$comm->commission}}</strong> </p>
                                                        <p >
                                                            Commission Date :<strong>{{$comm->commission_date}}</strong></p>
                                                    @endforeach
                                                @else
                                                    <p >
                                                        there are no Commissions Here </p>
                                                @endif

                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                <button type="button" class="btn btn-primary">Confirm</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <tr>
                                    <td>{{$finance->pay}}</td>
                                    <td>{{$finance->remain}}</td>
                                    <td>{{$finance->total}}</td>

                                    <td>{{$finance->commission_total}}</td>
                                    <td>{{$finance->commission_received}}</td>
                                    <td>{{$finance->commission_remain}}</td>
                                    <td>{{$finance->commission_percentage}}</td>

                                    <td class="text-center">
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary  "  data-toggle="modal" data-target="#smallmodal-english{{$finance->id}}">

                                            <i class="fas fa-eye"></i>
                                        </button>

                                    </td>
                                </tr>
                            @empty

                            @endforelse

                        @empty
                            <tr> <td colspan='9' style="text-align: center">!Opps there are no Information For University Commissions  </td></tr>

                            @endforelse



                            </tbody>
                            </table>
                </div>
            </div>
        </div>

                        <div class="row">
                            <div class="col-lg-12">

                                <div class="card-title m-t-30">
                                    <h3 class="text-center title-2">Information Student Visa</h3>
                                </div>
                                <div class="table-responsive table--no-card m-b-30 m-t-30">
                                    <table class="table table-border  ">

                        <tbody  class="text-left">

                        <th>Date</th>
                        <th>Country</th>
                        <th>Visa Type</th>
                        <th>Fees</th>
                        <th>Sales Man</th>
                        <th>The Payment</th>
                        <th>Bank</th>
                        <th>Transfer Bank</th>
                        <th>Others</th>
                        <th>Status</th>
                        <th>Creator</th>
                        @if(!$visas->isEmpty() )
                            @foreach( $visas as $visa)
                                <tr>
                                    <td>{{$visa->date}}</td>
                                    <td>{{$visa->country->name}}</td>
                                    <td>{{$visa->type->name ?? '----'}}</td>
                                    <td>{{$visa->fees}}</td>
                                    <td>{{$visa->salesman->name}}</td>
                                    <td>{{$visa->payment}}</td>
                                    <td>{{$visa->bank->name}}</td>
                                    <td>{{$visa->bank->name}}</td>
                                    <td>{{$visa->other}}</td>
                                    <td>{{$visa->status}}</td>
                                    <td>{{$visa->creator}}</td>
                            @endforeach
                        @else
                            <tr> <td colspan='12' style="text-align: center">!Opps there are no Information For Visa  </td></tr>
                        @endif



                        </tbody>
                    </table>
    @endif
                </div>
            </div>
        </div>
    </div>




@endsection
