@extends('admin.app')
@section('admin.content')
<style>

    .modal-backdrop{
        z-index: -1;
    }
        </style>
                <!-- modal medium -->
                <div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="mediumModalLabel">Filter </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{route('finance-university.index')}}" method="GET">
                             @csrf
                            <input type="hidden" name="filter" value="1">

                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-6">
                                      <div class="form-group">
                                        <label for="" class="control-label mb-1"> Country:</label>
                                        <select name="country_id" id="country_id"  class="form-control">
                                            <option value=""> Chosse Country </option>

                                                @foreach($countries as $country)
                                                  <option  value="{{$country->id}}">{{$country->name}}</option>
                                                @endforeach
                                          </select>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                      <div class="form-group">
                                        <label for="" class="control-label mb-1"> Universities:</label>
                                        <select class="form-control "      name="university" id="university_id">
                                            <option value="">Please Choose Place</option>
                                            @foreach ($universities as $university)
                                            <option value="{{$university->id}}">{{$university->name}}</option>

                                            @endforeach

                                          </select>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-6">
                                      <div class="form-group">
                                        <label for="" class="control-label mb-1"> Agencies:</label>
                                        <select class="form-control "  name="agency" id="agency_id">
                                            <option value="">Please Choose Agencies</option>


                                          </select>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                      <div class="form-group">
                                        <label for="" class="control-label mb-1"> Name:</label>
                                      <input   class="form-control" type="text" name="name" placeholder="Type Name Of Student ">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                      <div class="form-group">
                                        <label for="" class="control-label mb-1"> Sales Man:</label>
                                        <select class="form-control "  name="salesMan" id="salesMan_id">
                                            <option value="">Please Choose Sales Man</option>
                                            @foreach ($SalesMens as $SalesMan)
                                            <option value="{{$SalesMan->id}}">{{$SalesMan->name}}</option>

                                            @endforeach

                                          </select>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                      <div class="form-group">
                                        <label for="" class="control-label mb-1"> Markter:</label>
                                        <select class="form-control"name="markter" id="">

                                          <option value="">Please Choose  Markter</option>
                                          @foreach ($markters as $markter)
                                          <option value="{{$markter->id}}">{{$markter->name}}</option>

                                          @endforeach

                                          </select>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-4">
                                      <div class="form-group">
                                        <label for="" class="control-label mb-1"> Start Date:</label>
                                        <input class="form-control" type="date" name="start_date" id="from_date">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                      <div class="form-group">
                                        <label for="" class="control-label mb-1"> By Month:</label>
                                            <select id="month" class="form-control"  name="month">
                                              <option  value="0" selected>Choose Month</option>
                                              <option  value="01" >January</option>
                                              <option  value="02"> February</option>
                                              <option value="03">March</option>
                                              <option value="04">April</option>
                                              <option value="05">May</option>
                                              <option value="06">June</option>
                                              <option value="07">July</option>
                                              <option value="08">August</option>
                                              <option value="09">September</option>
                                              <option value="10">October</option>
                                              <option value="11">November</option>
                                              <option value="12">December</option>
                                            </select>
                                        </div>
                                    </div> <div class="col-4">
                                      <div class="form-group">
                                        <label for="" class="control-label mb-1"> By Year:</label>

                                        <select id="year" class="form-control" name="year">
                                          <option  value="0" selected>Choose Year</option>

                                        </select>

                                        </div>
                                    </div>


                                </div>
                                <div class="row">

                                  <div class="col-6">
                                    <div class="form-group">
                                      <label for="" class="control-label mb-1"> Employees :</label>
                                      <select class="form-control "  name="employee" id="">
                                          <option value="">Please Choose Employees </option>
                                          @foreach ($employees as $employee)
                                          <option value="{{$employee->name}}">{{$employee->name}}</option>

                                          @endforeach

                                        </select>
                                      </div>
                                  </div>
                                  <div class="col-6">
                                    <div class="form-group">
                                      <label for="" class="control-label mb-1"> Remain:</label>
                                      <input type="number" name="remain" class="form-control" placeholder="type Reamin">

                                      </div>
                                  </div>
                              </div>

                              <div class="row">
                                  <div class="col-6">
                                    <div class="form-group">
                                      <label for="cc-payment" class="control-label mb-1">Status Followed  :</label>
                                      <select class="form-control"name="status_followed" id="">
                                        <option  value="">Please Choose  Status</option>
                                        <option   value=" Not yet followed"> Not yet followed</option>
                                        <option   value="Following and Pending response">Following and Pending response</option>
                                        <option   value="Followed">Followed</option>
                                        </select>
                                  </div>
                                  </div>

                                    <div class="col-6">
                                      <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">Status Paied :</label>
                                        <select class="form-control"name="status_paied" id="">
                                          <option  value="">Please Choose  Status</option>
                                          <option   value=" Not paid yet"> Not paid yet</option>
                                          <option   value="Partially Paid">Partially Paid</option>
                                          <option  value="All commission paid">All commission paid</option>
                                          </select>
                                    </div>
                                    </div>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <input type="submit" value="Confirm"  class="btn btn-primary">
                                {{-- <button type="button"  class="btn btn-primary">Confirm</button> --}}
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
                <!-- end modal medium -->

                			<!-- modal small -->

			<!-- end modal small -->
                <div class="row">
                    <div class="col-1">
                        <button type="button" class="btn btn-secondary mb-1" data-toggle="modal" data-target="#mediumModal">
                            Filter
                        </button>
                    </div>

                </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive table--no-card m-b-30">
                        <table class="table table-borderless table-striped table-earning">
                            <thead>
                                <tr>
                                    <th>#ID</th>

                                    <th>Student Name</th>
                                    <th>Phone</th>
                                    <th>Type</th>
                                    <th>Nationality</th>
                                    <th>Country</th>
                                    <th>University</th>
                                    <th>Program</th>
                                    <th>Course Note</th>
                                    <th>Start Date</th>
                                    <th>Paid </th>
                                    <th>Remain </th>
                                    <th>Total </th>

                                    <th>Commission  Total</th>
                                    <th>Commission  received</th>
                                    <th>Commission  Remain</th>
                                    <th>Commission  percentage</th>

                                    <th>Commission  Details</th>
                                    <th>Sales man </th>
                                    <th>Markter </th>

                                    <th>University Note </th>
                                    <th>Sat Note </th>
                                    <th>Status Paied </th>
                                    <th>Status Followed</th>
                                    <th>Creator</th>
                                    <th class="text-right">Control</th>
                                </tr>
                            </thead>


                            <tbody>
                                @foreach($financeUniversity as $finance)

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
                                    <td>{{$finance->id}}</td>
                                    <td>{{$finance->request_uni->student->name}}</td>
                                    <td>{{$finance->request_uni->student->phone}}</td>
                                    <td>{{$finance->request_uni->student->student_type}}</td>
                                    <td>{{$finance->request_uni->student->nationality}}</td>
                                    <td>{{$finance->request_uni->university->country->name}}</td>
                                    <td>{{$finance->request_uni->university->name}}</td>
                                    <td>{{$finance->request_uni->kind_of_course}}</td>
                                    <td>{{$finance->request_uni->text_note}}</td>

                                    <td>{{$finance->request_uni->start_date}}</td>
                                    {{-- <td>{{$finance->request_uni->agency->name}}</td> --}}
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
                                    <td>{{$finance->request_uni->salesman->name}}</td>
                                    <td>{{$finance->request_uni->markter->name}}</td>


                                    <td>{{$finance->university_note}}</td>
                                    <td>{{$finance->sat_note}}</td>



                                    <td>{{$finance->status_paied}}</td>
                                    <td>{{$finance->status_followed}}</td>
                                    <td>{{$finance->creator}}</td>
                                  <td>
                                    <div class="table-data-feature">

                                        <a href="{{route('finance-university.edit',$finance->id)}}" class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                            <i class="zmdi zmdi-edit"></i>
                                        </a>
                                        <a href="{{route('student.show',$finance->request_uni->student_id)}}" class="item" data-toggle="tooltip" data-placement="top" title="show" target="_blank">
                                            <i class="zmdi zmdi-eye"></i>
                                        </a>
                                        <form action="{{route('finance-university.destroy', $finance->id)}}" method="POST">
                                            @csrf
                                            @method('delete')


                                        <button href="" class="item" data-toggle="tooltip" data-placement="top" title="Delete"
                                        onclick="return confirm('Are u Sure For Delete This finance')"
                                        >
                                            <i class="zmdi zmdi-delete"></i>
                                        </button>
                                    </form>


                                    </div>

                                    </td>
                                </tr>
                             @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                {{$financeUniversity->appends(request()->input())->links('pagination::bootstrap-4')}}

            </div>

