

<!DOCTYPE html>
<html>
<head>
  <title>Navigation Bar, Proctor Info, and Footer Example</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{ asset('css/proctorManagerHome.css') }}">
</head>

<style>
    /* Apply basic styling to form elements */
form {
  max-width: 400px;
  margin: 0 auto;
}

div {
  margin-bottom: 20px;
}

label {
  display: block;
  font-weight: bold;
  margin-bottom: 5px;
}

input[type="number"] {
  padding: 8px;
  border: 1px solid #ccc;
  border-radius: 4px;
}

button[type="submit"] {
  padding: 10px 20px;
  background-color: #4CAF50;
  color: #fff;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

button[type="submit"]:hover {
  background-color: #45a049;
}
    </style>

<form action="{{ route('pmreports.update', $pmReport->id) }}" method="POST">
    @csrf
    @method('PUT')

    <!-- Display the form fields for editing -->
    <div>
        <label for="numStudents">Number of Students:</label>
        <input type="number" name="numStudents" value="{{ old('numStudents', $pmReport->numStudents) }}">
    </div>

    <div>
        <label for="numCases">Number of Cases:</label>
        <input type="number" name="numCases" value="{{ old('numCases', $pmReport->numCases) }}">
    </div>

    <div>
        <label for="numMaintenances">Number of Maintenances:</label>
        <input type="number" name="numMaintenances" value="{{ old('numMaintenances', $pmReport->numMaintenances) }}">
    </div>

    <div>
        <label for="numDormsCleaning">Number of Dorms Cleaning:</label>
        <input type="number" name="numDormsCleaning" value="{{ old('numDormsCleaning', $pmReport->numDormsCleaning) }}">
    </div>

    <!-- Add more form fields for additional attributes -->

    <button type="submit">Update</button>
</form>
</body>
</html>