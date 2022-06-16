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
                        <form action="{{route('english-school-request.index')}}" method="GET">
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
                                    <label for="" class="control-label mb-1"> English School:</label>
                                    <select class="form-control "      name="englishSchool" id="institute_id">
                                        <option value="">Please Choose Place</option>
                                        @foreach ($englishSchools as $englishSchool)
                                        <option value="{{$englishSchool->id}}">{{$englishSchool->name}}</option>
                                            
                                        @endforeach
              
                                      </select>
                                    </div>
                                </div>
                            
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
                                    <label for="" class="control-label mb-1">  Course :</label>
                                    <select class="form-control" style="border: 1px #888 solid;" name="course" id="course_id">
                                      <option value="">Please Choose Place</option>
                                      <option value="General Or intensive English Courses">General Or intensive English Courses</option>
                                      <option value="Cambridge English Exam Courses">Cambridge English Exam Courses</option>
                                      <option value="IELTS English Exam Courses">IELTS English Exam Courses</option>
                                      <option value="CELTA Introductory Course">CELTA Introductory Course</option>
                                      <option value="Foreign Teachers of English (FTE)">Foreign Teachers of English (FTE)</option>
                                      <option value="English for Special Purposes">English for Special Purposes</option>
                                      <option value="One-to-One course">One-to-One course</option>
                                      <option value="Business English Courses">Business English Courses</option>
                                      <option value="Occupational English Test (OET)">Occupational English Test (OET)</option>
                                      <option value="Conversation Classes">Conversation Classes</option>
                                      <option value="Family Vacation courses">Family Vacation courses</option>
                                      <option value="Junior English courses">Junior English courses</option>
                                      <option value="Academic year courses">Academic year courses</option>
                                      <option value="English + Communication Skills">English + Communication Skills</option>
                                      <option value="Experiences Club +40">Experiences Club +40</option>
                                      <option value="English & Culture +40">English & Culture +40</option>
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
                           
                                      <option value="Applied"> Applied </option>
                                      <option value="Offer">  Offer</option>
                                      <option value="Visa letter requested">  Visa letter requested </option>
                                      <option value="Rejected">  Rejected  </option>
                                      <option value="Deferred"> Deferred</option>
                                      <option value="Started"> Started</option>
                                      <option value="Cancelled"> Cancelled</option>
                                       
              
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
                  <form action="{{route('english-school-request.request-excel')}}" method="get">
                    @csrf
                    @method('get')
                    <div class="row">
                    <div class="col-1">
                       
										<button type="button" class="btn btn-secondary mb-1" data-toggle="modal" data-target="#mediumModal">
											Filter
										</button>
                     

                    </div>
                    <div class="col-2">
                        <a  href="{{route('english-school-request.excel')}}" class="btn btn-primary mb-2"> Excel Sheet All Requests</a>
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
                                    <th>English School</th>
                                    <th> Course</th>
                                    <th>Status</th>
                                    <th>Start Date </th>
                                    <th>End Date </th>
                                    <th>Residence </th>
                                    <th>Duration </th>
                                    <th>Note </th>
                                    <th>Sales Man</th>
                                    <th>Markter</th>

                                    

                                    <th>Creator</th>
                                    <th>Date</th>
                                    <th class="text-right">Control</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($EnglishSchoolRequests)
                                @foreach($EnglishSchoolRequests as $request)
                                <tr>
                                    <td> {{$request->id}}  <input type="checkbox" class="" name="requests_ids[]" value="{{$request->id}}"></td>
                                    <td>{{$request->student->name}}</td>
                                    <td>{{$request->student->phone}}</td>
                                    <td>{{$request->student->email}}</td>
                                    <td>{{$request->student->student_type}}</td>
                                    <td>{{$request->englishschool->country->name}}</td>
                                    <td>{{$request->englishschool->city->name}}</td>

                                    <td>{{$request->englishschool->name}}</td>
                                    <td>{{$request->course}}</td>
                                    <td>{{$request->status}}</td>
                                    <td>{{$request->start_date}}</td>
                                    <td>{{$request->end_date}}</td>
                                    <td>{{$request->residence}}</td>
                                    <td>{{$request->duration}}</td>
                                    <td>{{$request->text_note}}</td>
                                    <td>{{$request->salesman->name}}</td>
                                    <td>{{$request->markter->name ??  "---" }}</td>

                                    <td>{{$request->creator}}</td>
                                  

                                   
                                    <td>{{$request->created_at}}</td>

                                  <td>
                                    <div class="table-data-feature">
                                       
                                        <a href="{{route('english-school-request.edit',$request->id)}}" class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                            <i class="zmdi zmdi-edit"></i>
                                        </a>
                                        <a href="{{route('student.show',$request->student_id)}}" class="item" data-toggle="tooltip" data-placement="top" title="Edit" target="_blank">
                                          <i class="zmdi zmdi-eye"></i>
                                      </a>
                                        <form action="{{route('english-school-request.destroy', $request->id)}}" method="POST">
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
                             @if($EnglishSchoolRequests->total() ==0) 
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
                {{$EnglishSchoolRequests->appends(request()->input())->links() }}

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
