<table class="table table-borderless table-striped table-earning">
    <thead>
        <tr>
            <th>#ID</th>

            <th>Name</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Student Type</th>
            <th>Country</th>
            <th>City</th>
            <th>English School</th>
            <th> Course</th>
            <th>Status</th>
            <th>Start Date </th>
            <th>End Date </th>
            <th>Residence </th>
            <th>Duration </th>
            <th>Note </th>
            <th>Sales Man</th>
            <th>Markter</th>

            

            <th>Creator</th>
            <th>Date</th>
        </tr>

        
    </thead>
    <tbody>
        @foreach($englishSchoolRequests as $request)
        <tr>
            <td> {{$request->id}}  <input type="checkbox" class="" name="requests_ids[]" value="{{$request->id}}"></td>
            <td>{{$request->student->name}}</td>
            <td>{{$request->student->phone}}</td>
            <td>{{$request->student->email}}</td>
            <td>{{$request->student->student_type}}</td>
            <td>{{$request->englishschool->country->name}}</td>
            <td>{{$request->englishschool->city->name}}</td>

            <td>{{$request->englishschool->name}}</td>
            <td>{{$request->course}}</td>
            <td>{{$request->status}}</td>
            <td>{{$request->start_date}}</td>
            <td>{{$request->end_date}}</td>
            <td>{{$request->residence}}</td>
            <td>{{$request->duration}}</td>
            <td>{{$request->text_note}}</td>
            <td>{{$request->salesman->name}}</td>
            <td>{{$request->markter->name ??  "---" }}</td>

            <td>{{$request->creator}}</td>
          

           
            <td>{{$request->created_at}}</td>
        </tr>
     @endforeach
    </tbody>
</table>