@extends('admin.app')
@section('admin.content')

    <div class="row">
    <div class="col-lg-12">
    <div class="card">
    <div class="card-header">Visa Type  Section </div>
    <div class="card-body">
    <div class="card-title">
    <h3 class="text-center title-2">Add New Visa Type</h3>
    </div>
    <hr>
    <form action="{{route('visa-type.store')}}" method="post" novalidate="novalidate">
        @csrf
      @include('admin.includes.errors')

        <div class="form-group">
            <label for="cc-payment" class="control-label mb-1" > Visa Name:</label>
            <input  name="name" type="text" class="form-control"  required value="" placeholder=" name">

            </div>  
            <div class="form-group">
                <label for="cc-payment" class="control-label mb-1">Countries:</label>
                <select name="country_id" id="country_id"  class="form-control">
                <option value=""> Chosse Country </option>

                @foreach($countries as $country)
                <option  value="{{$country->id}}">{{$country->name}}</option>               
                @endforeach
                </select>
            </div>
            
            <div class="form-group">
                <label for="" class="control-label mb-1">Visa Type </label>
                <select class="form-control" name="type" id="">
                    <option value="">please Choose Type</option>
                    <option value="UK">UK</option>
                    <option value="USA">USA</option>
                    <option value="Tourist">Tourist</option>
                </select>
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
