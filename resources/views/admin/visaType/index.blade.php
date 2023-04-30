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
                                    <th>Type</th>
                                    <th>Country</th>
                                    <th>Creator</th>
                                    <th class="text-right">Control</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($visaTypes as $visa)
                                <tr>
                                    <td>{{$visa->id}}</td>
                                    <td>{{$visa->name}}</td>
                                    <td>{{$visa->type}}</td>
                                    <td>{{$visa->country->name}}</td>

                                    <td>{{$visa->creator}}</td>
                                    
                                  <td>
                                    <div class="table-data-feature">
                                       
                                        <a href="{{route('visa-type.edit',$visa->id)}}" class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                            <i class="zmdi zmdi-edit"></i>
                                        </a>
                                        <form action="{{route('visa-type.destroy', $visa->id)}}" method="POST">
                                            @csrf
                                            @method('delete')


                                        <button href="" class="item" data-toggle="tooltip" data-placement="top" title="Delete" 
                                        onclick="return confirm('Are u Sure For Delete The visa')"
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
                {{$visaTypes->links()}}

            </div>
      
@endsection