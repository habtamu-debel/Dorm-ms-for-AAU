<!DOCTYPE html>
<html>
<head>
  <title>Navigation Bar, Proctor Info, and Footer Example</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="{{ asset('css/proctorHome.css') }}">
</head>
<body>
<style>
.container {
  max-width: 800px;
  margin: 0 auto;
  padding: 20px;
}

h1 {
  font-size: 24px;
  margin-bottom: 20px;
}

table {
  width: 100%;
  border-collapse: collapse;
}

th, td {
  padding: 10px;
  text-align: left;
  border-bottom: 1px solid #ccc;
}

th {
  font-weight: bold;
}

tbody tr:hover {
  background-color: #f5f5f5;
}

a {
  color: #337ab7;
  text-decoration: none;
  margin-right: 10px;
}

button {
  background-color: #d9534f;
  color: white;
  border: none;
  padding: 5px 10px;
  cursor: pointer;
}

button:hover {
  background-color: #c9302c;
}


.container {
  max-width: 800px;
  margin: 0 auto;
  padding: 20px;
}

h1 {
  font-size: 24px;
  margin-bottom: 20px;
}

table {
  width: 100%;
  border-collapse: collapse;
}

th, td {
  padding: 10px;
  text-align: left;
  border-bottom: 1px solid #ccc;
}

th {
  font-weight: bold;
}

tbody tr:hover {
  background-color: #f5f5f5;
}

a {
  color: #337ab7;
  text-decoration: none;
  margin-right: 10px;
}

button {
  background-color: #d9534f;
  color: white;
  border: none;
  padding: 5px 10px;
  cursor: pointer;
}

button:hover {
  background-color: #c9302c;
}

/* Add the following CSS for status colors */
td.status-pending,
td.status-executed,
td.status-fail {
    margin-top:14px;
    display: flex;
justify-content: center;
align-items: center;
  
  color: #fff;
  border-radius: 3px;
 
}

td.status-pending::before,
td.status-executed::before,
td.status-fail::before {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  z-index: -1;
}

td.status-pending {
  background-color: yellow;
}

td.status-executed {
  background-color: green;
}

td.status-fail {
  background-color: red;
}

</style>

<div class="container">
  <h1>All Room Maintenance Requests</h1>
  <table>
    <thead>
      <tr>
        <th>Room Number</th>
        <th>Student ID</th>
        <th>Maintenance Type</th>
        <th>Urgency</th>
        <th>Contact</th>
        <!-- Add other columns as needed -->
     
        <th>Status</th>
        <th>Response</th>
        
      </tr>
    </thead>
    <tbody>
      @foreach ($roomMaintenances as $roomMaintenance)
      <tr>
        <td>{{ $roomMaintenance->room_number }}</td>
        <td>{{ $roomMaintenance->student_id }}</td>
        <td>{{ $roomMaintenance->maintenance_type }}</td>
        <td>{{ $roomMaintenance->urgency }}</td>
        <td>{{ $roomMaintenance->contact }}</td>
        <!-- Add other columns as needed -->

        <td class="status-{{ $roomMaintenance->status }}">{{ $roomMaintenance->status }}</td>
        <td class="status-{{ $roomMaintenance->response}}">{{ $roomMaintenance->response }}</td>
       
                     
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

</body>
</html>