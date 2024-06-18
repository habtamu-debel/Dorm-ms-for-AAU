
@extends('proctor.responseRequest')

@section('content')
<!DOCTYPE html>
<html>
<head>
    <title>Resource Exit Form</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <style>
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            font-family: Arial, sans-serif;
        }

        .card {
            background-color: #f5f5f5;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .card p {
            margin-bottom: 10px;
        }

        .card strong {
            font-weight: bold;
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
        }

        .no-resources {
            text-align: center;
            color: #888;
            font-style: italic;
        }

        .print-button {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 8px 16px;
            cursor: pointer;
            font-size: 14px;
        }

        .print-button:hover {
            background-color: #0056b3;
        }
        .blue-link {
    color: blue;
}
    </style>
</head>
<body>
    <div class="container">
        <h1>Resource Exit Form</h1>

        @if (count($resources) > 0)
            @foreach ($resources as $resource)
            <div class="card">
                <div class="card-body">
                    <p><strong>Student ID:</strong> {{ $resource->student_id }}</p>
                    <p><strong>Student Name:</strong> {{ $resource->student_first_name }} {{ $resource->student_last_name }}</p>
                    <p><strong>Year:</strong> {{ $resource->year }}</p>
                    <p><strong>Department:</strong> {{ $resource->department }}</p>
                    <p><strong>Items Exited:</strong> {{ $resource->items_exit }}</p>
                  
                    <p><strong>Date of Submission:</strong> {{ $resource->date_of_submission }}</p>
                    <p><strong>Items Exited:</strong> {{ $resource->confirmation }}</p>
                    <a href="{{ route('resource.confirm', ['id' => $resource->id]) }}" class="blue-link">Add Confirmation</a>
                </div>
       
            </div>
            @endforeach
        @else
            <p class="no-resources">No resources found.</p>
        @endif
    </div>

    <script>
        
     
    </script>

    @endsection
</body>
</html>