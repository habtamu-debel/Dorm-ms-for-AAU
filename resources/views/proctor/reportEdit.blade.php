<!-- resources/views/reports/edit.blade.php -->
<!DOCTYPE html>
<html>
<head>
  <title>Navigation Bar, Proctor Info, and Footer Example</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="{{ asset('css/proctorHome.css') }}">
</head>
<body>
    <style>
        /* styles.css */

h1 {
  font-size: 24px;
  margin-bottom: 20px;
}

form {
  max-width: 400px;
  margin: 0 auto;
}

.form-group {
  margin-bottom: 15px;
}

label {
  display: block;
  font-weight: bold;
  margin-bottom: 5px;
}

input[type="text"] {
  width: 100%;
  padding: 8px;
  border: 1px solid #ccc;
  border-radius: 4px;
}

button[type="submit"] {
  padding: 8px 15px;
  background-color: #4287f5;
  color: #fff;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

button[type="submit"]:hover {
  background-color: #1e5aae;
}
        </style>
<h1>Edit Report</h1>

<form action="{{ route('reports.update', $report->reportId) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="resourceExist">Number of Resources:</label>
        <input type="text" name="resourceExist" id="resourceExist" value="{{ $report->resourceExist }}">
    </div>

    <div class="form-group">
        <label for="numCases">Number of Cases:</label>
        <input type="text" name="numCases" id="numCases" value="{{ $report->numCases }}">
    </div>

    <div class="form-group">
        <label for="numDamages">Number of Damages:</label>
        <input type="text" name="numDamages" id="numDamages" value="{{ $report->numDamages }}">
    </div>

    <button type="submit">Update</button>
</form>
</body>
</html>