
<!DOCTYPE html>
<html>
<head>
  <title>Navigation Bar, Proctor Info, and Footer Example</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/css/bootstrap.min.css">
</head>
<style>
    .form-container {
        max-width: 400px;
        margin: 0 auto;
        background-color: #f7f7f7;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .form-container h2 {
        text-align: center;
        margin-bottom: 20px;
        color: #333;
    }

    .form-container label {
        display: block;
        margin-bottom: 5px;
        color: #555;
    }

    .form-container input[type="text"],
    .form-container input[type="email"],
    .form-container input[type="password"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
        border-radius: 5px;
        border: 1px solid #ccc;
        font-size: 14px;
        color: #555;
    }

    .form-container button[type="submit"] {
        display: block;
        width: 100%;
        padding: 10px;
        background-color: #4CAF50;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 14px;
    }

    .form-container button[type="submit"]:hover {
        background-color: #45a049;
    }

    .alert {
        background-color: #f2dede;
        color: #a94442;
        padding: 10px;
        margin-bottom: 10px;
        border-radius: 5px;
        border: 1px solid #ebccd1;
    }

    .alert-success {
        background-color: #dff0d8;
        color: #3c763d;
        border-color: #d6e9c6;
    }
</style>
<body>
<form class="form-container" action="{{ route('staffs.update', $staff->staffid) }}" method="POST">
    @csrf
    @method('PUT')
    <!-- Display existing values in input fields -->
    <input type="text" name="firstname" value="{{ $staff->firstname }}">
    <input type="text" name="lastname" value="{{ $staff->lastname }}">
    <input type="email" name="email" value="{{ $staff->email }}">
    <input type="text" name="phone" value="{{ $staff->phone }}">
    <input type="text" name="campus" value="{{ $staff->campus }}">
    <!-- Add input fields for other staff attributes -->
    <button type="submit">Update</button>
</form>
</body>
</html>