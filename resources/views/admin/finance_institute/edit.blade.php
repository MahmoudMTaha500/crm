@extends('admin.app')
@section('admin.content')

    <div class="row">
    <div class="col-lg-12">
    <div class="card">
    <div class="card-header">English School Finance  Section </div>
    <div class="card-body">
    <div class="card-title">
    <h3 class="text-center title-2">Edit  English School Finance </h3>
    </div>
    <hr>
    <form action="{{route('finance-english-school.update',$englishSchoolFinance->id)}}" method="post" novalidate="novalidate" enctype="multipart/form-data">
        @csrf
       @method('put')

      @include('admin.includes.errors')

       
       
      <div class="row">
       
          <div class="col-12">
            <div class="form-group">
            <label for="" class="control-label mb-1"> Students :</label>
              <select  name="student" class="form-control selectpicker"    data-live-search="true" id="">
              @foreach($students as  $student)
                <option   @if($student->id == $englishSchoolFinance->request_institute->student_id) selected @endif value="{{$student->id}}">{{$student->name}}</option>
                @endforeach
              </select>

            </div>  
          </div>
      </div>
      

      <div style="border: #4272d7 2px solid; padding:5px;">
        <h2 style="text-align: center; margin:15px 0; color:#007bff">English School Requests Details   </h2>

                       
                   
        <div class="row">
@php
$englishSchoolRequests = $englishSchoolFinance->request_institute;

@endphp
        
          <div class="col-6">
              <div class="form-group">
                  <label class="typo__label">English Schools</label>
                  <select  name="englishschool" class="form-control selectpicker"  disabled data-live-search="true" id="uni_id">
                    @foreach($EnglishSchools as  $english_school)
                     <option   @if($english_school->id== $englishSchoolRequests->englishSchool_id)  selected @endif value="{{$english_school->id}}">{{$english_school->name}}</option>
                     @endforeach
                    </select>
              </div>
          </div>
          <div class="col-6">
            <div class="form-group">
                <label for="" class="control-label mb-1"> Status :</label>
                <select  name="status" id="status"  disabled class="form-control" >
                    <option value="" selected> Chose Status </option>
                    <option   @if($englishSchoolRequests->status== "Hold")  selected @endif value="Hold"> Hold </option>
                    <option  @if($englishSchoolRequests->status== "Applied")  selected @endif value="Applied"> Applied </option>
                    <option  @if($englishSchoolRequests->status== "Conditional offer")  selected @endif value="Conditional offer"> Conditional offer</option>
                    <option  @if($englishSchoolRequests->status== "Conditional offer deferred")  selected @endif value="Conditional offer deferred"> Conditional offer deferred </option>
                    <option  @if($englishSchoolRequests->status== "Unconditional offer")  selected @endif value="Unconditional offer"> Unconditional offer </option>
                    <option  @if($englishSchoolRequests->status== "Unconditional offer deferred")  selected @endif value="Unconditional offer deferred"> Unconditional offer deferred</option>
                    <option  @if($englishSchoolRequests->status== "Confirmed / CAS")  selected @endif value="Confirmed / CAS"> Confirmed / CAS</option>
                    <option  @if($englishSchoolRequests->status== "Rejected")  selected @endif value="Rejected"> Rejected</option>
                    <option  @if($englishSchoolRequests->status== "Withdrawn")  selected @endif value="Withdrawn"> Withdrawn</option>
                </select>
            </div>
        </div>

       
        </div>
          <div class="row">
          
          
            
         
          <div  class="col-4">
              <div class="form-group">
                  <label class="control-label mb-1" for="">Fees: </label>
                  <input type="text"  id="fees"  class="form-control" disabled  name="fees" placeholder="Type Fees"  value="{{$englishSchoolRequests->fees}}">
              </div>
          </div>
          <div class="col-4">
              <div class="form-group">
                  <label for="" class="control-label mb-1"> Kind Of Course :</label>
                  <select class="form-control" style="border: 1px #888 solid;" disabled  name="course" id="course_id">
                      <option value="">Please Choose Place</option>
                      <option @if($englishSchoolRequests->course== "Degree")  selected @endif value="Degree">Degree</option>
                      <option  @if($englishSchoolRequests->course== "Pathway")  selected @endif value="Pathway">Pathway</option>
                      <option  @if($englishSchoolRequests->course== "Pre-sessional")  selected @endif value="Pre-sessional">Pre-sessional</option>
                      <option  @if($englishSchoolRequests->course== "Other")  selected @endif value="Other">Other</option>
                  </select>
              </div>
          </div>
        
          <div class="col-2">
              <div class="form-group">
                  <label for="" class="control-label mb-1">Note Courses :</label>
                  <textarea class="form-control" name="note_course" id="" cols="10" disabled rows="2"> {{$englishSchoolRequests->text_note}}</textarea>
              </div>
          </div>
          <div class="col-6">
            <div class="form-group">
          <label for="" class="control-label mb-1"> Start Date :</label>
       
          <input class="form-control" type="date" name="start_date" id=""  disabled placeholder="" value="{{$englishSchoolRequests->start_date}}"> 
      </div>

   </div>
   <div class="col-3">
    <div class="form-group">
  <label for="" class="control-label mb-1"> End Date :</label>

  <input class="form-control" type="date" name="end_date" id=""  disabled  placeholder="" value="{{$englishSchoolRequests->end_date}}"> 
