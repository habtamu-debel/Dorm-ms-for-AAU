<!-- showStaffs.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Staff List</title>
</head>
<body>
<title>Staff List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h1 {
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ccc;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #f9f9f9;
        }
    </style>

    <table>
        <thead>
            <tr>
                <th>Staff ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Role</th>
                <th>Campus</th>
            </tr>
        </thead>
        <tbody>
            @foreach($staffs as $staff)
            <tr>
                <td>{{ $staff->staffid }}</td>
                <td>{{ $staff->firstname }}</td>
                <td>{{ $staff->lastname }}</td>
                <td>{{ $staff->email }}</td>
                <td>{{ $staff->phone }}</td>
                <td>{{ $staff->role }}</td>
                <td>{{ $staff->campus }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>