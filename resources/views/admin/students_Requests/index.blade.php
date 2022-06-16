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
                        <form action="{{route('student-request.index')}}" method="GET">
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
                                    <label for="" class="control-label mb-1"> Institutes:</label>
                                    <select class="form-control "  name="institute" id="institute_id">
                                        <option value="">Please Choose Place</option>
                                        @foreach ($institutes as $institute)
                                        <option value="{{$institute->id}}">{{$institute->name}}</option>
                                            
                                        @endforeach
              
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
                                    <label for="" class="control-label mb-1"> From:</label>
                                    <input class="form-control" type="date" name="from" id="from_date">
                                    </div>
                                </div>
                                <div class="col-6">
                                  <div class="form-group">
                                    <label for="" class="control-label mb-1"> To:</label>
                                    <input class="form-control" type="date" name="to" id="to_date" disabled>
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
                                        <option value="">Please Choose Place</option>
                                        <option value="0">  New</option>
                                        <option value="1"> Inprogress </option>
                                        <option value="2"> Done </option>
                                       
              
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

                    <div class="row">
                    <div class="col-1">
                       
										<button type="button" class="btn btn-secondary mb-1" data-toggle="modal" data-target="#mediumModal">
											Filter
										</button>
                     

                    </div>
                    <div class="col-2">
                        <a  href="{{route('student-request.excel')}}" class="btn btn-primary mb-2"> Excel Sheet All Requests</a>
                    </div>
                 
                   
                   
                    <form action="{{route('student-request.request-excel')}}" method="get">
                        @csrf

                 {{-- <input type="hidden" name="ids"> --}}

                 <div class="col4">
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
                                    <th>Address</th>
                                    <th>Study Place</th>
                                    <th>Study Place Type</th>
                                    <th>Sales Man</th>
                                    

                                    <th>Creator</th>
                                    <th>Date</th>
                                    <th class="text-right">Control</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($studentRequests)
                                @foreach($studentRequests as $request)
                                <tr>
                                    <td> {{$request->id}}  <input type="checkbox" class="ids" name="ids[]" value="{{$request->id}}"></td>
                                    <td>{{$request->student->name}}</td>
                                    <td>{{$request->student->phone}}</td>
                                    <td>{{$request->student->email}}</td>
                                    <td>{{$request->student->address}}</td>

                                    <td>{{$request->study_place->name}}</td>
                                    <td>{{$request->study_place->type->name}}</td>
                                    <td>{{$request->salesman->name}}</td>
                                    <td>{{$request->creator}}</td>
                                  

                                   
                                    <td>{{$request->created_at}}</td>

                                  <td>
                                    <div class="table-data-feature">
                                       
                                        {{-- <a href="{{route('student-request.edit',$request->id)}}" class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                            <i class="zmdi zmdi-edit"></i>
                                        </a> --}}
                                        <a href="{{route('student.show',$request->student_id)}}" class="item" data-toggle="tooltip" data-placement="top" title="Edit" target="_blank">
                                          <i class="zmdi zmdi-eye"></i>
                                      </a>
                                        <form action="{{route('student-request.destroy', $request->id)}}" method="POST">
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
                             @if($studentRequests->total() ==0) 
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
                {{$studentRequests->appends(request()->input())->links() }}

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