@endsection
@section('admin.scripts')

<script>

  $("#country_id").change(function(){
    var country_id =$(this).val();
  // alert(country_id );
//   if(country_id== ''){

//   } else {
    var  route = "{{url('/place/getcities') }}";
    $.ajax(route,   // request url
    {
      type: 'GET',  // http method
    data: { "country_id": country_id },
        success: function (data, status, xhr) {// success callback function
            $('#city_id').html(data.html_city);
            $('#university_id').html(data.html_university);
            $('#institute_id').html(data.html_institute);
    }
});
//   }

  });

  $("#university_id").change(function(){
    var uni_id = $(this).val();
    var  route = "{{url('university-request/get-agency-uni') }}";

    $.ajax(route,   // request url
    {
      type: 'GET',  // http method
    data: { "uni_id": uni_id ,"typeArray":'1'},
        success: function (data, status, xhr) {// success callback function
            $('#agency_id').html(data.html_agency);
            // $('#university_id').html(data.html_university);
            // $('#institute_id').html(data.html_institute);
    }
});
  })

  $('#from_date').change(function(){
        // alert(1111);
        // alert();
        if($(this).val()){
$('#to_date').removeAttr('disabled');
  }
  });




$( document ).ready(function() {

this.years = function(startYear) {
    var currentYear = new Date().getFullYear(), years = [];
    startYear = startYear || 1980;
    while ( startYear <= currentYear ) {
        years.push(startYear++);
    }

    return years;
}
  var years  = this.years(2000);

  var count_years = years.length;
  years.hasOwnProperty('length') // true
delete years['length']

var options_years = '<option  value="0" selected>Choose Year</option>';

   for( var x=0; x <= count_years; x++ ){
    options_years += "<option value='" + years[x] +"'> "+ years[x]+" </option> "
   }
console.log( years);


    $("#year").html(options_years);
});


// console.log( this.years(2019-20));
</script>

@endsection
