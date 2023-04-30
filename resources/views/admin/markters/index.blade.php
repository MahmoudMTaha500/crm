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
                                @foreach($markters as $markter)
                                <tr>
                                    <td>{{$markter->id}}</td>
                                    <td>{{$markter->name}}</td>
                                    <td>{{$markter->phone}}</td>
                                    <td>{{$markter->creator}}</td>
                                    
                                  <td>
                                    <div class="table-data-feature">
                                       
                                        <a href="{{route('markter.edit',$markter->id)}}" class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                            <i class="zmdi zmdi-edit"></i>
                                        </a>
                                        <form action="{{route('markter.destroy', $markter->id)}}" method="POST">
                                            @csrf
                                            @method('delete')


                                        <button href="" class="item" data-toggle="tooltip" data-placement="top" title="Delete" 
                                        onclick="return confirm('Are u Sure For Delete The markter')"
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
                {{$markters->links()}}

            </div>
      
@endsection