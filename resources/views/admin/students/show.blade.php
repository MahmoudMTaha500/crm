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
        <th>Address</th>
        <td>{{ $student->address }}</td>
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
</table>
    </div>
    </div>
    </div>
</div>




@endsection