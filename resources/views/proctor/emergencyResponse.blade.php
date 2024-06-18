@extends('proctor.responseRequest')

@section('content')
    
<!DOCTYPE html>
<html>
<head>
    <title>Room Maintenance Form</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <style>
        .container {
            padding: 40px 0;
        }

        .card {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .card-header {
            background-color: #f8f9fa;
            padding: 16px 20px;
            border-bottom: 1px solid #dee2e6;
        }

        .card-body {
            padding: 20px;
        }

        .table {
            margin-top: 20px;
            font-size: 14px;
        }

        .table th,
        .table td {
            padding: 12px 15px;
            vertical-align: middle;
        }

        .table-striped tbody tr:nth-of-type(odd) {
            background-color: #f8f9fa;
        }

        .table-hover tbody tr:hover {
            background-color: #e9ecef;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            color: #fff;
            padding: 8px 12px;
            font-size: 14px;
            border-radius: 4px;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004d9a;
        }

        @media (max-width: 767px) {
            .container {
                padding: 20px 0;
            }

            .card {
                border-radius: 0;
            }

            .table {
                font-size: 13px;
            }

            .table th,
            .table td {
                padding: 10px 12px;
            }

            .btn-primary {
                font-size: 13px;
                padding: 6px 10px;
            }
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Submitted Request Details</div>

                <div class="card-body">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Student Name</th>
                                <th>Request Type</th>
                                <th>Description</th>
                                <th>Contact Phone</th>
                                <th>Urgency Level</th>
                                <th>Supporting Media</th>
                                <th>Location</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($emergencies as $emergency)
                            <tr>
                                <td>{{ $emergency->student_name ?? 'N/A' }}</td>
                                <td>{{ $emergency->request_type }}</td>
                                <td>{{ $emergency->description }}</td>
                                <td>{{ $emergency->contact_phone }}</td>
                                <td>{{ $emergency->urgency_level }}</td>
                                <td>
                                    @if ($emergency->supporting_media)
                                    <a href="{{ asset('storage/' . $emergency->supporting_media) }}" target="_blank">View Media</a>
                                    @else
                                    N/A
                                    @endif
                                </td>
                                <td>
                                    @if ($emergency->location_of_emergency == 'building')
                                    Building Name: {{ $emergency->building_name }}
                                    @elseif ($emergency->location_of_emergency == 'room')
                                    Room Number: {{ $emergency->room_number }}
                                    @elseif ($emergency->location_of_emergency == 'other')
                                    Other Location: {{ $emergency->other_location }}
                                    @else
                                    N/A
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('emergencies.edit', $emergency->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
