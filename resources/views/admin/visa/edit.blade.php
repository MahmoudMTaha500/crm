@extends('admin.app')
@section('admin.content')

    <div class="row">
    <div class="col-lg-12">
    <div class="card">
    <div class="card-header">Students Section </div>
    <div class="card-body">
    <div class="card-title">
    <h3 class="text-center title-2">Add New Student</h3>
    </div>
    <hr>
    <form action="{{route('visa.update',$visa->id)}}" method="post" novalidate="novalidate" enctype="multipart/form-data">
        @csrf
       @method('put')

      @include('admin.includes.errors')



      <div class="row">

          <div class="col-6">
            <div class="form-group">
            <label for="" class="control-label mb-1"> Students :</label>
              <select  name="student" class="form-control selectpicker"    data-live-search="true" id="">
              @foreach($students as  $student)
                <option   @if($student->id == $visa->student_id) selected @endif value="{{$student->id}}">{{$student->name}}</option>
                @endforeach
              </select>

            </div>
          </div>
          <div class="col-1">
              <div class="form-group">
                  <label for="paid" class="control-label mb-1"> Paid :</label>
                  <input type="checkbox" class="form-control" name="paid" id="paid" @if($visa->paid==1) checked @endif value="1">

              </div>
          </div>
      </div>

          <div class="row">
                <div class="col-6">
                    <label for="cc-payment" class="control-label mb-1">Countries:</label>
                    <select name="country_id" id="country_id"  class="form-control">
                    <option value=""> Chosse Country </option>

                    @foreach($countries as $country)
                    <option     @if($country->id == $visa->country_id) selected @endif value="{{$country->id}}">{{$country->name}}</option>
                    @endforeach
                    </select>
                </div>
                <div class="col-6">
                <div class="form-group">
                    <label for="cc-payment" class="control-label mb-1">Date :</label>
                    <input  name="date" type="date" class="form-control" required  value="{{$visa->date}}" >
                </div>
                </div>
          </div>
          <div class="row">
                <div class="col-6">
                    <label for="cc-payment" class="control-label mb-1">Visa Type:</label>
                    <select name="type" id=""  class="form-control">
                    <option value=""> Chosse Visa Type </option>

                    @foreach($types as $type)
                    <option    @if($type->id == $visa->type_id) selected @endif value="{{$type->id}}">{{$type->name}}</option>
                    @endforeach
                    </select>
                </div>
                <div class="col-6">
                <div class="form-group">
                    <label for="cc-payment" class="control-label mb-1">Fees :</label>
                    <input  name="fees" type="number" class="form-control" required  value="{{$visa->fees}}"  placeholder="Enter The Amount Of Fees">
                </div>
                </div>
          </div>
          <div class="row">
                <div class="col-6">
                  <label for="cc-payment" class="control-label mb-1">ٍSalesMen :</label>
                  <select class="form-control"name="salesman" id="">
                  <option value="">Please Choose  SalesMan</option>
                  @foreach ($salsmens as $salesman)
                  <option   @if($salesman->id == $visa->salesman_id) selected @endif  value="{{$salesman->id}}">{{$salesman->name}}</option>

                  @endforeach

                  </select>
                </div>
                <div class="col-6">
                <div class="form-group">
                    <label for="cc-payment" class="control-label mb-1">The Payment :</label>
                    <select class="form-control"name="payment" id="">
                      <option  value="">Please Choose  Payment</option>
                      <option  @if($visa->payment == "Sat Acc") selected @endif value="Sat Acc">Sat Acc</option>
                      <option  @if($visa->payment == "Client Acc") selected @endif value="Client Acc">Client Acc</option>
                      </select>
                    </div>
                </div>
          </div>
          <div class="row">
                <div class="col-6">
                  <label for="cc-payment" class="control-label mb-1">Banks :</label>
                  <select class="form-control"name="bank" id="">
                  <option value="">Please Choose  Banks</option>
                  @foreach ($banks as $bank)
                  <option  @if($bank->id == $visa->bank_id) selected @endif value="{{$bank->id}}">{{$bank->name}}</option>

                  @endforeach

                  </select>
                </div>
                <div class="col-6">
                <div class="form-group">
                    <label for="cc-payment" class="control-label mb-1"> Transfer from the student's bank :</label>
                    <select class="form-control"name="transfer_bank" id="">
                    <option value="">Please Choose  Banks</option>
                    @foreach ($banks as $bank)
                    <option   @if($bank->id == $visa->transfer_bank_id) selected @endif value="{{$bank->id}}">{{$bank->name}}</option>

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
                          <select class="form-control "  name="status" id="">
                            <option value="">Please Choose Place</option>
                            <option @if($visa->status == "New") selected @endif value="New">  New</option>
                            <option @if($visa->status == "Waiting for the documents") selected @endif value="Waiting for the documents">Waiting for the documents </option>
                            <option @if($visa->status == "Waiting for payment") selected @endif value="Waiting for payment"> Waiting for payment </option>
                            <option @if($visa->status == "Applied") selected @endif value="Applied"> Applied </option>
                            <option @if($visa->status == "Issued") selected @endif value="Issued"> Issued  </option>
                            <option @if($visa->status == "Rejected") selected @endif value="Rejected"> Rejected </option>


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









    <div>
    <button id="button" type="submit" class="btn btn-lg btn-info btn-block">
    Save
    </button>
    </div>
    </form>
    </div>
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

