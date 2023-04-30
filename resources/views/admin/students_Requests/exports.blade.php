<table class="table table-borderless table-striped table-earning">
    <thead>
        <tr>
            <th>#ID</th>

            <th>Name</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Address</th>
            <th>Study Place</th>
            <th>Study Place Type</th>
            <th>Sales Man</th>
            

            <th>Creator</th>
            <th>Date</th>
        </tr>
    </thead>
    <tbody>
        @foreach($studentRequests as $request)
        <tr>
            <td>{{$request->id}}</td>
            <td>{{$request->student->name}}</td>
            <td>{{$request->student->phone}}</td>
            <td>{{$request->student->email}}</td>
            <td>{{$request->student->address}}</td>

            <td>{{$request->study_place->name}}</td>
            <td>{{$request->study_place->type->name}}</td>
            <td>{{$request->salesman->name}}</td>
          

            <td>Admin</td>
            <td>{{$request->created_at}}</td>
        </tr>
     @endforeach
    </tbody>
</table>