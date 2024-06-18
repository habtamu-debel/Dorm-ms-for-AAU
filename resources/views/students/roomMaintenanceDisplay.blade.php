<!-- resources/views/room-maintenance/index.blade.php -->

<!DOCTYPE html>
<html>
<head>
  <title>Navigation Bar, Proctor Info, and Footer Example</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{ asset('css/studentHome.css') }}">
  
</head>
<style>
    /* Container styles */
.container {
  max-width: 960px;
  margin: 0 auto;
  padding: 20px;
}

/* Room maintenance item styles */
.room-maintenance-item {
  background-color: #f5f5f5;
  padding: 20px;
  border-radius: 4px;
  margin-bottom: 20px;
}

.room-maintenance-item h3 {
  font-size: 18px;
  color: #333;
  margin-bottom: 10px;
}

.room-maintenance-item p {
  font-size: 16px;
  color: #555;
  margin-bottom: 5px;
}
    </style>
<body>
  <h2>This is what your request</h2>
<div class="container">
  @foreach ($roomMaintenances as $roomMaintenance)
    <div class="room-maintenance-item">
      <h3>Room Number: {{ $roomMaintenance->room_number }}</h3>
      <p>Student ID: {{ $roomMaintenance->student_id }}</p>
      <p>Maintenance Type: {{ $roomMaintenance->maintenance_type }}</p>
      <p>Urgency: {{ $roomMaintenance->urgency }}</p>
      <p>Contact: {{ $roomMaintenance->contact }}</p>
      <p>Attachment<img src="{{ asset('attachments/' . $roomMaintenance->attachment) }}" alt="Attachment" width="200" height="150"></p>
      <!-- Display other room maintenance fields as desired -->
      <a href="{{ route('roomMaintenance.edittt', ['id' => $roomMaintenance->id]) }}" class="edit-button">Edit</a>
    </div>
  @endforeach
</div>
</body>
</html>