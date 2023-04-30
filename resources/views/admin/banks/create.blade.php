@extends('admin.app')
@section('admin.content')

    <div class="row">
    <div class="col-lg-12">
    <div class="card">
    <div class="card-header">Bank Section </div>
    <div class="card-body">
    <div class="card-title">
    <h3 class="text-center title-2">Add New Bank </h3>
    </div>
    <hr>
    <form action="{{route('bank.store')}}" method="post" novalidate="novalidate">
      @include('admin.includes.errors')

        @csrf
    <div class="form-group">
    <label for="cc-payment" class="control-label mb-1">Bank Name:</label>
    <input  name="name" type="text" class="form-control"  value="">
    </div>


    <div>
    <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
    Save
    </button>
    </div>
    </form>
    </div>

    </div>
    </div>

    </div>
@endsection