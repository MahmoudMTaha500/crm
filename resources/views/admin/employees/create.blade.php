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
    <form action="{{route('employee.store')}}" method="post" novalidate="novalidate">
        @csrf
      @include('admin.includes.errors')


        <div class="row">
          <div class="col-6">
            <div class="form-group">
              <label for="" class="control-label mb-1"> Name:</label>
              <input  name="name" type="text" class="form-control"  value="" placeholder="type your place name">
              </div>
          </div>
          <div class="col-6">
            <div class="form-group">
              <label for="cc-payment" class="control-label mb-1">ٌRole  Type:</label>
            <select name="role" id="role_id" class="form-control">
              <option value=""> Chosse Type </option>
              <option value="admin"> admin  </option>
                  <option value="employee"> employee   </option>

            </select>
              </div>

          </div>

               </div>
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="" class="control-label mb-1"> phone:</label>
                    <input  name="phone" type="number" class="form-control"  value="" placeholder="type your place name">
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="cc-payment" class="control-label mb-1">Department:</label>
                    <select name="department"  class="form-control">
                        <option value=""> Chosse Type </option>
                        <option value="admission-university"> Admission  University </option>
                        <option value="admission-english-school"> Admission English School </option>
                        <option value="visa"> Visa </option>
                        <option value="finance"> Finance </option>
                        <option value="salesman"> Salesman </option>
                        <option value="marketer"> marketer </option>
                    </select>
                </div>

            </div>

        </div>

        <div class="row">
          <div class="col-6">
            <div class="form-group">
              <label for="cc-payment" class="control-label mb-1">Email:</label>
              <input  name="email" type="email" class="form-control"  value="" placeholder="type your place name">

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
                    <h5 for="">country </h5>
                    <label><input name="permission[]" type="checkbox" value="create-country" />create</label>
                </div>
                <div class="checkbox">
                    <label><input name="permission[]" type="checkbox" value="update-country" />update</label>
                </div>
                <div class="checkbox">
                    <label><input name="permission[]" type="checkbox" value="show-country" />show</label>
                </div>
                <div class="checkbox">
                    <label><input name="permission[]" type="checkbox" value="delete-country" />delete</label>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="checkbox">
                    <h5 for="">city </h5>
                    <label><input name="permission[]" type="checkbox" value="create-city" />create</label>
                </div>
                <div class="checkbox">
                    <label><input name="permission[]" type="checkbox" value="update-city" />update</label>
                </div>
                <div class="checkbox">
                    <label><input name="permission[]" type="checkbox" value="show-city" />show</label>
                </div>
                <div class="checkbox">
                    <label><input name="permission[]" type="checkbox" value="delete-city" />delete</label>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="checkbox">
                    <h5 for="">university request  </h5>
                    <label><input name="permission[]" type="checkbox" value="create-requestuniversity" />create</label>
                </div>
                <div class="checkbox">
                    <label><input name="permission[]" type="checkbox" value="update-requestuniversity" />update</label>
                </div>
                <div class="checkbox">
                    <label><input name="permission[]" type="checkbox" value="show-requestuniversity" />show</label>
                </div>
                <div class="checkbox">
                    <label><input name="permission[]" type="checkbox" value="delete-requestuniversity" />delete</label>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="checkbox">
                    <h5 for="">agency </h5>
                    <label><input name="permission[]" type="checkbox" value="create-agency" />create</label>
                </div>
                <div class="checkbox">
                    <label><input name="permission[]" type="checkbox" value="update-agency" />update</label>
                </div>
                <div class="checkbox">
                    <label><input name="permission[]" type="checkbox" value="show-agency" />show</label>
                </div>
                <div class="checkbox">
                    <label><input name="permission[]" type="checkbox" value="delete-agency" />delete</label>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="checkbox">
                    <h5 for="">english school request  </h5>
                    <label><input name="permission[]" type="checkbox" value="create-requestenglishschool" />create</label>
                </div>
                <div class="checkbox">
                    <label><input name="permission[]" type="checkbox" value="update-requestenglishschool" />update</label>
                </div>
                <div class="checkbox">
                    <label><input name="permission[]" type="checkbox" value="show-requestenglishschool" />show</label>
                </div>
                <div class="checkbox">
                    <label><input name="permission[]" type="checkbox" value="delete-requestenglishschool" />delete</label>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="checkbox">
                    <h5 for="">visa </h5>
                    <label><input name="permission[]" type="checkbox" value="create-visa" />create</label>
                </div>
                <div class="checkbox">
                    <label><input name="permission[]" type="checkbox" value="update-visa" />update</label>
                </div>
                <div class="checkbox">
                    <label><input name="permission[]" type="checkbox" value="show-visa" />show</label>
                </div>
                <div class="checkbox">
                    <label><input name="permission[]" type="checkbox" value="delete-visa" />delete</label>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="checkbox">
                    <h5 for="">finance </h5>
                    <label><input name="permission[]" type="checkbox" value="create-finance" />create</label>
                </div>
                <div class="checkbox">
                    <label><input name="permission[]" type="checkbox" value="update-finance" />update</label>
                </div>
                <div class="checkbox">
                    <label><input name="permission[]" type="checkbox" value="show-finance" />show</label>
                </div>
                <div class="checkbox">
                    <label><input name="permission[]" type="checkbox" value="delete-finance" />delete</label>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="checkbox">
                    <h5 for="">salesman </h5>
                    <label><input name="permission[]" type="checkbox" value="create-salesman" />create</label>
                </div>
                <div class="checkbox">
                    <label><input name="permission[]" type="checkbox" value="update-salesman" />update</label>
                </div>
                <div class="checkbox">
                    <label><input name="permission[]" type="checkbox" value="show-salesman" />show</label>
                </div>
                <div class="checkbox">
                    <label><input name="permission[]" type="checkbox" value="delete-salesman" />delete</label>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="checkbox">
                    <h5 for="">marketer  </h5>
                    <label><input name="permission[]" type="checkbox" value="create-marketer" />create</label>
                </div>
                <div class="checkbox">
                    <label><input name="permission[]" type="checkbox" value="update-marketer" />update</label>
                </div>
                <div class="checkbox">
                    <label><input name="permission[]" type="checkbox" value="show-marketer" />show</label>
                </div>
                <div class="checkbox">
                    <label><input name="permission[]" type="checkbox" value="delete-marketer" />delete</label>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="checkbox">
                    <h5 for="">report  </h5>
                    <label><input name="permission[]" type="checkbox" value="create-report" />create</label>
                </div>
                <div class="checkbox">
                    <label><input name="permission[]" type="checkbox" value="update-report" />update</label>
                </div>
                <div class="checkbox">
                    <label><input name="permission[]" type="checkbox" value="show-report" />show</label>
                </div>
                <div class="checkbox">
                    <label><input name="permission[]" type="checkbox" value="delete-report" />delete</label>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="checkbox">
                    <h5 for="">student  </h5>
                    <label><input name="permission[]" type="checkbox" value="create-student" />create</label>
                </div>
                <div class="checkbox">
                    <label><input name="permission[]" type="checkbox" value="update-student" />update</label>
                </div>
                <div class="checkbox">
                    <label><input name="permission[]" type="checkbox" value="show-student" />show</label>
                </div>
                <div class="checkbox">
                    <label><input name="permission[]" type="checkbox" value="delete-student" />delete</label>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="checkbox">
                    <h5 for="">employee  </h5>
                    <label><input name="permission[]" type="checkbox" value="create-employee" />create</label>
                </div>
                <div class="checkbox">
                    <label><input name="permission[]" type="checkbox" value="update-employee" />update</label>
                </div>
                <div class="checkbox">
                    <label><input name="permission[]" type="checkbox" value="show-employee" />show</label>
                </div>
                <div class="checkbox">
                    <label><input name="permission[]" type="checkbox" value="delete-employee" />delete</label>
                </div>
            </div>

            <div class="col-md-3 mb-3">
                <div class="checkbox">
                    <h5 for="">bank  </h5>
                    <label><input name="permission[]" type="checkbox" value="create-bank" />create</label>
                </div>
                <div class="checkbox">
                    <label><input name="permission[]" type="checkbox" value="update-bank" />update</label>
                </div>
                <div class="checkbox">
                    <label><input name="permission[]" type="checkbox" value="show-bank" />show</label>
                </div>
                <div class="checkbox">
                    <label><input name="permission[]" type="checkbox" value="delete-bank" />delete</label>
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

    $("#role_id").change(function(){
        if($(this).val() !== 'admin' && $(this).val() !== "" ){
            $('#permission').show()
        }else{
            $('#permission').hide()
        }
    });

</script>

@endsection

