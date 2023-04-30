@extends('admin.app')
@section('admin.content')

    <div class="row">
    <div class="col-lg-12">
    <div class="card">
    <div class="card-header">Universities Section </div>
    <div class="card-body">
    <div class="card-title">
    <h3 class="text-center title-2">Add New University</h3>
    </div>
    <hr>
    <form action="{{route('university.store')}}" method="post" novalidate="novalidate">
        @csrf
      @include('admin.includes.errors')
       
       
        <div class="row">
          <div class="col-6">
            <div class="form-group">
              <label for="" class="control-label mb-1">University Name:</label>
              <input  name="name" type="text" class="form-control"  value="" placeholder="type your University name">
              </div>
          </div>
          <div class="col-6">
            <div class="form-group">
              <label for="cc-payment" class="control-label mb-1">Agencies:</label>
            <select name="agency_id[]" id="" class="form-control selectpicker" multiple   data-live-search="true" >
              <option value=""> Chosse Agency </option>

              @foreach($Agencies as $agency)
              <option  value="{{$agency->id}}">{{$agency->name}}</option>               
            @endforeach
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

               {{-- <div class="row">
                <div class="col-6">
                  <div class="form-group">
                    <label for="" class="control-label mb-1">Status:</label>
                    <select name="status" id="" class="form-control">
                      <option value=""  selected> Chose Status  </option>
                      <option value="Hold"> Hold  </option>
                      <option value="Applied"> Applied </option>
                      <option value="Conditional offer"> Conditional offer</option>
                      <option value="Conditional offer deferred"> Conditional offer deferred </option>
                      <option value="Unconditional offer"> Unconditional offer </option>
                      <option value="Unconditional offer deferred"> Unconditional offer deferred</option>
                      <option value="Unconditional offer deferred"> Unconditional offer deferred</option>
                      <option value="Confirmed / CAS"> Confirmed / CAS</option>
                      <option value="started"> Started  </option>

                      <option value="Rejected"> Rejected</option>
                      <option value="Withdrawn"> Withdrawn</option>
                  
                    </select>
                    </div>
                </div>
                <div class="col-6">
                  <div class="form-group">
                    <label for="cc-payment" class="control-label mb-1">Note :</label>
                <textarea type="text" name="note" id="" class="form-control"   cols="10" rows="2" >
                </textarea>
                    </div> 
      
                </div>
             
                     </div> --}}

                     {{-- <div class="row">

                      <div class="col-6">
                        <div class="form-group">
                          <label for="cc-payment" class="control-label mb-1">Academic Year:</label>
                      <input type="text" name="academic_year" id="" class="form-control"  value="" placeholder="typing Academic Year">
                          </div> 
            
                      </div>
                     </div> --}}

            
        
            
           


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

