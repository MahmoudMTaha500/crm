@extends('admin.app')
@section('admin.content')

    <div class="row">
    <div class="col-lg-12">
    <div class="card">
    <div class="card-header">Places Of Study Section </div>
    <div class="card-body">
    <div class="card-title">
    <h3 class="text-center title-2">Add New Place</h3>
    </div>
    <hr>
    <form action="{{route('place.store')}}" method="post" novalidate="novalidate">
        @csrf
      @include('admin.includes.errors')
       
       
        <div class="row">
          <div class="col-6">
            <div class="form-group">
              <label for="" class="control-label mb-1">Place Name:</label>
              <input  name="name" type="text" class="form-control"  value="" placeholder="type your place name">
              </div>
          </div>
          <div class="col-6">
            <div class="form-group">
              <label for="cc-payment" class="control-label mb-1">Place Type:</label>
            <select name="type_id" id="" class="form-control">
              <option value=""> Chosse Type </option>

                  <option value="1"> Institute </option>
                  <option value="2"> University </option>
            </select>
              </div> 

          </div>
       
               </div>

        <div class="row">
          <div class="col-6">
            <div class="form-group">
              <label for="cc-payment" class="control-label mb-1">Countries:</label>
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
              <label for="cc-payment" class="control-label mb-1">Cities:</label>
            <select name="city_id" id="city_id" class="form-control">
              <option value=""> Chosse City </option>

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

  $("#country_id").change(function(){
    var country_id =$(this).val();
  // alert(country_id );
  if(country_id== ''){

  } else {
    var  route = "{{url('/place/getcities') }}";
    $.ajax(route,   // request url
    {
      type: 'GET',  // http method
    data: { "country_id": country_id },
        success: function (data, status, xhr) {// success callback function
            $('#city_id').html(data.html_city);
    }
});
  }
  
  })
 
</script>

@endsection

