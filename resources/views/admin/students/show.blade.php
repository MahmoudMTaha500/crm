@extends('admin.app')
@section('admin.content')
<div class="row">
    <div class="col-lg-12">
    <div class="card">
    <div class="card-header">Students Section </div>
    <div class="card-body">
    <div class="card-title">
    <h3 class="text-center title-2">Information Student </h3>
    </div>

<table class="table table-striped table-bordered">
    <tbody class="text-left">
    <tr>
        <th>Name</th>
        <td>{{ $student->name }}</td>
    </tr>
    <tr>
        <th>E-mail</th>
        <td>
           {{ $student->email }}
        </td>
    </tr>
    <tr>
        <th>Phone</th>
        <td>{{ $student->phone }}</td>
    </tr>
    <tr>
        <th>Nationality</th>
        <td>{{ $student->nationality }}</td>
    </tr>
    <tr>
        <th>Student Type</th>
        <td>{{$student->student_type}}</td>

    </tr>
   

    <tr>
        <th>Media</th>
        @if(!$student_media->isEmpty())
        @foreach($student_media as $media)
        <td style="display:block;">
        <a href="{{url($media->media_path)}}" target="_blank">

        
        {{ $media->media_name }}
         </a>
        </td>
        @endforeach
        @else 
        <td> Opps! there are no media Here. </td>
        
        @endif

    </tr>
    </tbody>
   <hr >
  
</table>
<div class="card-title">
    <h3 class="text-center title-2">Information Student  Universities </h3>
    </div>
<table class="table table-striped table-bordered">

    <tbody  class="text-left">
       
        <th>University </th>
        <th>Agency</th>
        <th>Kind Of Course</th>
        <th>Sales Man</th>
        <th>Start Date</th>

        <th>Status</th>
        <th>Text Note</th>
       @if(!$StudentsRequest->isEmpty() )
        @foreach( $StudentsRequest as $request)
        <tr>
        <td> {{$request->university->name }} </td>
        <td> {{ $request->agency->name }}</td>
        <td> {{ $request->kind_of_course }}</td>
        <td> {{ $request->salesman->name }}</td>
        <td> {{ $request->start_date }}</td>
        <td> {{ $request->status }}</td>
        <td> {{ $request->text_note ? $request->text_note:'----'  }}</td>
        </tr>
        @endforeach
        @else 
        <tr> <td colspan='9' style="text-align: center">!Opps there are no Information For University Requests  </td></tr>
    @endif
    


</tbody>   
</table>
<div class="card-title">
    <h3 class="text-center title-2">Information Student  English Schools </h3>
    </div>
<table class="table table-striped table-bordered">

    <tbody  class="text-left">
       
        <th>English School </th>
        <th> Course</th>

        <th>Sales Man</th>
        <th>Start Date</th>
        <th>End Date</th>
        <th>Duration</th>
        <th>Residence</th>

        <th>Status</th>
        <th>Text Note</th>
       @if(!$englishSchoolsRequests->isEmpty() )
        @foreach( $englishSchoolsRequests as $request)
        <tr>
            <td>{{$request->englishschool->name}}</td>
            <td>{{$request->course}}</td>
            <td>{{$request->salesman->name}}</td>
            <td>{{$request->start_date}}</td>
            <td>{{$request->end_date}}</td>
            <td>{{$request->duration}}</td>

            <td>{{$request->residence ?? '----'}}</td>
            <td>{{$request->status}}</td>


        <td> {{ $request->text_note ? $request->text_note:'----'  }}</td>
        </tr>
        @endforeach
        @else 
        <tr> <td colspan='9' style="text-align: center">!Opps there are no Information For  English Schools  </td></tr>
    @endif
    


</tbody>   
</table>
<div class="card-title">
    <h3 class="text-center title-2">Information Student  Visa </h3>
    </div>
<table class="table table-striped table-bordered">

    <tbody  class="text-left">
       
        <th>Date</th>
        <th>Country</th>
        <th>Visa Type</th>
        <th>Fees</th>
        <th>Sales Man</th>
        <th>The Payment</th>
        <th>Bank</th>
        <th>Transfer Bank</th>
        <th>Others</th>
        <th>Status</th>
        <th>Creator</th>
       @if(!$visas->isEmpty() )
        @foreach( $visas as $visa)
        <tr>
            <td>{{$visa->date}}</td>
            <td>{{$visa->country->name}}</td>
            <td>{{$visa->type->name ?? '----'}}</td>
            <td>{{$visa->fees}}</td>
            <td>{{$visa->salesman->name}}</td>
            <td>{{$visa->payment}}</td>
            <td>{{$visa->bank->name}}</td>
            <td>{{$visa->bank->name}}</td>
            <td>{{$visa->other}}</td>
            <td>{{$visa->status}}</td>
            <td>{{$visa->creator}}</td>
        @endforeach
        @else 
        <tr> <td colspan='12' style="text-align: center">!Opps there are no Information For Visa  </td></tr>
    @endif
    


</tbody>   
</table>
    </div>
    </div>
    </div>
</div>




@endsection