@extends('admin.app')
@section('admin.content')

    <div class="row">
    <div class="col-lg-12">
    <div class="card">
    <div class="card-header">Markter Section </div>
    <div class="card-body">
    <div class="card-title">
    <h3 class="text-center title-2">Edit  Markter</h3>
    </div>
    <hr>
    <form action="{{route('markter.update',$markter->id)}}" method="post" novalidate="novalidate">
        @csrf
        @method('put')
        
            
        <div class="form-group">
          <label for="" class="control-label mb-1">Markter Name:</label>
          <input  name="name" type="text" class="form-control"  required value="{{$markter->name}}" placeholder="type your markter name">
          </div> 
          <div class="form-group">
            <label for="" class="control-label mb-1">Markter Phone:</label>
            <input  name="phone" type="number" class="form-control"  required  value="{{$markter->phone}}" placeholder="type your markter phone">
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