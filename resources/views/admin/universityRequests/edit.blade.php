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
      <form action="{{route('university-request.update',$universityRequests->id)}}" method="post" novalidate="novalidate" enctype="multipart/form-data">
        @include('admin.includes.errors')
  @method('put')
          @csrf

         <div class="row">
            <div class="col-12">
              <div class="form-group">
              <label for="" class="control-label mb-1"> Students :</label>
                <select  name="student" class="form-control selectpicker"  disabled  data-live-search="true" id="">
                @foreach($students as  $student)
                  <option   @if($student->id== $universityRequests->id)  selected @endif value="{{$student->id}}">{{$student->name}}</option>
                  @endforeach
                </select>

              </div>
            </div>
          </div>





        <div class="row">


            <div class="col-6">
                <div class="form-group">
                    <label class="typo__label">Universities</label>
                    <select  name="uni" class="form-control selectpicker"  data-live-search="true" id="uni_id">
                      @foreach($universities as  $uni)
                       <option   @if($uni->id== $universityRequests->university_id)  selected @endif value="{{$uni->id}}">{{$uni->name}}</option>
                       @endforeach
                      </select>
                </div>
            </div>


            <div class="col-6">
                <div class="form-group">
                    <label for="" class="control-label mb-1"> Agencies :</label>
                    <select  name="agency" class="form-control selectpicker"  data-live-search="true" id="agency_id">
                      @foreach($agencies as  $agency)
                       <option   @if($agency->id== $universityRequests->agency_id)  selected @endif value="{{$agency->id}}">{{$agency->name}}</option>
                       @endforeach
                      </select>

                </div>
            </div>
          </div>
            <div class="row">
            <div class="col-3">
                <div class="form-group">
                    <label for="" class="control-label mb-1"> Status :</label>
                    <select  name="status" id="status" class="form-control" >
                        <option value="" selected> Chose Status </option>
                        <option   @if($universityRequests->status== "Hold")  selected @endif value="Hold"> Hold </option>
                        <option  @if($universityRequests->status== "Applied")  selected @endif value="Applied"> Applied </option>
                        <option  @if($universityRequests->status== "Conditional offer")  selected @endif value="Conditional offer"> Conditional offer</option>
                        <option  @if($universityRequests->status== "Conditional offer deferred")  selected @endif value="Conditional offer deferred"> Conditional offer deferred </option>
                        <option  @if($universityRequests->status== "Unconditional offer")  selected @endif value="Unconditional offer"> Unconditional offer </option>
                        <option  @if($universityRequests->status== "Unconditional offer deferred")  selected @endif value="Unconditional offer deferred"> Unconditional offer deferred</option>
                        <option  @if($universityRequests->status== "Confirmed / CAS")  selected @endif value="Confirmed / CAS"> Confirmed / CAS</option>
                        <option  @if($universityRequests->status== "Rejected")  selected @endif value="Rejected"> Rejected</option>
                        <option  @if($universityRequests->status== "Withdrawn")  selected @endif value="Withdrawn"> Withdrawn</option>
                    </select>
                </div>
            </div>



            <div  class="col-3">
                <div class="form-group">
                    <label class="control-label mb-1" for="">Fees: </label>
                    <input type="text"  id="fees"  class="form-control" disabled  name="fees" placeholder="Type Fees"  value="{{$universityRequests->fees}}">
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    <label for="" class="control-label mb-1"> Kind Of Course :</label>
                    <select class="form-control" style="border: 1px #888 solid;" name="kind_of_course" id="course_id">
                        <option value="">Please Choose Place</option>
                        <option @if($universityRequests->kind_of_course== "Degree")  selected @endif value="Degree">Degree</option>
                        <option  @if($universityRequests->kind_of_course== "Pathway")  selected @endif value="Pathway">Pathway</option>
                        <option  @if($universityRequests->kind_of_course== "Pre-sessional")  selected @endif value="Pre-sessional">Pre-sessional</option>
                        <option  @if($universityRequests->kind_of_course== "Other")  selected @endif value="Other">Other</option>
                    </select>
                </div>
            </div>
            <div class="col-3">
                      <div class="form-group">
                    <label for="" class="control-label mb-1"> Start Date :</label>

                    <input class="form-control" type="date" name="start_date" id=""  placeholder="" value="{{$universityRequests->start_date}}">
                </div>

             </div>

          </div>

          <div class="row">
              <div class="col-6">
                  <div class="form-group">
                      <label for="" class="control-label mb-1">received Id From University  :</label>
                      <input type="text" class="form-control" disabled name="manual_id" id="manual_id" value="{{$universityRequests->manual_id}}">
                  </div>
              </div>
              <div class="col-6">
                  <div class="form-group">
                      <label for="" class="control-label mb-1">Note Courses :</label>
                      <textarea class="form-control" name="note_course" id="" cols="10" rows="2"> {{$universityRequests->text_note}}</textarea>
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
                                  <option  @if($salesman->id == $universityRequests->salesman_id) selected @endif value="{{$salesman->id}}">{{$salesman->name}}</option>

                                  @endforeach

                                  </select>

                                  </div>

                                </div>
                                <div class="col-4">
                                  <div class="form-group">
                                  <label for="cc-payment" class="control-label mb-1">Sub Agent :</label>
                                  <select class="form-control"name="markter" id="">

                                    <option value="">Please Choose  Markter</option>
                                    @foreach ($markters as $markter)
                                    <option  @if($universityRequests->markter_id== $markter->id)  selected @endif value="{{$markter->id}}">{{$markter->name}}</option>

                                    @endforeach

                                    </select>
                                  </div>

                                </div>
                                {{-- <div class="col-5"></div> --}}

                                <div class="col-1">
                                  <div class="form-group">
                                  <label for="" class="control-label mb-1"> To Visa:</label>
                                  <input  name="to_visa" type="checkbox"    class="form-control"  value="1" >
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

  var status = $("#status").val();
  //  alert(status);
if(status =='Confirmed / CAS'){
    $("#fees").removeAttr('disabled');
    $("#manual_id").removeAttr('disabled');

} else{
    $("#fees").attr('disabled');
    $("#manual_id").attr('disabled');

}
};

$("#status").change(function(){
   var status = $(this).val();
  //  alert(status);
if(status =='Confirmed / CAS'){
  $("#fees").removeAttr('disabled');
    $("#manual_id").removeAttr('disabled');

} else{
    $("#fees").attr('disabled','disabled');
    $("#manual_id").attr('disabled','disabled');

}
 });


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

