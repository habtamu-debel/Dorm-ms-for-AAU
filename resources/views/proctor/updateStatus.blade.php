




<!DOCTYPE html>
<html>
<head>
  <title>Navigation Bar, Proctor Info, and Footer Example</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="{{ asset('css/proctorHome.css') }}">
</head>
<body>
<style>
    .form-container {
        max-width: 400px;
        margin: 0 auto;
        padding: 20px;
        background-color: #f8f8f8;
        border-radius: 5px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .form-container label {
        display: block;
        margin-bottom: 8px;
        font-weight: bold;
        color: #333;
    }

    .form-container select {
        width: 100%;
        padding: 10px;
        margin-bottom: 20px;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 16px;
        color: #555;
    }

    .form-container button {
        display: block;
        width: 100%;
        padding: 10px;
        border: none;
        border-radius: 4px;
        background-color: #4caf50;
        color: #fff;
        font-size: 16px;
        cursor: pointer;
    }

    .form-container button:hover {
        background-color: #45a049;
    }

    tr.status-pending {
  background-color: yellow;
}

tr.status-executed {
  background-color: green;
  color: white;
}

tr.status-fail {
  background-color: red;
  color: white;
}
</style>

<div class="form-container">
    <form action="{{ route('room-maintenance.update-status', $roomMaintenance->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="status">Status:</label>
        <select name="status" id="status">
            <option value="pending" {{ $roomMaintenance->status === 'pending' ? 'selected' : '' }}>Pending</option>
            <option value="fail" {{ $roomMaintenance->status === 'fail' ? 'selected' : '' }}>Fail</option>
            <option value="executed" {{ $roomMaintenance->status === 'executed' ? 'selected' : '' }}>Executed</option>
        </select>

        <button type="submit">Update Status</button>
    </form>
</div>
<script>
$(document).ready(function() {
    $('#update-status-form').on('submit', function(e) {
        e.preventDefault();

        // Get the selected status value
        var selectedStatus = $('#status').val();

        // Reset background color and text color for all status options
        $('tr').css('background-color', '').css('color', '');

        // Update the background color or text color based on the selected status
        if (selectedStatus === 'fail') {
            $('tr.status-fail').css('background-color', 'red').css('color', 'white');
        } else if (selectedStatus === 'executed') {
            $('tr.status-executed').css('background-color', 'green').css('color', 'white');
        } else if (selectedStatus === 'pending') {
            $('tr.status-pending').css('background-color', 'yellow');
        }

        // Submit the form
        this.submit();
    });
});
</script>
<body>
</body>