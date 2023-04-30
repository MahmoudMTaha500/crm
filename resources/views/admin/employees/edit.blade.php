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
          <select name="role" id="role_id"   class="form-control">
            <option value=""> Chosse Type </option>
                <option @if($emp->roles[0]->name =='admission-university') selected @endif value="admission-university"> Admission University </option>
              <option  @if($emp->roles[0]->name =='admission-english-school') selected @endif value="admission-english-school"> Admission English School </option>

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
        <div class="row" id="permission" style="display: none;">
            <div class="col-md-3 mb-3">
                <div class="checkbox">
                    <h5 for="">permission</h5>
                    <label><input name="permission[]" type="checkbox"
                                  @if($emp->hasPermission('create')) checked  @endif
                                  value="create" />create</label>
                </div>
                <div class="checkbox">
                    <label><input name="permission[]" type="checkbox"
                                  @if($emp->hasPermission('update')) checked  @endif

                                  value="update" />update</label>
                </div>
                <div class="checkbox">
                    <label><input name="permission[]" type="checkbox"
                                  @if($emp->hasPermission('show')) checked  @endif

                                  value="show" />show</label>
                </div>
                <div class="checkbox">
                    <label><input name="permission[]" type="checkbox"
                                  @if($emp->hasPermission('delete')) checked  @endif

                                  value="delete" />delete</label>
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
        $("#role_id").change(function(){
        if($(this).val() != 'admin'){
        $('#permission').show()
    }else{
        $('#permission').hide()
    }
    });
        $(document).ready(function(){
            if($(this).val() != 'admin'){
                $('#permission').show()
            }else{
                $('#permission').hide()
            }
    });

</script>

@endsection

