
@extends('proctor.responseRequest')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clearance Requests</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container my-5">
        <h1 class="mb-4">Clearance Requests</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-striped">
            <thead>
                <tr>
                <th>Student ID</th>
                    <th>Student Name</th>
                    <th>Department</th>
                    <th>Reason</th>
                    <th>Supporting Documents</th>
                    <th>Contact Details</th>
                   
                    <th>Enter Response</th>
                    <th>Response</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clearances as $clearance)
                    <tr>
                    <td>{{ $clearance->student_id }}</td>
                        <td>{{ $clearance->student_name }}</td>
                        <td>{{ $clearance->department }}</td>
                        <td>{{ $clearance->reason }}</td>
                        <td>
                            @if ($clearance->supporting_documents)
                                <a href="{{ asset('storage/' . $clearance->supporting_documents) }}" target="_blank">View Documents</a>
                            @else
                                -
                            @endif
                        </td>
                        <td>{{ $clearance->contact_details }}</td>
                       
                        <td>
          <a href="{{ route('clearance.showResponse', ['id' => $clearance->id]) }}">Give Response</a>
        </td>
        <td>{{ $clearance->response }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @endsection
</body>
</html>