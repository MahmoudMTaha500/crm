@extends('admin.app')
@section('admin.content')

    <div class="row">
    <div class="col-lg-12">
    <div class="card">
    <div class="card-header">Students Section </div>
    <div class="card-body">
    <div class="card-title">
    <h3 class="text-center title-2">Edit  Student</h3>
    </div>
    <hr>
    <form action="{{route('visa.update',$visa->id)}}" method="post" novalidate="novalidate" enctype="multipart/form-data">
        @csrf
       @method('put')
       
        <div class="row">
          <div class="col-4">
            <div class="form-group">
              <label for="" class="control-label mb-1"> Name:</label>
              <input  name="name" type="text" class="form-control"  value="{{$visa->student->name}}" placeholder="type your  Name">
              </div>
          </div>
          <div class="col-4">
            <div class="form-group">
              <label for="cc-payment" class="control-label mb-1">Email:</label>
              <input  name="email" type="email" class="form-control"  value="{{$visa->student->email}}" placeholder="type your  Email">
            </div>
              </div> 
          <div class="col-4">
            <div class="form-group">
              <label for="cc-payment" class="control-label mb-1">Nationality:</label>
              <input  name="nationality" type="email" class="form-control"  value="{{$visa->student->nationality}}" placeholder="type your  nationality">
         
              </div> 

          </div>
        </div>
       
               
               <div class="row">
                <div class="col-6">
                  <div class="form-group">
                    <label for="" class="control-label mb-1"> Phone:</label>
                    <input  name="phone" type="text" class="form-control"  value="{{$visa->student->phone}}" placeholder="type your Phone">
                    </div>
                </div>
                <div class="col-6">
                  <div class="form-group">
                    <label for="cc-payment" class="control-label mb-1">Address :</label>
                    <input  name="address" type="text" class="form-control"  value="{{$visa->student->address}}" placeholder="type your Address">
                 
                    </div> 
      
                </div>
             
                     </div>

                     <div class="row" id="row_file">
                      

                      <div class="col-6">
                        <div class="form-group">
                          <label for="" class="control-label mb-1"> Name Of File:</label>
                          <input  name="name_of_file[]" type="text" class="form-control"    value="" placeholder="type your File">
                          </div>
                      </div>
                      <div class="col-5">
                        <div class="form-group">
                          <label for="cc-payment" class="control-label mb-1">File :</label>
                          <input  name="file[]" type="file" class="form-control"   value="">
                       
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
                            <label for="" class="control-label mb-1"> Status:</label>
                            <select class="form-control "  name="status" id="">
                            <option value="">Please Choose Place</option>
                            <option @if($visa->status==0) selected @endif value="0">  New</option>
                            <option @if($visa->status==1) selected @endif value="1"> Inprogress </option>
                            <option @if($visa->status==2) selected @endif value="2"> Done </option>
  
  
                            </select>
                            </div>
                            </div>
                                <div class="col-6">
                                <div class="form-group">
                                <label for="" class="control-label mb-1"> Other:</label>
                                <textarea class="form-control" name="other" id="" cols="10" rows="3">{{$visa->other}}</textarea>
                                </div>
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
<hr>
    <div class="card-body">
      <div class="card-title">
      <h3 class="text-center title-2"> Student Media</h3>
      </div>

      <div class="table-responsive table--no-card m-b-30">
<table class="table table-borderless table-striped table-earning">
  <thead>
    <tr>

    <th>Media</th>
    <th>Control</th>
  </tr>

  </thead>
  <tbody class="text-left">
  
      
      @if(!$student_media->isEmpty())
      @foreach($student_media as $media)
  <tr>

      <td >
      <a href="{{url($media->media_path)}}" target="_blank">

      
      {{ $media->media_name }}
       </a>
      </td>
      <td><a href="{{url('student/media/delete/'.$media->id)}} " onclick="return confirm('Are You Sure For Delete This  Media')"> <i class="fa fa-trash"></i></a></td>
      @endforeach
      @else 
      <td> Opps! there are no media Here. </td>
  </tr>
      
      @endif

  </tbody>
</table>
      </div>
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

