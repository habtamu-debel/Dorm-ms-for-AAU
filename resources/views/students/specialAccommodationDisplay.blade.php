@extends('students.manageRequest')

@section('content')

<!DOCTYPE html>
<html>
<head>
  <title>Navigation Bar</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/css/bootstrap.min.css">
 
  
</head>

<body>
<style>
    /* Table Styles */
table {
  width: 100%;
  border-collapse: collapse;
  font-family: Arial, sans-serif;
  margin-top: 20px;
}

table th,
table td {
  padding: 12px 15px;
  text-align: left;
  border-bottom: 1px solid #ddd;
}

table th {
  background-color: #f2f2f2;
  font-weight: bold;
}

table tr:hover {
  background-color: #f5f5f5;
}

/* Link Styles */
a {
  color: #007bff;
  text-decoration: none;
}

a:hover {
  color: #0056b3;
  text-decoration: underline;
}

/* Container Styles */
.container {
  max-width: 1200px;
  margin: 0 auto;
  padding: 20px;
}

/* Heading Styles */
h1 {
  text-align: center;
  margin-bottom: 20px;
  font-size: 2.5rem;
  color: #333;
}

/* Responsive Styles */
@media (max-width: 767px) {
  table {
    font-size: 14px;
  }

  table th,
  table td {
    padding: 10px 12px;
  }
}
    </style>
    <h1>Special Accommodation Requests</h1>

    <table>
        <thead>
            <tr>
                <th>Reason</th>
                <th>Medical Documentation</th>
                <th>Preferred Accommodation</th>
                <th>Supporting Information</th>
                <th>Contact Details</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($accommodations as $accommodation)
            <tr>
                <td>{{ $accommodation->reason }}</td>
                <td>
                    @if ($accommodation->medical_documentation)
                        <a href="{{ asset('storage/' . $accommodation->medical_documentation) }}">View Document</a>
                    @else
                        N/A
                    @endif
                </td>
                <td>{{ $accommodation->preferred_accommodation }}</td>
                <td>{{ $accommodation->supporting_information }}</td>
                <td>{{ $accommodation->contact_details }}</td>
                <td>
                    <a href="{{ route('accommodation.edit', $accommodation->id) }}">Edit</a>
                    
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
</body>
</html>