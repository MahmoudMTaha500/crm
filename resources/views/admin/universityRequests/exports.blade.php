<table class="table table-borderless table-striped table-earning">
    <thead>
        <tr>
            <th>#ID</th>

            <th>Name</th>
            <th>Phone</th>
            <th>Email</th>
            {{-- <th>Address</th> --}}
            <th>Country</th>
            <th>City</th>
            <th>University</th>
            <th>Agency</th>
            <th>Kind Of Course</th>
            <th>Status</th>
            <th>Start Date </th>
            <th>Note </th>
            <th>Sales Man</th>
            <th>Creator</th>
            <th>Date</th>
        </tr>

        
    </thead>
    <tbody>
        @foreach($universityRequests as $request)
        <tr>
            <td>{{$request->id}}</td>
            <td>{{$request->student->name}}</td>
            <td>{{$request->student->phone}}</td>
            <td>{{$request->student->email}}</td>
            {{-- <td>{{$request->student->address}}</td> --}}

            <td>{{$request->university->country->name}}</td>
            <td>{{$request->university->city->name}}</td>

            <td>{{$request->university->name}}</td>
            <td>{{$request->agency->name}}</td>
            <td>{{$request->kind_of_course}}</td>
            <td>{{$request->status}}</td>
            <td>{{$request->start_date}}</td>
            <td>{{$request->text_note}}</td>
            <td>{{$request->salesman->name}}</td>

          

            <td>{{$request->creator}}</td>

            <td>{{$request->created_at}}</td>
        </tr>
     @endforeach
    </tbody>
</table>