@extends('admin.app')
@section('admin.content')

    <div class="row">
    <div class="col-lg-12">
    <div class="card">
    <div class="card-header">Markter  Section </div>
    <div class="card-body">
    <div class="card-title">
    <h3 class="text-center title-2">Add New Markter</h3>
    </div>
    <hr>
    <form action="{{route('markter.store')}}" method="post" novalidate="novalidate">
        @csrf
      @include('admin.includes.errors')

        <div class="form-group">
            <label for="cc-payment" class="control-label mb-1">Name:</label>
            <input  name="name" type="text" class="form-control"  required value="" placeholder="type name">

            </div>  
            
            <div class="form-group">
                <label for="" class="control-label mb-1">Phone </label>
                <input  name="phone" type="number" class="form-control"  required='required'  value="" placeholder="type phone">
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