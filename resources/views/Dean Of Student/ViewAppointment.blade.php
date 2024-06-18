<!DOCTYPE html>
<html>
<head>
    <title>PM Report Form</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <style>
        /* app.css */

/* General Styles */
body {
    font-family: 'Arial', sans-serif;
    background-color: #f5f5f5;
}

.container {
    max-width: 800px;
    margin: 0 auto;
    padding: 2rem;
}

/* Card Styles */
.card {
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.card-header {
    background-color: #4CAF50;
    color: #fff;
    padding: 1rem;
    border-top-left-radius: 8px;
    border-top-right-radius: 8px;
    font-size: 1.2rem;
    font-weight: bold;
}

.card-body {
    padding: 1.5rem;
}

/* Table Styles */
.table {
    width: 100%;
    border-collapse: collapse;
}

.table th,
.table td {
    padding: 0.75rem;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

.table th {
    background-color: #f5f5f5;
    font-weight: bold;
}

.table a {
    color: #4CAF50;
    text-decoration: none;
}

.table a:hover {
    text-decoration: underline;
}

/* Alert Styles */
.alert {
    padding: 1rem;
    margin-bottom: 1rem;
    border-radius: 4px;
}

.alert-success {
    background-color: #d4edda;
    color: #155724;
    border: 1px solid #c3e6cb;
}
        </style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Appointments</div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if ($appointments->count() > 0)
                        <table class="table">
                            <thead>
                                <tr>
                                <th>Student_id</th>
                                    <th>Reason</th>
                                    <th>Attachment</th>
                                    <th>Created At</th>
                                    <th>add response</th>
                                    <th>response</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($appointments as $appointment)
                                <tr>
                                <td>{{ $appointment->student_id }}</td>
                                    <td>{{ $appointment->reason }}</td>
                                    <td>
                                        @if ($appointment->attachment)
                                            <a href="{{ asset('storage/' . $appointment->attachment) }}" target="_blank">
                                                View Attachment
                                            </a>
                                        @else
                                            No attachment provided.
                                        @endif
                                    </td>
                                    <td>{{ $appointment->created_at->format('Y-m-d H:i:s') }}</td>
                                    <td>
                                        <a href="{{ route('addResponse' ,$appointment->id)}}">add response</a>
</td>
<td>{{ $appointment->response }}</td>


                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p>No appointments found.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>