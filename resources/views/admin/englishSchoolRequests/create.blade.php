@extends('admin.app')
@section('admin.content')

    <div class="row">
    <div class="col-lg-12">
    <div class="card">
    <div class="card-header">Students Request Section </div>
    <div class="card-body">
    <div class="card-title">
    <h3 class="text-center title-2">Add New Student Request</h3>
    </div>
    <hr>
    <form action="{{route('english-school-request.store')}}" method="post" novalidate="novalidate" enctype="multipart/form-data">
      @include('admin.includes.errors')

        @csrf
       
        
                   

                   
 
            <english-school-request-component
            :universities="{{json_encode( $EnglishSchools )}}"
            :agencies="{{json_encode( $agencies )}}"
            :english_school_route="{{json_encode(url('english-school-request/get-english-school'))}}"
            :agency_route="{{json_encode(url('english-school-request/get-agency') )}}"
            :students_route="{{json_encode(url('university-request/get-students') )}}"
            :route_get_agency="{{json_encode(url('university-request/get-agency-uni') )}}"
            > </english-school-request-component>
            {{-- <example-component
           
            > </example-component> --}}



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
                                <option value="{{$salesman->id}}">{{$salesman->name}}</option>

                                @endforeach

                                </select>

                                </div> 

                              </div>
                              <div class="col-4">
                                <div class="form-group">
                                <label for="cc-payment" class="control-label mb-1">Markter :</label>
                                <select class="form-control"name="markter" id="">

                                <option value="">Please Choose  Markter</option>
                                @foreach ($markters as $markter)
                                <option value="{{$markter->id}}">{{$markter->name}}</option>

                                @endforeach

                                </select>

                                </div> 

                              </div>
                              {{-- <div class="col-5"></div> --}}

                          


                      </div>
                    



            
        
            
           


    <div>
    <button id="button" type="submit" class="btn btn-lg btn-info btn-block">
    Save
    </button>
    </div>
    </form>
    </div>

    </div>
    </div>

    </div>
@endsection
@section('admin.scripts')
  




<script>
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





// function personnelChange(ele, event) {
//    var val = $(ele).selectpicker('val');
//   //  alert(val);
// if(val){
//   $('#col_agency').css('display','');
// } if(val==''){
//   $('#col_agency').css('display','none');

// }
// }
// function  agency_change(ele , event){
//   var val = $(ele).val();
//   // alert(val);
//   if(val){
//   $('#col_course').css('display','');
// } if(val=='' || val==1){
//   $('#col_course').css('display','none');
//   $('#col_note_course').css('display','none');


// }
// }
// function  course_change(ele , event){
//   var val = $(ele).val();
//   // alert(val);
//   if(val){
//   $('#col_note_course').css('display','');
// } if(val=='' ){
//   $('#col_note_course').css('display','none');

// }
// }
</script>

@endsection