</div>

</div>
<div class="col-3">
<div class="form-group">
<label for="" class="control-label mb-1"> Duration :</label>

<input class="form-control" type="text" name="duration" id=""  disabled placeholder="" value="{{$englishSchoolRequests->duration}}"> 
</div>

</div>
        </div>
          
      </div>

          <div class="row">
            
                <div class="col-4">
                <div class="form-group">
                    <label for="cc-payment" class="control-label mb-1">Paied :</label>
                    <input  name="paied" type="number" class="form-control" onchange="calc_remain()"  id='paied' value="{{$englishSchoolFinance->pay}}" >
                </div> 
                </div>
                <div class="col-4">
                <div class="form-group">
                    <label for="cc-payment" class="control-label mb-1">Remain  :</label>
                    <input  name="remain" type="number" class="form-control" readonly  id='remain' value="{{$englishSchoolFinance->remain}}" >
                </div> 
                </div>
            
                <div class="col-4">
                <div class="form-group">
                    <label for="cc-payment" class="control-label mb-1">Total :</label>
                    <input  name="total" type="number" id="total" class="form-control" required  value="{{$englishSchoolFinance->total}}" >
                </div> 
                </div>
            
          </div>  
    <div class="row">

      <div class="col-3">
        <div class="form-group">
          <label for="" class="control-label mb-1"> Commission percentage :</label>
          <input  name="commission_percentage"  id='commission_percentage' type="number" class="form-control" required value="{{$englishSchoolFinance->commission_percentage}}" >

          </div>
      </div>
      <div class="col-3">
        <div class="form-group">
          <label for="cc-payment" class="control-label mb-1">Commission Total :</label>
          <input  name="commission_total" type="number" id='amount' readonly class="form-control" required  value="{{$englishSchoolFinance->commission_total}}"  >
       
          </div> 
    </div>
      <div class="col-3">
        <div class="form-group">
          <label for="cc-payment" class="control-label mb-1">Commission received :</label>
          <input  name="commission_received" type="number" id='received' readonly class="form-control" required  value="{{$englishSchoolFinance->commission_received}}"  >
       
          </div> 
    </div>
      <div class="col-3">
        <div class="form-group">
          <label for="cc-payment" class="control-label mb-1">Commission Remain  :</label>
          <input  name="commission_remain" type="number" id='remain_comm' readonly class="form-control" required   value="{{$englishSchoolFinance->commission_remain}}" >
       
          </div> 
    </div>
    </div>


          <div class="row" id="row_file">
            <div class="col-3">
              <div class="form-group">
                <label for="" class="control-label mb-1"> Commission :</label>
                <input  name="commission[]" type="number" class="form-control comm" required   placeholder="type the new commission ">

                </div>
            </div>
            <div class="col-4">
              <div class="form-group">
                <label for="" class="control-label mb-1"> study period  :</label>
                <input  name=" studyperiod[]" type="text" class="form-control comm" required   placeholder="type the study period">

                </div>
            </div>
            <div class="col-4">
              <div class="form-group">
                <label for="cc-payment" class="control-label mb-1">Commission Date :</label>
                <input  name="commission_date[]" type="date" class="form-control" required   >
             
                </div> 
              </div>

                <div class="col-1">
                  <div class="form-group">
                    <button type="button" id="add_ele" class="   btn btn-primary" style="margin-top: 30px;"><i class="fa fa-plus"></i></button>                         
                    </div> 
   
                    </div>
         
                </div>
              @if(!$commissions->isEmpty())
              <div style="border: 1px #4272d7 solid; padding:2px 5px;">

              
              @foreach($commissions as $comm)
             <div class="row remve_ele" >
                   <div class="col-3">
                    <div class="form-group"> 
                      <label for="" class="control-label mb-1"> Commission :</label>
                       <input  name="commission[]" type="number" class="form-control comm" required    placeholder="type your Commission" value="{{$comm->commission}}"> 
                       </div>
               </div>
               <div class="col-4">
                <div class="form-group">
                  <label for="" class="control-label mb-1"> study period  :</label>
                  <input  name=" studyperiod[]" type="text" class="form-control comm" required  value="{{$comm->study_period}}"  placeholder="type the study period">
  
                  </div>
              </div>
                <div class="col-4"> 
                  <div class="form-group">
                    <label for="cc-payment" class="control-label mb-1">Commission Date  :</label>
                    <input  name="commission_date[]" type="date" class="form-control" required  value="{{$comm->commission_date}}">
                  </div>
                </div> 
                <div class="col-1">
   
                <div class="form-group"> 
                   <button type="button" class=" remove_ele btn btn-primary " style="margin-top: 30px;"><i class="fa fa-trash"></i></button> 
                    </div>
                  </div>
                </div>
                @endforeach
              </div>
              @endif

          <div class="row">
        

                <div class="col-4">
                <div class="form-group">
                    <label for="cc-payment" class="control-label mb-1">Student Period  :</label>
                    <input  name="student_period" type="text" class="form-control" required  value="{{$englishSchoolFinance->student_period}}" >
                </div> 
                </div>

                <div class="col-4">
                <div class="form-group">
                    <label for="cc-payment" class="control-label mb-1">English School Note  :</label>
                    <input  name="english_school_note" type="text" class="form-control" required  value="{{$englishSchoolFinance->english_school_note}}" >
                </div> 
                </div>
                <div class="col-4">
                  <div class="form-group">
                      <label for="cc-payment" class="control-label mb-1">Sat Note  :</label>
                      <input  name="sat_note" type="text" class="form-control" required  value="{{$englishSchoolFinance->sat_note}}" >
                  </div> 
                  </div>
              
          </div>  
          <div class="row">

            
          
            <div class="col-6">
              <div class="form-group">
                  <label for="cc-payment" class="control-label mb-1">Status Paied :</label>
                  <select class="form-control"name="status_paied" id="">
                    <option  value="">Please Choose  Status</option>
                    <option  @if($englishSchoolFinance->status_paied == "Not paid yet") selected @endif value=" Not paid yet"> Not paid yet</option>
                    <option  @if($englishSchoolFinance->status_paied == "Partially Paid") selected @endif value="Partially Paid">Partially Paid</option>
                    <option  @if($englishSchoolFinance->status_paied == "All commission paid") selected @endif value="All commission paid">All commission paid</option>
                    </select>
              </div> 
              </div>

            <div class="col-6">
              <div class="form-group">
                  <label for="cc-payment" class="control-label mb-1">Status Followed  :</label>
                  <select class="form-control"name="status_followed" id="">
                    <option  value="">Please Choose  Status</option>
                    <option  @if($englishSchoolFinance->status_followed == "Not yet followed") selected @endif value=" Not yet followed"> Not yet followed</option>
                    <option  @if($englishSchoolFinance->status_followed == "Following and Pending response") selected @endif value="Following and Pending response">Following and Pending response</option>
                    <option  @if($englishSchoolFinance->status_followed == "Followed") selected @endif value="Followed">Followed</option>
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

  function calc_remain(){
    var total =$('#total').val()*1;
  var paied = $("#paied").val()*1;
  // alert(typeof paied);
  // alert(typeof total);

  if ( total*1 >= paied*1    ){
  // alert(total);

    var remain = total - paied;
$("#remain").val(remain);
  }
  if(paied > total ){
alert('the amounet  of paied can not bigger than  '+ total);
$("#paied").val(total);

  }
}

