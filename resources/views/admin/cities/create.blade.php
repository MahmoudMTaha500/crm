@extends('admin.app')
@section('admin.content')

    <div class="row">
    <div class="col-lg-12">
    <div class="card">
    <div class="card-header">Cities Section </div>
    <div class="card-body">
    <div class="card-title">
    <h3 class="text-center title-2">Add New City</h3>
    </div>
    <hr>
    <form action="{{route('city.store')}}" method="post" novalidate="novalidate">
      @include('admin.includes.errors')

        @csrf
        <div class="form-group">
            <label for="cc-payment" class="control-label mb-1">Countries</label>
          <select name="country_id" id="" class="form-control">
            <option value=''>Choose Country</option>               

                @foreach($countries as $country)
                  <option value="{{$country->id}}">{{$country->name}}</option>               
                @endforeach
          </select>
            </div>  
            
            <div class="form-group">
                <label for="" class="control-label mb-1">City Name:</label>
                <input  name="name" type="text" class="form-control"  value="" placeholder="type your city name">
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