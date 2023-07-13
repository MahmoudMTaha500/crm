@extends('admin.app')
@section('admin.content')

    <div class="row">
    <div class="col-lg-12">
    <div class="card">
    <div class="card-header">Students Request Section </div>
    <div class="card-body">
    <div class="card-title">
    <h3 class="text-center title-2">Edit Student Request</h3>
    </div>
    <hr>
    {{-- <form action="{{route('student-request.update',$studentRequest->id)}}" method="post" novalidate="novalidate" enctype="multipart/form-data"> --}}
      <form action="{{route('english-school-request.update',$englishSchoolRequests->id)}}" method="post" novalidate="novalidate" enctype="multipart/form-data">
        @include('admin.includes.errors')
  @method('put')
          @csrf

         <div class="row">
            <div class="col-12">
              <div class="form-group">
              <label for="" class="control-label mb-1"> Students :</label>
                <select  name="student" class="form-control selectpicker"  disabled  data-live-search="true" id="">
                @foreach($students as  $student)
                  <option   @if($student->id== $englishSchoolRequests->id)  selected @endif value="{{$student->id}}">{{$student->name}}</option>
                  @endforeach
                </select>

              </div>
            </div>
          </div>





        <div class="row">


            <div class="col-6">
                <div class="form-group">
                    <label class="typo__label">Universities</label>
                    <select  name="englishschool" class="form-control selectpicker"  data-live-search="true" id="uni_id">
                      @foreach($EnglishSchools as  $english_school)
                       <option   @if($english_school->id== $englishSchoolRequests->englishSchool_id)  selected @endif value="{{$english_school->id}}">{{$english_school->name}}</option>
                       @endforeach
                      </select>
                </div>
            </div>
            <div class="col-6">
              <div class="form-group">
                  <label for="" class="control-label mb-1"> Status :</label>
                  <select  name="status" id="status" class="form-control"  >
                      <option  value="" selected> Chose Status </option>
                      <option @if($englishSchoolRequests->status== "Applied")  selected @endif  value="Applied"> Applied </option>
                      <option @if($englishSchoolRequests->status== "Offer")  selected @endif value="Offer">  Offer</option>
                      <option @if($englishSchoolRequests->status== "Visa letter requested")  selected @endif value="Visa letter requested">  Visa letter requested </option>
                      <option @if($englishSchoolRequests->status== "Rejected")  selected @endif value="Rejected">  Rejected  </option>
                      <option @if($englishSchoolRequests->status== "Deferred")  selected @endif value="Deferred"> Deferred</option>
                      <option @if($englishSchoolRequests->status== "Started")  selected @endif value="Started"> Started</option>
                      <option @if($englishSchoolRequests->status== "Cancelled")  selected @endif value="Cancelled"> Cancelled</option>

                  </select>
              </div>
          </div>


          </div>
            <div class="row">




                <div  class="col-4">
                    <div class="form-group">
                        <label class="control-label mb-1" for="">Fees: </label>
                        <input  type="text" id="fees"  disabled class="form-control"   name="fees" value="{{$englishSchoolRequests->fees}}"  >
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="" class="control-label mb-1"> Course :</label>
                        <select class="form-control" style="border: 1px #888 solid;" name="course" id="course_id">
                            <option value="">Please Choose Place</option>
                            <option @if($englishSchoolRequests->course== "General Or intensive English Courses")  selected @endif  value="General Or intensive English Courses">General Or intensive English Courses</option>
                            <option @if($englishSchoolRequests->course== "Cambridge English Exam Courses")  selected @endif value="Cambridge English Exam Courses">Cambridge English Exam Courses</option>
                            <option @if($englishSchoolRequests->course== "IELTS English Exam Courses")  selected @endif value="IELTS English Exam Courses">IELTS English Exam Courses</option>
                            <option @if($englishSchoolRequests->course== "CELTA Introductory Course")  selected @endif value="CELTA Introductory Course">CELTA Introductory Course</option>
                            <option @if($englishSchoolRequests->course== "Foreign Teachers of English (FTE)")  selected @endif value="Foreign Teachers of English (FTE)">Foreign Teachers of English (FTE)</option>
                            <option @if($englishSchoolRequests->course== "English for Special Purposes")  selected @endif value="English for Special Purposes">English for Special Purposes</option>
                            <option @if($englishSchoolRequests->course== "One-to-One course")  selected @endif value="One-to-One course">One-to-One course</option>
                            <option @if($englishSchoolRequests->course== "Business English Courses")  selected @endif value="Business English Courses">Business English Courses</option>
                            <option @if($englishSchoolRequests->course== "Occupational English Test (OET)")  selected @endif value="Occupational English Test (OET)">Occupational English Test (OET)</option>
                            <option @if($englishSchoolRequests->course== "Conversation Classes")  selected @endif value="Conversation Classes">Conversation Classes</option>
                            <option @if($englishSchoolRequests->course== "Family Vacation courses")  selected @endif value="Family Vacation courses">Family Vacation courses</option>
                            <option @if($englishSchoolRequests->course== "Junior English courses")  selected @endif value="Junior English courses">Junior English courses</option>
                            <option @if($englishSchoolRequests->course== "Academic year courses")  selected @endif value="Academic year courses">Academic year courses</option>
                            <option @if($englishSchoolRequests->course== "English + Communication Skills")  selected @endif value="English + Communication Skills">English + Communication Skills</option>
                            <option @if($englishSchoolRequests->course== "Experiences Club +40")  selected @endif value="Experiences Club +40">Experiences Club +40</option>
                            <option @if($englishSchoolRequests->course== "English & Culture +40")  selected @endif value="English & Culture +40">English & Culture +40</option>
                        </select>
                    </div>
                </div>

                <div class="col-3">
                    <div class="form-group">
                        <label for="" class="control-label mb-1">Note Courses :</label>
                        <textarea class="form-control" name="note_course" id="" cols="10" rows="2"> {{$englishSchoolRequests->text_note}}</textarea>
                    </div>
                </div>


            </div>
          <div class="row">
              <div class="col-3">
                  <div class="form-group">
                      <label for="" class="control-label mb-1"> Start Date :</label>

                      <input class="form-control" type="date" name="start_date" id=""  value="{{$englishSchoolRequests->start_date}}">
                  </div>

              </div>
              <div class="col-3">
                  <div class="form-group">
                      <label for="" class="control-label mb-1"> End Date :</label>

                      <input class="form-control" type="date" name="end_date" id=""  value="{{$englishSchoolRequests->end_date}}">
                  </div>

              </div>
              <div class="col-2">
                  <div class="form-group">
                      <label for="" class="control-label mb-1"> Duration :</label>

                      <input class="form-control" type="text" name="duration" id=""  placeholder="Type the  duration" value="{{$englishSchoolRequests->duration}}">
                  </div>

              </div>
              <div class="col-3">
                  <div class="form-group">
                      <label for="" class="control-label mb-1"> Residence :</label>
                      <select class="form-control" style="border: 1px #888 solid;" name="Residence" id="Residence_id">
                          <option value="">Please Choose Place</option>
                          <option  @if($englishSchoolRequests->residence== "Not Required")  selected @endif value="Not Required">Not Required</option>
                          <option  @if($englishSchoolRequests->residence== "Host Family")  selected @endif value="Host Family">Host Family</option>
                          <option  @if($englishSchoolRequests->residence== "Student Resident")  selected @endif value="Student Resident">Student Resident</option>
                      </select>
                  </div>
              </div>
              <div class="col-1">
                  <div class="form-group">
                      <label for="" class="control-label mb-1"> To Visa:</label>
                      <input  name="to_visa" type="checkbox"   @if($englishSchoolRequests->visa== "1")  checked @endif   class="form -control"  value="1" >
                  </div>
              </div>
          </div>




                       <div class="row" id="row_file">
                        <div class="col-6">
                          <div class="form-group">
                            <label for="" class="control-label mb-1"> Name Of File:</label>
                            <input  name="name_of_file[]" type="text" class="form-control" required   value="" placeholder="type your File">
                            </div>
                        </div>
                        <div class="col-5">
                          <div class="form-group">
                            <label for="cc-payment" class="control-label mb-1">File:</label>
                            <input  name="file[]" type="file" class="form-control" required  value="">

                            </div>
                          </div>

                            <div class="col-1">
                              <div class="form-group">
                                <button type="button" id="add_ele" class="   btn btn-primary" style="margin-top: 30px;"><i class="fa fa-plus"></i></button>
                                </div>

                                </div>

                            </div>




                            <div class="row">


                                <div class="col-6">
                                  <div class="form-group">
                                  <label for="cc-payment" class="control-label mb-1">ٍSalesMen :</label>
                                  <select class="form-control"name="salesman" id="">
                                  <option value="">Please Choose  SalesMan</option>
                                  @foreach ($salsmens as $salesman)
                                  <option  @if($salesman->id == $englishSchoolRequests->salesman_id) selected @endif value="{{$salesman->id}}">{{$salesman->name}}</option>

                                  @endforeach

                                  </select>

                                  </div>

                                </div>
                                <div class="col-6">
                                  <div class="form-group">
                                  <label for="cc-payment" class="control-label mb-1">Sub Agent :</label>
                                  <select class="form-control"name="markter" id="">

                                    <option value="">Please Choose  Markter</option>
                                    @foreach ($markters as $markter)
                                    <option  @if($englishSchoolRequests->markter_id== $markter->id)  selected @endif value="{{$markter->id}}">{{$markter->name}}</option>

                                    @endforeach

                                    </select>
                                  </div>

                                </div>

                            </div>



      <button id="button" type="submit" class="btn btn-lg btn-info btn-block">
      Save
      </button>
      </div>
      </form>
      <table class="table table-striped table-bordered">
        <tbody class="text-left">
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
    <tbody class="text-left">
    </table>
    </div>


    </div>
    </div>

    </div>
