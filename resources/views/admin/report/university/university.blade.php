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
                            <form action="{{route('report-university')}}" method="GET">
                             @csrf
                            <input type="hidden" name="filter" value="1">

                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-6">
                                      <div class="form-group">
                                        <label for="" class="control-label mb-1"> Country:</label>
                                        <select name="country_id" id="country_id"  class="form-control" value="{{old('country_id')}}">
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
                                      <input   class="form-control" type="text" id="name" name="name" placeholder="Type Name Of Student ">
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
                                        <select class="form-control"name="markter" id="markter_id">

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
                                      <select class="form-control "  name="employee" id="employee_id">
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
                                      <input type="number" name="remain" class="form-control" id="remain" placeholder="type Reamin">

                                      </div>
                                  </div>
                              </div>

                              <div class="row">
                                  <div class="col-6">
                                    <div class="form-group">
                                      <label for="cc-payment" class="control-label mb-1">Status Followed  :</label>
                                      <select class="form-control"name="status_followed" id="status_followed">
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
                                        <select class="form-control"name="status_paied" id="status_paid">
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
                            Report Action
                        </button>

                    </div>

                    <div class="col-1"></div>
                    @if(request('filter') && !$financeUniversity->isEmpty())

                        <div class="col-2 ">
                            <a href="{{route('download-excel')}}"  class="btn btn-outline-success"> DownLoad Report As Excel  </a>

                        </div>
                        <div class="col-1"></div>

                        <div class="col-2 ">
                            <a href="{{route('download-pdf')}}"  class="btn btn-outline-danger" target="_blank"> DownLoad Report As Pdf  </a>

                        </div>
                    @endif
                </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive table--no-card m-b-30">
                        <table class="table table-borderless table-striped table-earning">
                            <thead>
                                <tr>
                                    <th>#ID</th>

                                    <th>Student Name</th>
                                    <th>Type</th>
                                    <th>Country</th>
                                    <th>University</th>
                                    <th>Program</th>
                                    <th>Start Date</th>

                                    <th>Commission  Total</th>
                                    <th>Commission  received</th>
                                    <th>Commission  Remain</th>

                                    <th>Sales man </th>
                                    <th>Markter </th>

                                    <th>Status Paied </th>
                                    <th>Status Followed</th>
                                    <th>Creator</th>
                                </tr>
                            </thead>


                            <tbody>
                                @forelse ($financeUniversity as $finance)



                                <tr>
                                    <td>{{$finance->id}}</td>
                                    <td>{{$finance->request_uni->student->name}}</td>
                                    <td>{{$finance->request_uni->student->student_type}}</td>
                                    <td>{{$finance->request_uni->university->country->name}}</td>
                                    <td>{{$finance->request_uni->university->name}}</td>
                                    <td>{{$finance->request_uni->kind_of_course}}</td>
                                    <td>{{$finance->request_uni->start_date}}</td>
                                    <td>{{$finance->commission_total}}</td>
                                    <td>{{$finance->commission_received}}</td>
                                    <td>{{$finance->commission_remain}}</td>
                                    <td>{{$finance->request_uni->salesman->name}}</td>
                                    <td>{{$finance->request_uni->markter->name}}</td>
                                    <td>{{$finance->status_paied}}</td>
                                    <td>{{$finance->status_followed}}</td>
                                    <td>{{$finance->creator}}</td>
                                </tr>

                                @empty
                                    <tr>
                                        <td colspan="15">
                                            No Reports here
                                        </td>
                                    </tr>
                             @endforelse

                            </tbody>
                        </table>
                    </div>
                </div>
                @if(!$financeUniversity->hasPages())
                    {{$financeUniversity->appends(request()->input())->links('pagination::bootstrap-4')}}
                @endif
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

function DownloadExcelSheet(data){
    // var country_id = $('#country_id').val();
    // alert(country_id);
    //
    // var university_id = document.getElementById('university_id');
    // var agency_id = document.getElementById('agency_id');
    // var name = document.getElementById('name');
    // var salesMan_id = document.getElementById('salesMan_id');
    // var markter_id = document.getElementById('markter_id');
    // var start_date = document.getElementById('from_date');
    // var month = document.getElementById('month');
    // var year = document.getElementById('year');
    // var employee_id = document.getElementById('employee_id');
    // var remain = document.getElementById('remain');
    // var status_followed = document.getElementById('status_followed');
    // var status_paid = document.getElementById('status_paid');


    var  route = "{{url('report/university') }}";

    $.ajax(route,   // request url
        {
            type: 'POST',  // http method
            data: {
                {{--"country_id": country_id ,--}}
                {{--"university": university_id ,--}}
                {{--"agency": agency_id ,--}}
                {{--"salesMan": salesMan_id ,--}}
                {{--"markter": markter_id ,--}}
                {{--"employee": employee_id ,--}}
                {{--"start_date": start_date ,--}}
                {{--"name": name ,--}}
                {{--"remain": remain ,--}}
                {{--"status_followed": status_followed ,--}}
                {{--"status_paied": status_paid ,--}}
                {{--"month": month ,--}}
                {{--"year": year ,--}}
                "_token": "{{ csrf_token() }}",
                data:data,
            },
            success: function (response, status, xhr) {// success callback function

                // const url = window.URL.createObjectURL(new Blob([response.data]));
                // const link = document.createElement('a');
                // link.setAttribute('download', 'file.pdf');
                // document.body.appendChild(link);
                // link.click();
                window.location.reload() ;
            }
        });
}
// console.log( this.years(2019-20));
</script>

@endsection
