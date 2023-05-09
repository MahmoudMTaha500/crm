@extends('admin.app')
@section('admin.content')
<style>

    .modal-backdrop{
        z-index: -1;
    }
        </style>
                <!-- modal medium -->
                <div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="mediumModalLabel">Filter </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{route('place.index')}}" method="GET">
                             @csrf
                            <input type="hidden" name="filter" value="1">

                            <div class="modal-body">



                                <div class="row">
                                    <div class="col-12">
                                      <div class="form-group">
                                        <label for="" class="control-label mb-1"> Name:</label>
                                      <input   class="form-control" type="text" name="name" placeholder="Type Name Of user ">
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <input type="submit" value="Confirm"  class="btn btn-primary">
                                {{-- <button type="button"  class="btn btn-primary">Confirm</button> --}}
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
                <!-- end modal medium -->
                <div class="row">
                    <div class="col-1">
                        <button type="button" class="btn btn-secondary mb-1" data-toggle="modal" data-target="#mediumModal">
                            Filter
                        </button>
                    </div>

                </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive table--no-card m-b-30">
                        <table class="table table-borderless table-striped table-earning">
                            <thead>
                                <tr>
                                    <th>#ID</th>

                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>phone</th>
                                    <th>department</th>

                                    <th>Creator</th>
                                    <th class="text-right">Control</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($admins as $user)
                                {{-- {{dd($user)}} --}}
                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->roles[0]->name ?? '---'}}</td>
                                    <td>{{$user->phone ?? "---"}}</td>
                                    <td>{{$user->department ?? "---"}}</td>
                                    <td>{{$user->creator}}</td>


                                  <td>
                                    <div class="table-data-feature">

                                        <a href="{{route('employee.edit',$user->id)}}" class="item" data-toggle="tooltip" data-userment="top" title="Edit">
                                            <i class="zmdi zmdi-edit"></i>
                                        </a>
                                        <form action="{{route('employee.destroy', $user->id)}}" method="POST">
                                            @csrf
                                            @method('delete')


                                        <button href="" class="item" data-toggle="tooltip" data-userment="top" title="Delete"
                                        onclick="return confirm('Are u Sure For Delete This Employee')"
                                        >
                                            <i class="zmdi zmdi-delete"></i>
                                        </button>
                                    </form>


                                    </div>

                                    </td>
                                </tr>
                             @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                {{$admins->appends(request()->input())->links('pagination::bootstrap-4')}}

            </div>

@endsection

@section('admin.scripts')

<script>

  $("#country_id").change(function(){
    var country_id =$(this).val();
  // alert(country_id );
//   if(country_id== ''){

//   } else {
    var  route = "{{url('/place/getcities') }}";
    $.ajax(route,   // request url
    {
      type: 'GET',  // http method
    data: { "country_id": country_id },
        success: function (data, status, xhr) {// success callback function
            $('#city_id').html(data.html_city);
            $('#university_id').html(data.html_university);
            $('#institute_id').html(data.html_institute);
    }
});
//   }

  });

  $('#from_date').change(function(){
        // alert(1111);
        // alert();
        if($(this).val()){
            alert(11);
$('#to_date').removeAttr('disabled');
  }
  });

</script>

@endsection