@endsection
@section('admin.scripts')





<script>
window.onload = function() {
    fees();

};

$("#status").change(function(){
    fees();


 });

function fees(){
    var status = $("#status").val();
    if(status =='Started'){
        $("#fees").removeAttr('disabled');
    } else{
        $("#fees").attr('disabled','disabled');

    }
}
function Elements(){


}
 $('#add_ele').click(function(){
  var html = ' <div class="row remve_ele"> <div class="col-6"><div class="form-group"> <label for="" class="control-label mb-1"> Name Of File:</label> <input  name="name_of_file[]" type="text" class="form-control" required   value="" placeholder="type your File">  </div>';
    html += '</div><div class="col-5"> <div class="form-group"><label for="cc-payment" class="control-label mb-1">File :</label><input  name="file[]" type="file" class="form-control" required  value=""></div></div> <div class="col-1">';
    html += ' <div class="form-group">  <button type="button" class=" remove_ele btn btn-primary " style="margin-top: 30px;"><i class="fa fa-trash"></i></button>   </div></div></div>';
      // alert(11)
       $('#row_file').after(html);

 });
 $(document).on('click' , ".remove_ele",function(){
    $(this).parent().parent().parent().remove();
 });


 $('.selectpicker').selectpicker();

 $("#uni_id").change(function(){

 });

 function getagencies(){

  var uni_id =$('#uni_id').val();

  var  route = "{{url('university-request/get-agency-uni') }}";
    $.ajax(route,   // request url
    {
      type: 'GET',  // http method
    data: { "uni_id": uni_id },
        success: function (data, status, xhr) {// success callback function
            $('#city_id').html(data.html_city);
    }
});
 }


</script>

@endsection

