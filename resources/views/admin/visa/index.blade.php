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
                                    <div class="col-6">
                                      <div class="form-group">
                                        <label for="" class="control-label mb-1"> Students :</label>
                                        <select  name="student" class="form-control selectpicker"    data-live-search="true" id="">
                                        <option value=""> Chosse Student </option>

                                        @foreach($students as  $student)
                                          <option   value="{{$student->id}}">{{$student->name}}</option>
                                          @endforeach
                                        </select>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                      <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">Countries:</label>
                                        <select name="country_id" id="country_id"  class="form-control">
                                        <option value=""> Chosse Country </option>

                                        @foreach($countries as $country)
                                        <option  value="{{$country->id}}">{{$country->name}}</option>
                                        @endforeach
                                        </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="cc-payment" class="control-label mb-1">Visa Type:</label>
                                            <select name="type" id=""  class="form-control">
                                            <option value=""> Chosse Visa Type </option>
                                            @foreach($types as $type)
                                            <option  value="{{$type->id}}">{{$type->name}}</option>
                                            @endforeach
                                            </select>
                                          </div>
                                      </div>
                                      <div class="col-6">
                                        <div class="form-group">
                                            <label for="cc-payment" class="control-label mb-1">Fees :</label>
                                            <input  name="fees" type="number" class="form-control"   value=""  placeholder="Enter The Amount Of Fees">
                                          </div>
                                      </div>
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="cc-payment" class="control-label mb-1">ٍSalesMen :</label>
                                            <select class="form-control"name="salesman" id="">
                                            <option value="">Please Choose  SalesMan</option>
                                            @foreach ($salsmens as $salesman)
                                            <option value="{{$salesman->id}}">{{$salesman->name}}</option>

                                            @endforeach

                                            </select>
                                          </div>
                                      </div>
                                      <div class="col-6">
                                        <div class="form-group">
                                            <label for="cc-payment" class="control-label mb-1">The Payment :</label>
                                            <select class="form-control"name="payment" id="">
                                              <option value="">Please Choose  Payment</option>
                                              <option value="Sat Acc">Sat Acc</option>
                                              <option value="Client Acc">Client Acc</option>
                                              </select>
                                          </div>
                                      </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="cc-payment" class="control-label mb-1">Banks :</label>
                                            <select class="form-control"name="bank" id="">
                                            <option value="">Please Choose  Banks</option>
                                            @foreach ($banks as $bank)
                                            <option value="{{$bank->id}}">{{$bank->name}}</option>

                                            @endforeach

                                            </select>
                                      </div>
                                    </div>
                                      <div class="col-6">
                                        <div class="form-group">
                                            <label for="cc-payment" class="control-label mb-1"> Transfer from the student's bank :</label>
                                            <select class="form-control"name="transfer_bank" id="">
                                            <option value="">Please Choose  Banks</option>
                                            @foreach ($banks as $bank)
                                            <option value="{{$bank->id}}">{{$bank->name}}</option>

                                            @endforeach

                                            </select>
                                          </div>
                                      </div>

                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="" class="control-label mb-1"> Status:</label>
                                            <select class="form-control "  name="status" id="">
                                              <option value="">Please Choose Place</option>
                                              <option value="New">  New</option>
                                              <option value="Waiting for the documents">Waiting for the documents </option>
                                              <option value="Waiting for payment"> Waiting for payment </option>
                                              <option value="Applied"> Applied </option>
                                              <option value="Issued"> Issued  </option>
                                              <option value="Rejected"> Rejected </option>


                                            </select>
                                          </div>
                                      </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="cc-payment" class="control-label mb-1">Date :</label>
                                        <input  name="date" type="date" class="form-control"   value="" >
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
                                    <th>Date</th>
                                    <th>Country</th>
                                    <th>Visa Type</th>
                                    <th>Fees</th>
                                    <th>Sales Man</th>
                                    <th>The Payment</th>
                                    <th>Bank</th>
                                    <th>Transfer Bank</th>

                                    <th>Others</th>
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
                                    <td>{{$visa->date}}</td>
                                    <td>{{$visa->country->name}}</td>
                                    <td>{{$visa->type->name ?? '---'}}</td>
                                    <td>{{$visa->fees}}</td>
                                    <td>{{$visa->salesman->name}}</td>
                                    <td>{{$visa->payment}}</td>
                                    <td>{{$visa->bank->name ?? '---'}}</td>
                                    <td>{{$visa->bank->name ?? '---'}}</td>
                                    <td>{{$visa->other}}</td>
                                    <td>{{$visa->status}}</td>



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
                {{$visas->appends(request()->input())->links('pagination::bootstrap-4')}}

            </div>

@endsection
