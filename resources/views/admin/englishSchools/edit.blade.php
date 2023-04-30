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
    <form action="{{route('english-school.update',$englishSchool->id)}}" method="post" novalidate="novalidate">
        @csrf
        @method('put')


        <div class="row">
          <div class="col-6">
            <div class="form-group">
              <label for="" class="control-label mb-1">English School Name :</label>
              <input  name="name" type="text" class="form-control"  value="{{$englishSchool->name}}" placeholder="type your English School name">
              </div>
          </div>
          <div class="col-6">
            <div class="form-group">
              <label for="cc-payment" class="control-label mb-1">Duration:</label>
              <input type="text" name="duration" id="" class="form-control"  value="{{$englishSchool->duration}}" placeholder="typing  Duration">

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
                    <option   @if($englishSchool->country_id == $country->id) selected @endif  value="{{$country->id}}">{{$country->name}}</option>
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


               <div class="row">
                <div class="col-6">
                  <div class="form-group">
                    <label for="" class="control-label mb-1">Status:</label>
                    <select name="status" id="" class="form-control">
                      <option value=""  selected> Chose Status  </option>
                      <option  @if($englishSchool->status == 'hold') selected @endif   value="Hold"> Hold  </option>
                      <option  @if($englishSchool->status == 'Applied') selected @endif  value="Applied"> Applied </option>
                      <option @if($englishSchool->status == 'offer') selected @endif  value="offer">  offer</option>
                      <option @if($englishSchool->status == 'deferred') selected @endif  value="deferred">  deferred</option>

                      <option @if($englishSchool->status == 'Confirmed') selected @endif  value="Confirmed"> Confirmed</option>
                      <option @if($englishSchool->status == 'Rejected') selected @endif  value="Rejected"> Rejected</option>
                      <option @if($englishSchool->status == 'Withdrawn') selected @endif  value="Withdrawn"> Withdrawn</option>

                    </select>
                    </div>
                </div>
                <div class="col-6">
                  <div class="form-group">
                    <label for="cc-payment" class="control-label mb-1">Note :</label>
                <textarea name="note" id="" class="form-control"   cols="10" rows="2" >
                  {{$englishSchool->text_note}}
                </textarea>
                    </div>

                </div>

                     </div>

                     <div class="row">

                      <div class="col-6">
                        <div class="form-group">
                          <label for="cc-payment" class="control-label mb-1">Start Date :</label>
                      <input type="date" name="start_date" id="" class="form-control"  value="{{$englishSchool->start_date}}" >
                          </div>

                      </div>
                      <div class="col-6">
                        <div class="form-group">
                          <label for="cc-payment" class="control-label mb-1">End  Date :</label>
                      <input type="date" name="end_date" id="" class="form-control"  value="{{$englishSchool->end_date}}" >
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

function getcities(){
  var country_id =$("#country_id").val();
var place_id = "{{ $englishSchool->id }}";
// alert(place_id);
if(country_id){
  var  route = "{{url('/place/getcities') }}";
    $.ajax(route,   // request url
    {
      type: 'GET',  // http method
    data: { "country_id": country_id,'place_id':place_id ,'type':'school'},
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

