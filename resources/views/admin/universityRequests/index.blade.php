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
                        <form action="{{route('university-request.index')}}" method="GET">
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
                                    <label for="" class="control-label mb-1"> City:</label>
                                    <select name="city_id" id="city_id" class="form-control">
                                        <option value=""> Chosse City </option>

                                      </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
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

                                <div class="col-6">
                                  <div class="form-group">
                                    <label for="" class="control-label mb-1"> Agencies:</label>
                                    <select class="form-control "  name="agency" id="agency_id">
                                        <option value="">Please Choose Agencies</option>
                                        {{-- @foreach ($institutes as $institute)
                                        <option value="{{$institute->id}}">{{$institute->name}}</option>

                                        @endforeach --}}

                                      </select>
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
                                    <label for="" class="control-label mb-1"> Employees :</label>
                                    <select class="form-control "  name="employee" id="">
                                        <option value="">Please Choose Employees </option>
                                        @foreach ($employees as $employee)
                                        <option value="{{$employee->name}}">{{$employee->name}}</option>

                                        @endforeach

                                      </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                  <div class="form-group">
                                    <label for="" class="control-label mb-1"> Start Date:</label>
                                    <input class="form-control" type="date" name="start_date" id="from_date">
                                    </div>
                                </div>
                                <div class="col-6">
                                  <div class="form-group">
                                    <label for="" class="control-label mb-1"> Kind Of Course :</label>
                                    <select class="form-control" style="border: 1px #888 solid;" name="kind_of_course" id="course_id">
                                        <option value="">Please Choose Place</option>
                                        <option value="Degree">Degree</option>
                                        <option value="Pathway">Pathway</option>
                                        <option value="Pre-sessional">Pre-sessional</option>
                                        <option value="Other">Other</option>
                                    </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                              <div class="col-6">
                                <div class="form-group">
                                  <label for="" class="control-label mb-1"> E-Mail:</label>
                                  <input type="email" name="email" class="form-control" placeholder="type E-Mail">
                                  </div>
                              </div>

                              <div class="col-6">
                                <div class="form-group">
                                  <label for="" class="control-label mb-1"> Phone:</label>
                                  <input type="number" name="phone" class="form-control" placeholder="type Phone">

                                  </div>
                              </div>
                          </div>

                          <div class="row">
                              <div class="col-6">
                                <div class="form-group">
                                  <label for="" class="control-label mb-1"> Name:</label>
                                <input   class="form-control" type="text" name="name" placeholder="Type Name Of Place ">
                                  </div>
                              </div>

                                <div class="col-6">
                                  <div class="form-group">
                                    <label for="" class="control-label mb-1"> Status:</label>
                                    <select class="form-control "  name="status" id="">
                                      <option value="" selected> Chose Status </option>
                                      <option value="Hold"> Hold </option>
                                      <option value="Applied"> Applied </option>
                                      <option value="Conditional offer"> Conditional offer</option>
                                      <option value="Conditional offer deferred"> Conditional offer deferred </option>
                                      <option value="Unconditional offer"> Unconditional offer </option>
                                      <option value="Unconditional offer deferred"> Unconditional offer deferred</option>
                                      <option value="Unconditional offer deferred"> Unconditional offer deferred</option>
                                      <option value="Confirmed / CAS"> Confirmed / CAS</option>
                                      <option value="Rejected"> Rejected</option>
                                      <option value="Withdrawn"> Withdrawn</option>


                                      </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
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
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <input type="submit" value="Confirm"  class="btn btn-primary">

						</div>
                    </form>
					</div>
				</div>
			</div>
			<!-- end modal medium -->

            <div class="row">
      @include('admin.includes.errors')

                <div class="col-lg-12">
                  <form action="{{route('university-request.request-excel')}}" method="get">
                    @csrf
                    @method('get')
                    <div class="row">
                    <div class="col-1">

										<button type="button" class="btn btn-secondary mb-1" data-toggle="modal" data-target="#mediumModal">
											Filter
										</button>


                    </div>
                    <div class="col-2">
                        <a  href="{{route('university-request.excel')}}" class="btn btn-primary mb-2"> Excel Sheet All Requests</a>
                    </div>






                 <div class="col-4">
                    <button  id="excel" class="btn btn-primary mb-2" onclick="excelSheet()"> Excel Sheet  </button>
                </div>

                </div>


                    <div class="table-responsive table--no-card m-b-30">
                        <table class="table table-borderless table-striped table-earning">
                            <thead>
                                <tr>
                                    <th>#ID</th>

                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Student Type</th>
                                    <th>Country</th>
                                    <th>City</th>
                                    <th>University</th>
                                    <th>Agency</th>
                                    <th> Course</th>
                                    <th>Status</th>
                                    <th>Start Date </th>
                                    <th>Note </th>
                                    <th>Sales Man</th>
                                    <th>Markter</th>



                                    <th>Creator</th>
                                    <th>Date</th>
                                    <th class="text-right">Control</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($universityRequestss)
                                @foreach($universityRequestss as $request)
                                <tr>
                                    <td> {{$request->id}}  <input type="checkbox" class="" name="requests_ids[]" value="{{$request->id}}"></td>
                                    <td>{{$request->student->name}}</td>
                                    <td>{{$request->student->phone}}</td>
                                    <td>{{$request->student->email}}</td>
                                    <td>{{$request->student->student_type}}</td>
                                    <td>{{$request->university->country->name}}</td>
                                    <td>{{$request->university->city->name}}</td>

                                    <td>{{$request->university->name}}</td>
                                    <td>{{$request->agency->name}}</td>
                                    <td>{{$request->course->name}}</td>
                                    <td>{{$request->status}}</td>
                                    <td>{{$request->start_date}}</td>
                                    <td>{{$request->text_note}}</td>
                                    <td>{{$request->salesman->name}}</td>
                                    <td>{{$request->markter->name??'---'}}</td>

                                    <td>{{$request->creator}}</td>



                                    <td>{{$request->created_at}}</td>

                                  <td>
                                    <div class="table-data-feature">

                                        <a href="{{route('university-request.edit',$request->id)}}" class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                            <i class="zmdi zmdi-edit"></i>
                                        </a>
                                        <a href="{{route('student.show',$request->student_id)}}" class="item" data-toggle="tooltip" data-placement="top" title="Edit" target="_blank">
                                          <i class="zmdi zmdi-eye"></i>
                                      </a>
                                        <form action="{{route('university-request.destroy', $request->id)}}" method="POST">
                                            @csrf
                                            @method('delete')


                                        <button href="" class="item" data-toggle="tooltip" data-placement="top" title="Delete"
                                        onclick="return confirm('Are u Sure For Delete This request')"
                                        >
                                            <i class="zmdi zmdi-delete"></i>
                                        </button>
                                    </form>


                                    </div>

                                    </td>
                                </tr>
                             @endforeach
                             @endif
                             @if($universityRequestss->total() ==0)
                             <tr>
                                 <td colspan="12">
                                Opps! no Data Found
                            </td>
                           </tr>
                             @endif
                            </tbody>
                        </table>

                    </div>
                </form>

                </div>
                {{$universityRequestss->appends(request()->input())->links('pagination::bootstrap-4') }}

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
            alert(11);
$('#to_date').removeAttr('disabled');
  }
  });

</script>

@endsection
