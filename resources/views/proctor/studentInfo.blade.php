<!DOCTYPE html>
<html>
<head>
    <title>Student Information</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
        }

        .search-container {
            margin-bottom: 20px;
        }

        .search-container input[type="text"] {
            padding: 5px;
            width: 200px;
        }

        .search-container button {
            padding: 5px 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
    <h1>Student Information</h1>

    <div class="search-container">
        <input type="text" id="searchInput" placeholder="Search...">
        <button onclick="search()">Search</button>
    </div>

    <table id="studentTable">
        <thead>
            <tr>
                <th>Student ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Department</th>
                <th>Year</th>
                <th>Sex</th>
                <th>Region</th>
             
                <th>Zone</th>
                <th>Wereda</th>
                <th>Block</th>
                <th>Floor</th>
                <th>Room</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($students as $student)
            <tr>
                <td>{{ $student->student_id }}</td>
                <td>{{ $student->firstname }}</td>
                <td>{{ $student->lastname }}</td>
                <td>{{ $student->department }}</td>
                <td>{{ $student->year }}</td>
                <td>{{ $student->sex }}</td>
                <td>{{ $student->region }}</td>
                
                <td>{{ $student->zone }}</td>
                <td>{{ $student->wereda }}</td>
                <td>{{ $student->block}}</td>
                <td>{{ $student->floor}}</td>
                <td>{{ $student->room}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <script>
        function search() {
            // Get the search input value
            var searchInput = document.getElementById('searchInput').value.toLowerCase();

            // Get all the rows in the table body
            var rows = document.querySelectorAll('#studentTable tbody tr');

            // Loop through the rows and hide/show based on search criteria
            for (var i = 0; i < rows.length; i++) {
                var cells = rows[i].querySelectorAll('td');
                var match = false;

                // Check if any cell content matches the search input
                for (var j = 0; j < cells.length; j++) {
                    if (cells[j].textContent.toLowerCase().indexOf(searchInput) > -1) {
                        match = true;
                        break;
                    }
                }

                if (match) {
                    rows[i].style.display = '';
                } else {
                    rows[i].style.display = 'none';
                }
            }
        }

        // Function to fetch student information from the database and populate the table
        function fetchStudentInformation() {
            // Make an API request to fetch student information from the database
            // Replace this with your own API endpoint or database query
            fetch('/api/students')
                .then(response => response.json())
                .then(data => {
                    var studentTable = document.getElementById('studentTable');
                    var tbody = studentTable.querySelector('tbody');

                    // Clear existing rows
                    while (tbody.firstChild) {
                        tbody.removeChild(tbody.firstChild);
                    }

                    // Loop through the data and create table rows
                    for (var i = 0; i < data.length; i++) {
                        var row = document.createElement('tr');
                        var cells = [
                            data[i].student_id,
                            data[i].firstname,
                            data[i].lastname,
                            data[i].department,
                            data[i].year,
                            data[i].sex,
                            data[i].region,
                            data[i].disability,
                            data[i].zone,
                            data[i].wereda
                        ];

                        for (var j = 0; j < cells.length; j++) {
                            var cell = document.createElement('td');
                            cell.textContent = cells[j];
                            row.appendChild(cell);
                        }

                        tbody.appendChild(row);
                    }
                })
                .catch(error => console.log(error));
        }

        // Call the fetchStudentInformation function on page load
        fetchStudentInformation();
    </script>
</body>
</html>