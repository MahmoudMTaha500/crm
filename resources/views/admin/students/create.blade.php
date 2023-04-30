@extends('admin.app')
@section('admin.content')

    <div class="row">
    <div class="col-lg-12">
    <div class="card">
    <div class="card-header">Students Section </div>
    <div class="card-body">
    <div class="card-title">
    <h3 class="text-center title-2">Add New Student</h3>
    </div>
    <hr>
    <form action="{{route('student.store')}}" method="post" novalidate="novalidate" enctype="multipart/form-data">
        @csrf
      @include('admin.includes.errors')

       
       
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
              {{-- <input  name="nationality" type="text" class="form-control"  required  value="" placeholder="type your  Nationality"> --}}
         <select name="nationality"   class="form-control" required id="">
           <option value="">Chosse Nationality </option>
           <option value="saudi">Saudi </option>
           <option value="other">Other </option>
         </select>
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
                    <label for="cc-payment" class="control-label mb-1">Student Type :</label>
                    <select name="student_type"   class="form-control" required id="">
                      <option value="">Chosse Type </option>
                      <option value="sponsored">Sponsored </option>
                      <option value="self funded">Self Funded </option>
                      <option value="dependent">Dependent </option>
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
                          <label for="cc-payment" class="control-label mb-1">File :</label>
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
 
</script>

@endsection

