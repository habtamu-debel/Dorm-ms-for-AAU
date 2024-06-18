<!-- adminStaffs.blade.php -->
<!DOCTYPE html>
<html>
<head>
  <title>Navigation Bar, Proctor Info, and Footer Example</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/css/bootstrap.min.css">
  <!-- <link rel="stylesheet" href="{{ asset('css/adminHome.css') }}"> -->
</head>
<body>
<!-- adminStaffs.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Staff List</title>
    <!-- Add your CSS and JavaScript files here -->
</head>
<body>
    <h1>Staff List</h1>

    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <!-- Add more columns as per your staff table structure -->
            </tr>
        </thead>
        <tbody>
            @foreach ($staffs as $staff)
                <tr>
                    <td>{{ $staff->name }}</td>
                    <td>{{ $staff->email }}</td>
                    <!-- Display more columns as per your staff table structure -->
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Add any additional HTML, CSS, or JavaScript as needed -->
</body>
</html>
</body>
</html>