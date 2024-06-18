<!DOCTYPE html>
<html>
<head>
  <title>Navigation Bar, Proctor Info, and Footer Example</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{ asset('css/studentHome.css') }}">
  
</head>

<body>
<style>
    .container {
        max-width: 400px;
        margin: 0 auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: #f5f5f5;
    }

    h1 {
        text-align: center;
        margin-bottom: 20px;
    }

    form {
        display: grid;
        grid-gap: 10px;
    }

    label {
        font-weight: bold;
    }

    input[type="text"],
    input[type="file"] {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 3px;
    }

    button[type="submit"] {
        width: 100%;
        padding: 10px;
        border: none;
        border-radius: 3px;
        background-color: #4caf50;
        color: white;
        cursor: pointer;
    }

    button[type="submit"]:hover {
        background-color: #45a049;
    }
</style>

<!-- edit.blade.php -->
<div class="container">
  <h1>Edit Room Maintenance</h1>
  <form action="{{ route('roomMaintenance.modify', ['id' => $roomMaintenance->id]) }}" method="POST">
    @csrf
    @method('PUT')
    <div>
      <label for="room_number">Room Number:</label>
      <input type="text" name="room_number" id="room_number" value="{{ $roomMaintenance->room_number }}">
    </div>
    <div>
      <label for="student_id">Student ID:</label>
      <input type="text" name="student_id" id="student_id" value="{{ $roomMaintenance->student_id }}">
    </div>
    <div>
      <label for="maintenance_type">Maintenance Type:</label>
      <input type="text" name="maintenance_type" id="maintenance_type" value="{{ $roomMaintenance->maintenance_type }}">
    </div>
    <div>
      <label for="urgency">Urgency:</label>
      <input type="text" name="urgency" id="urgency" value="{{ $roomMaintenance->urgency }}">
    </div>
    <div>
      <label for="contact">Contact:</label>
      <input type="text" name="contact" id="contact" value="{{ $roomMaintenance->contact }}">
    </div>
    <div>
      <label for="attachment">Attachment:</label>
      <input type="file" name="attachment" id="attachment">
    </div>
    <!-- Add other fields here -->
    <button type="submit">Update</button>
  </form>
</div>
</body>
</html>