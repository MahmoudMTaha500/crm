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
    <form action="{{route('student-request.update',$studentRequest->id)}}" method="post" novalidate="novalidate" enctype="multipart/form-data">
      @method('put')
      @include('admin.includes.errors')

        @csrf
       
       
        <div class="row">
          <div class="col-6">
            <div class="form-group">
              <label for="" class="control-label mb-1"> Name:</label>
              <input  name="name" type="text" class="form-control"  required  placeholder="type your  Name" value="{{ $studentRequest->student->name}}">
              </div>
          </div>
          <div class="col-6">
            <div class="form-group">
              <label for="cc-payment" class="control-label mb-1">Email:</label>
              <input  name="email" type="email" class="form-control"  required   value="{{ $studentRequest->student->email}}" placeholder="type your  Email">
         
              </div> 

          </div>
       
               </div>
                    <div class="row">
                      <div class="col-6">
                      <div class="form-group">
                      <label for="" class="control-label mb-1"> Phone:</label>
                      <input  name="phone" type="text" class="form-control" required   value="{{ $studentRequest->student->phone}}" placeholder="type your Phone">
                      </div>
                      </div>
                      <div class="col-6">
                      <div class="form-group">
                      <label for="cc-payment" class="control-label mb-1">Address :</label>
                      <input  name="address" type="text" class="form-control" required  value="{{ $studentRequest->student->address}}" placeholder="type your Address">

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
                            <option value="{{$institute->id}}" @if($institute->id == $studentRequest->study_place_id) selected  class='selected'  @endif>{{$institute->name}}</option>
                                
                            @endforeach
  
                          </select>
                        </div>  
                      </div>

                        <div class="col-6">
                          <div class="form-group">
                          <label for="" class="control-label mb-1"> Universities Places:</label>
                            <select class="form-control selectpicker"  style="border: 1px #888 solid"   multiple data-live-search="true" name="study_place[]" id="">
                              <option value="">Please Choose Place</option>
                              @foreach ($universities as $university)
                              <option value="{{$university->id}}"  @if($university->id == $studentRequest->study_place_id) selected  class='selected' @endif>{{$university->name}}</option>
                                  
                              @endforeach
    
                            </select>
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
                      <div class="col-1">
                        <div class="form-group">
                          <label for="" class="control-label mb-1"> Status:</label>
                          <input  name="status" type="checkbox"    class="form-control"  value="1" >
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
</script>

@endsection

