<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/css/bootstrap.min.css">
    <title>Staffs Table</title>
</head>
<body>
<style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        
        h1 {
            text-align: center;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        
        th {
            background-color: #f2f2f2;
        }
        
        .action-buttons {
            display: flex;
            gap: 5px;
        }
        
        .action-buttons form {
            display: inline;
        }
    </style>
    <h1>Staffs Table</h1>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Password</th>
                <th>Phone</th>
                <th>Campus</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($staffs as $staff)
            <tr>
                <td>{{ $staff->staffid }}</td>
                <td>{{ $staff->firstname }}</td>
                <td>{{ $staff->lastname }}</td>
                <td>{{ $staff->email }}</td>
                <td>{{ $staff->password }}</td>
                <td>{{ $staff->phone }}</td>
                <td>{{ $staff->campus }}</td>
                <td class="action-buttons">
                    <!-- Edit Button -->
                    <a href="{{ route('staffs.edit', ['staff' => $staff->staffid]) }}" class="btn btn-primary">Edit</a>
                    
                    <!-- Delete Button -->
                    <form action="{{ route('staffs.destroy', $staff->staffid) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>