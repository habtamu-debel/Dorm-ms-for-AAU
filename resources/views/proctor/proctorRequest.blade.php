<!-- resources/views/proctor-requests/index.blade.php -->
<!DOCTYPE html>
<html>
<head>
  <title>Navigation Bar, Proctor Info, and Footer Example</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="{{ asset('css/proctorHome.css') }}">
</head>
<body>
    <style>
        /* public/css/proctorHome.css */

/* Add your custom styles here */

body {
  font-family: Arial, sans-serif;
}

h1 {
  text-align: center;
  margin-top: 20px;
}

table {
  width: 100%;
  border-collapse: collapse;
  margin-top: 20px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Add box shadow */
}

th, td {
  padding: 10px;
  text-align: left;
}

thead {
  background-color: #f2f2f2;
}

tbody tr:nth-child(even) {
  background-color: #f2f2f2;
}

a {
  color: blue;
  text-decoration: none;
  margin-right: 10px;
}

button {
  background-color: #dc3545;
  color: #fff;
  border: none;
  padding: 5px 10px;
  cursor: pointer;
}

button:hover {
  background-color: #c82333;
}

/* Add more custom styles as needed */
        </style>
    <h1>Proctor Requests</h1>

    <table>
        <thead>
            <tr>
            <th>Request ID</th>
                <th>Category</th>
                <th>Occurrence</th>
                <th>Media</th>
                <th>Impact</th>
                <th>Urgency</th>
                <th>Room</th>
                <th>Description</th>
                <th>Contact</th>
                <!-- Add more table headers for other columns -->
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($proctorRequests as $proctorRequest)
                <tr>
                <td>{{ $proctorRequest->requestId }}</td>
                    <td>{{ $proctorRequest->category }}</td>
                    <td>{{ $proctorRequest->occurrence }}</td>
                    <td>{{ $proctorRequest->media }}</td>
                    <td>{{ $proctorRequest->impact }}</td>
                    <td>{{ $proctorRequest->urgency }}</td>
                    <td>{{ $proctorRequest->room }}</td>
                    <td>{{ $proctorRequest->description }}</td>
                    <td>{{ $proctorRequest->contact }}</td>
                    <!-- Add more table cells for other columns -->
                    <td>
                        <a href="{{ route('proctor-requests.edit', $proctorRequest->requestId) }}">Edit</a>
                        <form action="{{ route('proctor-requests.destroy', $proctorRequest->requestId) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
