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
                            <form action="{{route('visa.index')}}" method="GET">
                             @csrf 
                            <input type="hidden" name="filter" value="1">
                         
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-12">
                                      <div class="form-group">
                                        <label for="" class="control-label mb-1"> E-Mail:</label>
                                        <input type="email" name="email" class="form-control" placeholder="type E-Mail">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                      <div class="form-group">
                                        <label for="" class="control-label mb-1"> Phone:</label>
                                        <input type="number" name="phone" class="form-control" placeholder="type Phone">

                                        </div>
                                    </div>
                                </div>
                               
                                <div class="row">
                                    <div class="col-12">
                                      <div class="form-group">
                                        <label for="" class="control-label mb-1"> Name:</label>
                                      <input   class="form-control" type="text" name="name" placeholder="Type Name Of Place ">
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
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>Nationality</th>
                                    <th>Status</th>
                                    

                                    <th>Creator</th>
                                    <th class="text-right">Control</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($visas as $visa)
                                <tr>
                                    <td>{{$visa->id}}</td>
                                    <td>{{$visa->student->name}}</td>
                                    <td>{{$visa->student->phone}}</td>
                                    <td>{{$visa->student->email}}</td>
                                    <td>{{$visa->student->address}}</td>
                                    <td>{{$visa->student->nationality}}</td>
                                    <td>
                                        @if($visa->status==0) 
                                        New
                                        @elseif($visa->status==1)
                                        Inprogress
                                        @elseif($visa->status==2)
                                        Done
                                        @endif

                                    </td>
                                  
                                    <td>{{$visa->creator}}</td>

                                    
                                  <td>
                                    <div class="table-data-feature">
                                       
                                        <a href="{{route('visa.edit',$visa->id)}}" class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                            <i class="zmdi zmdi-edit"></i>
                                        </a>
                                        <a href="{{route('student.show',$visa->student_id)}}" class="item" data-toggle="tooltip" data-placement="top" title="show" target="_blank">
                                            <i class="zmdi zmdi-eye"></i>
                                        </a>
                                        <form action="{{route('visa.destroy', $visa->id)}}" method="POST">
                                            @csrf
                                            @method('delete')


                                        <button href="" class="item" data-toggle="tooltip" data-placement="top" title="Delete" 
                                        onclick="return confirm('Are u Sure For Delete This visa')"
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
                {{$visas->appends(request()->input())->links()}}

            </div>
      
@endsection