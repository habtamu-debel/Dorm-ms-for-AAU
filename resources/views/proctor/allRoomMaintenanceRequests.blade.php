

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
  margin: 0 60px;
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
  margin-top: 14px;
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

<script>
  function sendRequest() {
    var checkboxes = document.getElementsByName('request_checkbox[]');
    var requestData = [];

    for (var i = 0; i < checkboxes.length; i++) {
      if (checkboxes[i].checked) {
        var row = checkboxes[i].parentNode.parentNode;
        var roomNumber = row.cells[0].innerHTML;
        var studentId = row.cells[1].innerHTML;
        var maintenanceType = row.cells[2].innerHTML;
        var urgency = row.cells[3].innerHTML;
        var contact = row.cells[4].innerHTML;

        var requestDataItem = {
          roomNumber: roomNumber,
          studentId: studentId,
          maintenanceType: maintenanceType,
          urgency: urgency,
          contact: contact
        };

        requestData.push(requestDataItem);
      }
    }

    // Send the request data to the server using AJAX or fetch API
    // Example:
    fetch('/api/send-request', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json'
      },
      body: JSON.stringify(requestData)
    })
    .then(response => {
      // Handle the response from the server
      console.log('Request sent successfully');
    })
    .catch(error => {
      // Handle the error
      console.error('Error sending request:', error);
    });
  }
</script>

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
        <th>Actions</th>
        <th>Status</th>
        <th>Changed Status</th>
        <th>Response</th>
        <th>Changed Response</th>
        <th>Request</th>
        <th>Checkbox</th> <!-- Add a new column for the checkbox -->

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
        <td>
          <a href="{{ route('roomMaintenance.edit', ['id' => $roomMaintenance->id]) }}">Edit</a>
          <form action="{{ route('roomMaintenance.destroy', ['id' => $roomMaintenance->id]) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Remove</button>
          </form>
        </td>
        <td>
          <a href="{{ route('roomMaintenance.show', ['id' => $roomMaintenance->id]) }}">Change Status</a>
        </td>
        <td class="status-{{ $roomMaintenance->status }}">{{ $roomMaintenance->status }}</td>
        <td>
          <a href="{{ route('roomMaintenance.showResponse', ['id' => $roomMaintenance->id]) }}">Give Response</a>
        </td>
        <td>{{ $roomMaintenance->response }}</td>
        <td>
          <a href="{{ route('roomMaintenance.sendRequest', ['id' => $roomMaintenance->id]) }}">Send Request</a>
        </td>
        <td>
          <input type="checkbox" name="request_checkbox[]" value="{{ $roomMaintenance->id }}">
        </td> <!-- Add the checkbox input field inside the last column of each row -->

      </tr>
      @endforeach
    </tbody>
  </table>
 
</div>

</body>
</html>