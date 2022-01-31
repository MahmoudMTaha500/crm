@extends('admin.app')
@section('admin.content')

    <div class="row">
    <div class="col-lg-12">
    <div class="card">
    <div class="card-header">Employees Section </div>
    <div class="card-body">
    <div class="card-title">
    <h3 class="text-center title-2">Edit Employee</h3>
    </div>
    <hr>
    <form action="{{route('employee.update', $emp->id)}}" method="post" novalidate="novalidate">
      @csrf
      @method('put')
    @include('admin.includes.errors')
     
     <input type="hidden" name="id" id="" value="{{$emp->id}}">
      <div class="row">
        <div class="col-6">
          <div class="form-group">
            <label for="" class="control-label mb-1"> Name:</label>
            <input  name="name" type="text" class="form-control" placeholder="type your place name" value="{{$emp->name}}">
            </div>
        </div>
        <div class="col-6">
          <div class="form-group">
            <label for="cc-payment" class="control-label mb-1">ٌRole  Type:</label>
          <select name="role" id=""  disabled class="form-control">
            <option value=""> Chosse Type </option>
                <option @if($emp->roles[0]->name =='admission') selected @endif value="admission"> Admission </option>
                <option   @if($emp->roles[0]->name =='visa') selected @endif value="visa"> Visa </option>
                <option   @if($emp->roles[0]->name =='finance') selected @endif value="finance"> Finance </option>
          </select>
            </div> 

        </div>
     
             </div>

      <div class="row">
        <div class="col-6">
          <div class="form-group">
            <label for="cc-payment" class="control-label mb-1">Email:</label>
            <input  name="email" type="email" class="form-control" value="{{$emp->email}}"placeholder="type your place name">

            </div> 

        </div>
        <div class="col-6">
          <div class="form-group">
            <label for="cc-payment" class="control-label mb-1">Password:</label>
            <input  name="password" type="password" class="form-control"  value="" placeholder="type your place name">

            </div> 
        </div>
     
             </div>

          
      
          
         


  <div>
    <button id="button" type="submit" class="btn btn-lg btn-info btn-block">
    Edit
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

function getcities(){
  var country_id =$("#country_id").val();

// alert(country_id);
if(country_id){
  var  route = "{{url('/place/getcities') }}";
    $.ajax(route,   // request url
    {
      type: 'GET',  // http method
    data: { "country_id": country_id },
        success: function (data, status, xhr) {// success callback function
            $('#city_id').html(data);
    }
});

}
}
window.onlaod =  getcities();



  $("#country_id").change(function(){
    var country_id =$(this).val();
  // alert(country_id );
  if(country_id== ''){

  } else {
    getcities();
//     var  route = "{{url('/place/getcities') }}";
//     $.ajax(route,   // request url
//     {
//       type: 'GET',  // http method
//     data: { "country_id": country_id },
//         success: function (data, status, xhr) {// success callback function
//             $('#city_id').html(data);
//     }
// });
  }
  
  });
 
</script>

@endsection

