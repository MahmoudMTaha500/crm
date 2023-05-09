@extends('admin.app')
@section('admin.content')

            <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive table--no-card m-b-30">
                        <table class="table table-borderless table-striped table-earning">
                            <thead>
                                <tr>
                                    <th>#ID</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Creator</th>
                                    <th class="text-right">Control</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($salesmans as $salesman)
                                <tr>
                                    <td>{{$salesman->id}}</td>
                                    <td>{{$salesman->name}}</td>
                                    <td>{{$salesman->phone}}</td>
                                    <td>{{$salesman->creator}}</td>

                                  <td>
                                    <div class="table-data-feature">

                                        <a href="{{route('salesman.edit',$salesman->id)}}" class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                            <i class="zmdi zmdi-edit"></i>
                                        </a>
                                        <form action="{{route('salesman.destroy', $salesman->id)}}" method="POST">
                                            @csrf
                                            @method('delete')


                                        <button href="" class="item" data-toggle="tooltip" data-placement="top" title="Delete"
                                        onclick="return confirm('Are u Sure For Delete The salesman')"
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
                {{$salesmans->appends(request()->input())->links('pagination::bootstrap-4')}}

            </div>

@endsection
