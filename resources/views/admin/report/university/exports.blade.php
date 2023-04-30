<head>
    <style>
        table {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

       table td,table th {
            border: 1px solid #ddd;
            padding: 8px;
        }

       table tr:nth-child(even){background-color: #f2f2f2;}

       table tr:hover {background-color: #ddd;}

       table th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
        }
    </style>
</head>
<table class="table  table-bordered">
    <thead>
    <tr>
        <th>#ID</th>

        <th>Student Name</th>
        <th>Type</th>
        <th>Country</th>
        <th>University</th>
        <th>Program</th>
        <th>Start Date</th>

        <th>Commission  Total</th>
        <th>Commission  received</th>
        <th>Commission  Remain</th>

        <th>Sales man </th>
        <th>Markter </th>

        <th>Status Paied </th>
        <th>Status Followed</th>
        <th>Creator</th>
    </tr>
    </thead>
    <tbody>
    @foreach($financeUniversity as $finance)



        <tr>
            <td>{{$finance->id}}</td>
            <td>{{$finance->request_uni->student->name}}</td>
            <td>{{$finance->request_uni->student->student_type}}</td>
            <td>{{$finance->request_uni->university->country->name}}</td>
            <td>{{$finance->request_uni->university->name}}</td>
            <td>{{$finance->request_uni->kind_of_course}}</td>
            <td>{{$finance->request_uni->start_date}}</td>
            <td>{{$finance->commission_total}}</td>
            <td>{{$finance->commission_received}}</td>
            <td>{{$finance->commission_remain}}</td>
            <td>{{$finance->request_uni->salesman->name}}</td>
            <td>{{$finance->request_uni->markter->name}}</td>
            <td>{{$finance->status_paied}}</td>
            <td>{{$finance->status_followed}}</td>
            <td>{{$finance->creator}}</td>
        </tr>
    @endforeach

    </tbody>
</table>


