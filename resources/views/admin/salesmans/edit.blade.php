@extends('admin.app')
@section('admin.content')

    <div class="row">
    <div class="col-lg-12">
    <div class="card">
    <div class="card-header">Salesman Section </div>
    <div class="card-body">
    <div class="card-title">
    <h3 class="text-center title-2">Edit  Salesman</h3>
    </div>
    <hr>
    <form action="{{route('salesman.update',$salesMan->id)}}" method="post" novalidate="novalidate">
        @csrf
        @method('put')
        
            
        <div class="form-group">
          <label for="" class="control-label mb-1">salesMan Name:</label>
          <input  name="name" type="text" class="form-control"  required value="{{$salesMan->name}}" placeholder="type your salesMan name">
          </div> 
          <div class="form-group">
            <label for="" class="control-label mb-1">salesMan Phone:</label>
            <input  name="phone" type="number" class="form-control"  required  value="{{$salesMan->phone}}" placeholder="type your salesMan phone">
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