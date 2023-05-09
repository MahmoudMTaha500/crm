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
                            <form action="{{route('country.index')}}" method="GET">
                             @csrf
                            <input type="hidden" name="filter" value="1">

                            <div class="modal-body">

                                <div class="row">
                                    <div class="col-12">
                                      <div class="form-group">
                                        <label for="" class="control-label mb-1"> Country name:</label>
                                       <input type="text" class="form-control" name="name">
                                          </select>
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
                                    <th>name</th>
                                    <th>Creator</th>
                                    <th class="text-right">Control</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($banks as $bank)
                                <tr>
                                    <td>{{$bank->id}}</td>
                                    <td>{{$bank->name}}</td>
                                    <td>{{$bank->creator}}</td>

                                  <td>
                                    <div class="table-data-feature">

                                        <a href="{{route('bank.edit',$bank->id)}}" class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                            <i class="zmdi zmdi-edit"></i>
                                        </a>
                                        <form action="{{route('bank.destroy', $bank->id)}}" method="POST">
                                            @csrf
                                            @method('delete')


                                        <button href="" class="item" data-toggle="tooltip" data-placement="top" title="Delete"
                                        onclick="return confirm('Are u Sure For Delete This bank')"
                                        >
                                            <i class="zmdi zmdi-delete"></i>
                                        </button>
                                    </form>


                                    </div>

                                    </td>
                                </tr>
                             @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                {{$banks->appends(request()->input())->links('pagination::bootstrap-4')}}

            </div>

@endsection
