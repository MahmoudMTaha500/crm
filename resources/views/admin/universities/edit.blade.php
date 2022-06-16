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
    <form action="{{route('university.update',$university->id)}}" method="post" novalidate="novalidate">
        @csrf
        @method('put')
      @include('admin.includes.errors')
       
       
        <div class="row">
          <div class="col-6">
            <div class="form-group">
              <label for="" class="control-label mb-1">University Name:</label>
              <input  name="name" type="text" class="form-control"  value="{{$university->name}}" placeholder="type your University name">
              </div>
          </div>
          <div class="col-6">
            <div class="form-group">
              <label for="cc-payment" class="control-label mb-1">Agencies:</label>
            <select name="agency_id[]" id="" class="form-control  selectpicker"   multiple >
              <option value=""> Chosse Agency </option>

              @foreach($Agencies as $agency)
              <option     @foreach($uni_agency as $ag)  @if($ag->agency_id==$agency->id) selected @endif @endforeach value="{{$agency->id}}">{{$agency->name}}</option>               
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
                    <option  @if($university->country_id==$country->id) selected @endif value="{{$country->id}}">{{$country->name}}</option>               
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
                      @if($university->status == 'hold') selected @endif   value="Hold"> Hold  </option>
                      <option  @if($university->status == 'Applied') selected @endif  value="Applied"> Applied </option>
                      <option  @if($university->status == 'Conditional offer deferred') selected @endif value="Conditional offer"> Conditional offer</option>
                      <option @if($university->status == 'Conditional offer deferred') selected @endif value="Conditional offer deferred"> Conditional offer deferred </option>
                      <option  @if($university->status == 'Unconditional offer') selected @endif value="Unconditional offer"> Unconditional offer </option>
                      <option  @if($university->status == 'Unconditional offer deferred') selected @endif value="Unconditional offer deferred"> Unconditional offer deferred</option>
                      <option @if($university->status == 'Confirmed / CAS') selected @endif value="Confirmed / CAS"> Confirmed / CAS</option>
                      <option @if($university->status == 'Rejected') selected @endif  value="Rejected"> Rejected</option>
                      <option @if($university->status == 'Withdrawn') selected @endif  value="Withdrawn"> Withdrawn</option>
                  
                    </select>
                    </div>
                </div>
                <div class="col-6">
                  <div class="form-group">
                    <label for="cc-payment" class="control-label mb-1">Note :</label>
                <textarea type="text" name="note" id="" class="form-control"   cols="10" rows="2" >
                  {{$university->text_note}}
                </textarea>
                    </div> 
      
                </div>
             
                     </div> --}}

                     {{-- <div class="row">

                      <div class="col-6">
                        <div class="form-group">
                          <label for="cc-payment" class="control-label mb-1">Academic Year:</label>
                      <input type="text" name="academic_year" id="" class="form-control"  value="{{$university->academic_year}}" placeholder="typing Academic Year">
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

function getcities(){
  var country_id =$("#country_id").val();
var place_id = "{{ $university->id }}"; 
// alert(place_id);
if(country_id){
  var  route = "{{url('/place/getcities') }}";
    $.ajax(route,   // request url
    {
      type: 'GET',  // http method
    data: { "country_id": country_id,'place_id':place_id ,'type':'university'},
        success: function (data, status, xhr) {// success callback function
            $('#city_id').html(data.html_city);
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

  }
  
  });
 
</script>

@endsection

