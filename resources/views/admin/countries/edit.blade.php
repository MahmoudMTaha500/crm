@extends('admin.app')
@section('admin.content')

    <div class="row">
    <div class="col-lg-12">
    <div class="card">
    <div class="card-header">Countries Section </div>
    <div class="card-body">
    <div class="card-title">
    <h3 class="text-center title-2">Add New Country</h3>
    </div>
    <hr>
    <form action="{{route('country.update',$country->id)}}" method="post" novalidate="novalidate">
        @csrf
        @method('put')
        
    <div class="form-group">
    <label for="cc-payment" class="control-label mb-1">Counry Name:</label>
    <input  name="name" type="text" class="form-control"  value="{{$country->name}}">
    </div>


    <div>
    <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
    update
    </button>
    </div>
    </form>
    </div>

    </div>
    </div>

    </div>
@endsection