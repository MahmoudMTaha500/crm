@extends('admin.app')
@section('admin.content')

    <div class="row">
    <div class="col-lg-12">
    <div class="card">
    <div class="card-header">VISA Section </div>
    <div class="card-body">
    <div class="card-title">
    <h3 class="text-center title-2">Add New Visa</h3>
    </div>
    <hr>
    <form action="{{route('visa.store')}}" method="post" novalidate="novalidate" enctype="multipart/form-data">
        @csrf
      @include('admin.includes.errors')



      <div class="row">

          <div class="col-6">
<student-component
    :students_route="{{json_encode(url('university-request/get-students') )}}"
>

</student-component>
          </div>
          <div class="col-1">
              <div class="form-group">
                  <label for="paid" class="control-label mb-1"> Paid :</label>
                  <input type="checkbox" class="form-control" name="paid" id="paid" value="1">

              </div>
          </div>
      </div>

          <div class="row">
                <div class="col-6">
                    <label for="cc-payment" class="control-label mb-1">Countries:</label>
                    <select name="country_id" id="country_id"  class="form-control" value="{{old('country_id')}}">
                    <option value=""> Chosse Country </option>

                    @foreach($countries as $country)
                    <option  value="{{$country->id}}">{{$country->name}}</option>
                    @endforeach
                    </select>
                </div>
                <div class="col-6">
                <div class="form-group">
                    <label for="cc-payment" class="control-label mb-1">Date :</label>
                    <input  name="date" type="date" class="form-control" required  value="{{old('date')}}" >
                </div>
                </div>
          </div>
          <div class="row">
                <div class="col-6">
                    <label for="cc-payment" class="control-label mb-1">Visa Type:</label>
                    <select name="type" id=" "  class="form-control" value="{{old('type')}}">
                    <option value=""> Chosse Visa Type </option>

                     @foreach($types as $type)
                    <option  value="{{$type->id}}">{{$type->name}}</option>
                    @endforeach
                    </select>
                </div>
                <div class="col-6">
                <div class="form-group">
                    <label for="cc-payment" class="control-label mb-1">Fees :</label>
                    <input  name="fees" id="fees" disabled type="number" class="form-control" required  value="{{old('fees')}}"  placeholder="Enter The Amount Of Fees">
                </div>
                </div>
          </div>
          <div class="row">
                <div class="col-6">
                  <label for="cc-payment" class="control-label mb-1">ٍSalesMen :</label>
                  <select class="form-control"name="salesman" id="" value="{{old('salesman')}}">
                  <option value="">Please Choose  SalesMan</option>
                  @foreach ($salsmens as $salesman)
                  <option value="{{$salesman->id}}">{{$salesman->name}}</option>

                  @endforeach

                  </select>
                </div>
                <div class="col-6">
                <div class="form-group">
                    <label for="cc-payment" class="control-label mb-1">The Payment :</label>
                    <select class="form-control" name="payment" id="" value="{{old('payment')}}">
                      <option value="">Please Choose  Payment</option>
                      <option value="Sat Acc">Sat Acc</option>
                      <option value="Client Acc">Client Acc</option>
                      </select>
                    </div>
                </div>
          </div>
          <div class="row">
                <div class="col-6">
                  <label for="cc-payment" class="control-label mb-1" >Sat Banks :</label>
                  <select class="form-control"name="bank" id="" value="{{old('bank')}}">
                  <option value="">Please Choose  Banks</option>
                  @foreach ($banks as $bank)
                  <option value="{{$bank->id}}">{{$bank->name}}</option>

                  @endforeach

                  </select>
                </div>
                <div class="col-6">
                <div class="form-group">
                    <label for="cc-payment" class="control-label mb-1"> Transfer from the student's bank :</label>
                    <select class="form-control"name="transfer_bank" id="" value="{{old('transfer_bank')}}">
                    <option value="">Please Choose  Banks</option>
                    @foreach ($banks as $bank)
                    <option value="{{$bank->id}}">{{$bank->name}}</option>

                    @endforeach

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
                      <div class="col-6">
                        <div class="form-group">
                          <label for="" class="control-label mb-1"> Status:</label>
                          <select class="form-control "  name="status" id="" value="{{old('status')}}">
                            <option value="">Please Choose Place</option>
                            <option value="New">  New</option>
                            <option value="Waiting for the documents">Waiting for the documents </option>
                            <option value="Waiting for payment"> Waiting for payment </option>
                            <option value="Applied"> Applied </option>
                            <option value="Issued"> Issued  </option>
                            <option value="Rejected"> Rejected </option>


                          </select>
                          </div>
                      </div>
                         <div class="col-6">
                             <div class="form-group">
                                 <label for="" class="control-label mb-1"> Filed By:</label>
                                 <select class="form-control "  name="filed_by" id="" value="{{old('filed_by')}}">
                                     <option value=""> None</option>
                                     @foreach($employees as $employee)
                                         <option value="{{$employee->id}}">  {{$employee->name}}</option>

                                     @endforeach



                                 </select>
                             </div>
                         </div>
                      <div class="col-12">
                        <div class="form-group">
                          <label for="" class="control-label mb-1"> Other:</label>
                               <textarea class="form-control" name="other" id="" cols="10" rows="3"> {{old('other')}}</textarea>
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
{{--$("#country_id").change(function(){--}}
{{--    var country_id =$(this).val();--}}

{{--    var  route = "{{url('/visaType/gettype') }}";--}}
{{--    $.ajax(route,   // request url--}}
{{--    {--}}
{{--      type: 'GET',  // http method--}}
{{--    data: { "country_id": country_id },--}}
{{--        success: function (data, status, xhr) {// success callback function--}}
{{--            $('#type_id').html(data.visaTypes_html);--}}
{{--            // $('#university_id').html(data.html_university);--}}
{{--            // $('#institute_id').html(data.html_institute);--}}
{{--    }--}}
{{--  });--}}

{{--  });--}}
checkFees();

$("#paid").click(function (){
      checkFees();
});

function checkFees(){
    if($("#paid").is(":checked")){
        $("#fees").removeAttr('disabled')
    } else{
        $("#fees").attr('disabled','disabled')
    }
}

</script>

@endsection

