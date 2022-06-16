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
    <form action="{{route('student-request.store')}}" method="post" novalidate="novalidate" enctype="multipart/form-data">
      @include('admin.includes.errors')

        @csrf
       
        <div class="row">
          <div class="col-4">
            <div class="form-group">
              <label for="" class="control-label mb-1"> Name:</label>
              <input  name="name" type="text" class="form-control"  required value="" placeholder="type your  Name">
              </div>
          </div>
          <div class="col-4">
            <div class="form-group">
              <label for="cc-payment" class="control-label mb-1">Email:</label>
              <input  name="email" type="email" class="form-control"  required  value="" placeholder="type your  Email">
         
              </div> 

          </div>   
           <div class="col-4">
            <div class="form-group">
              <label for="cc-payment" class="control-label mb-1">Nationality:</label>
              <input  name="nationality" type="text" class="form-control"  required  value="" placeholder="type your  Nationality">
         
              </div> 

          </div>
       
               </div>
                    <div class="row">
                      <div class="col-6">
                      <div class="form-group">
                      <label for="" class="control-label mb-1"> Phone:</label>
                      <input  name="phone" type="text" class="form-control" required   value="" placeholder="type your Phone">
                      </div>
                      </div>
                      <div class="col-6">
                      <div class="form-group">
                      <label for="cc-payment" class="control-label mb-1">Address :</label>
                      <input  name="address" type="text" class="form-control" required  value="" placeholder="type your Address">

                      </div> 

                      </div>

                    </div>  

                    <div class="row">
                      <div class="col-6">
                        <div class="form-group">
                        <label for="" class="control-label mb-1"> Institutes Places:</label>
                          <select class="form-control selectpicker"  style="border: 1px #888 solid"   multiple data-live-search="true" name="study_place[]" id="">
                            <option value="">Please Choose Place</option>
                            @foreach ($institutes as $institute)
                            <option value="{{$institute->id}}">{{$institute->name}}</option>
                                
                            @endforeach
  
                          </select>
                        </div>  
                      </div>

                        <div class="col-6">
                          <div class="form-group">
                          <label for="" class="control-label mb-1"> Universities Places:</label>
                            <select class="form-control selectpicker"  style="border: 1px #888 solid" onchange="personnelChange(this, event)"  multiple data-live-search="true" name="study_place[]" id="university_id">
                              <option value="">Please Choose Place</option>
                              @foreach ($universities as $university)
                              <option value="{{$university->id}}">{{$university->name}}</option>
                                  
                              @endforeach
    
                            </select>
                          </div>
                      </div>
                    </div>
                    <div class="row"  > 
                      <div class="col-4" style='display:none' id='col_agency'>
                        <div class="form-group">
                        <label for="" class="control-label mb-1"> Agencies :</label>
                          <select class="form-control "  style="border: 1px #888 solid"  onchange="agency_change(this,event)"  name="agent" id="agent">
                            <option value="">Please Choose Place</option>
                            @foreach ($agencies as $agent)
                            <option value="{{$agent->id}}">{{$agent->name}}</option>
                                
                            @endforeach
  ّ
                          </select>
                        </div>  
                      </div>

                        <div class="col-4" style='display:none' id="col_course">
                          <div class="form-group">
                          <label for="" class="control-label mb-1"> Course  :</label>
                            <select class="form-control "  style="border: 1px #888 solid"  onchange="course_change(this,event)"  name="course" id="course_id">
                              <option value="">Please Choose Place</option>
                              <option value="Degree">Degree</option>
                              <option value="Pathway">Pathway</option>
                              <option value="Pre-sessional">Pre-sessional</option>
                              <option value="Other">Other</option>
                            
    
                            </select>
                          </div>
                      </div>
                        <div class="col-4" style='display:none' id="col_note_course">
                          <div class="form-group">
                          <label for="" class="control-label mb-1">Note Courses :</label>
                         <textarea class="form-control" name="note_course" id="" cols="10" rows="2">    </textarea>
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
                      <div class="col-1">
                        <div class="form-group">
                          <label for="" class="control-label mb-1"> To Visa:</label>
                          <input  name="to_visa" type="checkbox"    class="form-control"  value="1" >
                          </div>
                      </div>
                      <div class="col-5"></div>
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





function personnelChange(ele, event) {
   var val = $(ele).selectpicker('val');
  //  alert(val);
if(val){
  $('#col_agency').css('display','');
} if(val==''){
  $('#col_agency').css('display','none');

}
}
function  agency_change(ele , event){
  var val = $(ele).val();
  // alert(val);
  if(val){
  $('#col_course').css('display','');
} if(val=='' || val==1){
  $('#col_course').css('display','none');
  $('#col_note_course').css('display','none');


}
}
function  course_change(ele , event){
  var val = $(ele).val();
  // alert(val);
  if(val){
  $('#col_note_course').css('display','');
} if(val=='' ){
  $('#col_note_course').css('display','none');

}
}
</script>

@endsection

