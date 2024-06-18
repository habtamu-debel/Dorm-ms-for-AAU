<!-- profile.blade.php -->

<!DOCTYPE html>
<html>
<head>
  <title>Navigation Bar, Proctor Info, and Footer Example</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="{{ asset('css/proctorHome.css') }}">
</head>
<body>
<style>
    /* Form CSS */
    body {
        font-family: Arial, sans-serif;
        margin: 20px;
        background-color: #f1f1f1;
    }

    .container {
        max-width: 500px;
        margin: 0 auto;
        padding: 20px;
        background-color: #ffffff;
        border: 2px solid rgba(73, 98, 209, 0.5);
        box-shadow: 0 0 5px rgba(73, 98, 209, 0.5);
    }

    h2 {
        text-align: center;
        margin-bottom: 20px;
    }

    label {
        display: block;
        margin-top: 15px;
    }

    input[type="text"],
    input[type="number"],
    input[type="file"],
    input[type="submit"] {
        width: 100%;
        padding: 10px;
        margin-top: 5px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    input[type="checkbox"] {
        margin-top: 10px;
    }

    input[type="submit"] {
        background-color: #4CAF50;
        color: white;
        cursor: pointer;
    }

    input[type="submit"]:hover {
        background-color: #45a049;
    }

    .form-group {
        position: relative;
        margin-bottom: 1rem;
    }

    .form-group .form-control {
        /* Your input field styles */
    }

    .form-group .text-danger {
        color: red;
        font-size: 0.875rem;
        margin-top: 0.25rem;
    }
</style>

<div class="container">
    <h2>Complete Your Profile</h2>
    <form action="{{ route('profile.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="region">Region:</label>
            <input type="text" id="region" name="region" required>
        </div>

        <div class="form-group">
            <label for="wereda">Wereda:</label>
            <input type="text" id="wereda" name="wereda" required>
        </div>

        <div class="form-group">
            <label for="zone">Zone:</label>
            <input type="text" id="zone" name="zone" required>
        </div>

        <div class="form-group">
            <label for="town">Town:</label>
            <input type="text" id="town" name="town" required>
        </div>

        <div class="form-group">
            <label for="photo">Photo:</label>
            <input type="file" id="photo" name="photo" required>
        </div>

        <button type="submit" class="btn btn-primary">Complete Profile</button>
    </form>
</div>

</body>
</html>