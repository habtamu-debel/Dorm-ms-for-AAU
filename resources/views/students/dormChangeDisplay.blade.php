@extends('students.manageRequest')

@section('content')

<!DOCTYPE html>
<html>
<head>
    <title>Room Maintenance Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
        }

        .table {
            margin-top: 2rem;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }

        .table thead {
            background-color: #f5f5f5;
        }

        .table thead th {
            font-weight: bold;
            padding: 1rem;
            border-bottom: none;
        }

        .table td {
            padding: 1rem;
            border-top: 1px solid #dee2e6;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            padding: 0.5rem 1rem;
            font-size: 0.875rem;
            border-radius: 4px;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004a99;
        }
    </style>
</head>
<body>
    <div class="container">
        @if($dormChanges->count() > 0)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Student Name</th>
                    <th>Current Dorm Duration</th>
                    <th>Reason</th>
                    <th>Description</th>
                    <th>Room Number/Features</th>
                    <th>Special Needs</th>
                    <th>Supporting File</th>
                    <th>Date of Submission</th>
                    <th>Contact Details</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($dormChanges as $dormChange)
                    <tr>
                        <td>{{ $dormChange->student_name }}</td>
                        <td>{{ $dormChange->current_dorm_duration }}</td>
                        <td>{{ $dormChange->reason }}</td>
                        <td>{{ $dormChange->description }}</td>
                        <td>{{ $dormChange->room_number_features }}</td>
                        <td>{{ $dormChange->special_needs }}</td>
                        <td>
                            @if($dormChange->supporting_file)
                                <a href="{{ asset('storage/' . $dormChange->supporting_file) }}">Download</a>
                            @else
                                N/A
                            @endif
                        </td>
                        <td>{{ $dormChange->date_of_submission }}</td>
                        <td>{{ $dormChange->contact_details }}</td>
                        <td>
                            <a href="{{ route('dorm-changes.edit', $dormChange) }}" class="btn btn-primary btn-sm">Edit</a>
                           
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @else
            <p>No dorm change requests found for the current student.</p>
        @endif
    </div>
</body>
</html>

@endsection