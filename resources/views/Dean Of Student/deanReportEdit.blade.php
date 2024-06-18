<!DOCTYPE html>
<html>
<head>
  <title>Update PM Report</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{ asset('css/proctorManagerHome.css') }}">
</head>

<style>
    /* Apply basic styling to form elements */
    .container {
        border: 2px;
        display: flex;
        justify-content: center;
        align-items: center;
        height:900px;;
        width:500px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    }
    
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

    input[type="number"],
    input[type="text"] {
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 4px;
        width:400px;
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

<body>
    <div class="container">
        <form action="{{ route('deanReport.update', $pmReport->id) }}" method="POST">
            @csrf
            @method('PUT')
            <h2>Edit Report</h2>

            <!-- Display the form fields for editing -->
            <div>
                <label for="numStudentsAllocated">Number of Students Allocated:</label>
                <input type="number" name="numStudentsAllocated" value="{{ old('numStudentsAllocated', $pmReport->numStudentsAllocated) }}">
            </div>

            <div>
                <label for="numStudentClearanced">Number of Student Clearanced:</label>
                <input type="number" name="numStudentClearanced" value="{{ old('numStudentClearanced', $pmReport->numStudentClearanced) }}">
            </div>

            <div>
                <label for="numMaintenances">Number of Maintenances:</label>
                <input type="number" name="numMaintenances" value="{{ old('numMaintenances', $pmReport->numMaintenances) }}">
            </div>

            <div>
                <label for="numSevereMaintenances">Number of Severe Maintenances:</label>
                <input type="number" name="numSevereMaintenances" value="{{ old('numSevereMaintenances', $pmReport->numSevereMaintenances) }}">
            </div>

            <div>
    <label for="DormsCleaning">Dorms Cleaning:</label>
    <select name="DormsCleaning">
        <option value="low" {{ $pmReport->DormsCleaning == 'low' ? 'selected' : '' }}>Low</option>
        <option value="medium" {{ $pmReport->DormsCleaning == 'medium' ? 'selected' : '' }}>Medium</option>
        <option value="high" {{ $pmReport->DormsCleaning == 'high' ? 'selected' : '' }}>High</option>
    </select>
</div>

<div>
    <label for="statusOfservices">Status of Services:</label>
    <select name="statusOfservices">
        <option value="good" {{ $pmReport->statusOfservices == 'good' ? 'selected' : '' }}>Good</option>
        <option value="bad" {{ $pmReport->statusOfservices == 'bad' ? 'selected' : '' }}>Bad</option>
        <option value="worst" {{ $pmReport->statusOfservices == 'worst' ? 'selected' : '' }}>Worst</option>
    </select>
</div>

            <div>
                <label for="numFreeDorms">Number of Free Dorms:</label>
                <input type="number" name="numFreeDorms" value="{{ old('numFreeDorms', $pmReport->numFreeDorms) }}">
            </div>

            <!-- Add more form fields for additional attributes -->

            <button type="submit">Update</button>
        </form>
    </div>
</body>
</html>