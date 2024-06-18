@extends('students.manageRequest')

@section('content')

<!DOCTYPE html>
<html>
<head>
    <title>Lost and Found Request Details</title>
    <style>
       body {
    font-family: Arial, sans-serif;
    background-color: #f2f2f2;
}

.container {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
    background-color: white;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

th, td {
    padding: 10px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

th {
    background-color: #f2f2f2;
}

.btn {
    display: inline-block;
    padding: 6px 12px;
    font-size: 14px;
    font-weight: 400;
    line-height: 1.42857143;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    cursor: pointer;
    border: 1px solid transparent;
    border-radius: 4px;
    color: white;
    background-color: #337ab7;
    text-decoration: none;
}

.btn:hover {
    background-color: #286090;
}
    </style>
</head>
<body>
    <div class="container">
        <h1>Lost and Found Request Details</h1>

        @if(count($lostAndFounds) > 0)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Item Status</th>
                    <th>Item Name</th>
                    <th>Location Found</th>
                    <th>Date Found</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($lostAndFounds as $lostAndFound)
                <tr>
                    <td>{{ $lostAndFound->item_status }}</td>
                    <td>{{ $lostAndFound->item_name }}</td>
                    <td>{{ $lostAndFound->location_found }}</td>
                    <td>{{ $lostAndFound->date_found }}</td>
                    <td>
                        <a href="{{ route('lostandfound.edit', $lostAndFound->id) }}" class="btn">Edit</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <p>No lost and found requests found.</p>
        @endif
    </div>

    @endsection
</body>
</html>