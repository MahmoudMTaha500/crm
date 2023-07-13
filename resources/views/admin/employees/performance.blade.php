@extends('admin.app')
@section('admin.content')
<style>

    .modal-backdrop{
        z-index: -1;
    }
        </style>
                <!-- modal medium -->
                <div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="mediumModalLabel">Filter </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{route('place.index')}}" method="GET">
                             @csrf
                            <input type="hidden" name="filter" value="1">

                            <div class="modal-body">



                                <div class="row">
                                    <div class="col-12">
                                      <div class="form-group">
                                        <label for="" class="control-label mb-1"> Name:</label>
                                      <input   class="form-control" type="text" name="name" placeholder="Type Name Of user ">
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <input type="submit" value="Confirm"  class="btn btn-primary">
                                {{-- <button type="button"  class="btn btn-primary">Confirm</button> --}}
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
                <!-- end modal medium -->
                <div class="row">
                    <div class="col-1">
                        <button type="button" class="btn btn-secondary mb-1" data-toggle="modal" data-target="#mediumModal">
                            Filter
                        </button>
                    </div>

                </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive table--no-card m-b-30">
                        <table class="table table-borderless table-striped table-earning">
                            <thead>
                                <tr>
                                    <th>#ID</th>

                                    <th>Name</th>
                                    <th>Department</th>
                                    <th>key</th>
                                    <th>bones From </th>

                                    <th>counter</th>

{{--                                    <th class="text-right">Control</th>--}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($Performance as $per)
                                {{-- {{dd($user)}} --}}
                                <tr>
                                    <td>{{$per->id}}</td>
                                    <td>{{$per->user->name}}</td>
                                    <td>{{$per->user->department ?? 'Admin'}}</td>
                                    <td>{{$per->key}}</td>
                                    <td>{{$per->type}}</td>
                                    <td>{{$per->counter}}</td>

                             @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                {{$Performance->appends(request()->input())->links('pagination::bootstrap-4')}}

            </div>

@endsection