// $("#paied").change(function(){
//   var total =$('#total').val();
//   var paied = $(this).val();
//   if(paied >= total){
//     var remain = total -paied;
// $("#remain").val(remain);
//   }
//   else   if(paied < total){
// alert('the amounet  of paied can not bigger than the total');
//   }



// });



$("#commission_percentage").change(function(){
   var total =$('#total').val();
   var percent = $(this).val();
  // alert(percent);
  var amount =  ((percent * total) / 100).toFixed(0);
$("#amount").val(amount);
  

});

var items = [];
function sum(input){

if (toString.call(input) !== "[object Array]")
return false;
        var total =  0;
        for(var i=0;i<input.length;i++)
          {                  
            if(isNaN(input[i])){
            continue;
              }
              total += Number(input[i]);
            }
          return total;
}
function calc_commission(num){



return total;
}

$(document).on('change','.comm',function(){
  // guardarNumeros();
  // var value_comm = $(this).val();
  // boxvalue = value_comm ;

  // items.push( $(this).val());


// res = sum(items) ;
var num = parseInt($(this).val(), 10);
if (!isNaN(num)) {
  var total = 0;

$('.comm').each(function() {
    var num = parseInt($(this).val(), 10);
    if (!isNaN(num)) {
        total += num;
console.log(total);

    }
});
}

// alert(total);
$("#received").val(total);
var total_comm = $("#amount").val();

var remain_comm = total_comm - total;
$("#remain_comm").val(remain_comm);

 
});

 $('#add_ele').click(function(){
  var html = ' <div class="row remve_ele"> <div class="col-3"><div class="form-group"> <label for="" class="control-label mb-1"> Commission :</label> <input  name="commission[]" type="number" class="form-control comm" required    placeholder="type your Commission">  </div>';
  html += ' </div> <div class="col-4"> <div class="form-group"> <label for="" class="control-label mb-1"> study period  :</label><input  name=" studyperiod[]" type="text" class="form-control comm" required   placeholder="type the study period"> </div> </div>';
    html += '<div class="col-4"> <div class="form-group"><label for="cc-payment" class="control-label mb-1">Commission Date  :</label><input  name="commission_date[]" type="date" class="form-control" required  value=""></div></div> <div class="col-1">';
    html += ' <div class="form-group">  <button type="button" class=" remove_ele btn btn-primary " style="margin-top: 30px;"><i class="fa fa-trash"></i></button>   </div></div></div>';
      // alert(11)
       $('#row_file').after(html);

 });
 $(document).on('click' , ".remove_ele",function(){ 
  var num =  $(this).parent().parent().parent().find('.comm').val();
  console.log(num);
  $(this).parent().parent().parent().find('.comm').val('');
    // $(this).parent().parent().parent().remove();
    // $(this).parent().closest('input').find('.comm').val('');
    // var num = 0;
  var received =  $("#received").val();


         var total = received - num; 
         $("#received").val(total);
var total_comm = $("#amount").val();
// console.log(total);
var remain_comm = total_comm - total;
$("#remain_comm").val(remain_comm);
$(this).parent().parent().parent().remove();

 });
 
</script>

@endsection

