<!DOCTYPE html>
<html>
<head>
  <title>Navigation Bar, Proctor Info, and Footer Example</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <style>
    /* Navigation Bar Styles */
    nav {
      background-color: #333;
      color: #fff;
      padding: 10px;
    }

    nav a {
      color: #fff;
      text-decoration: none;
      margin-right: 20px;
    }

    nav a:hover {
      color: #ccc;
    }

    /* Proctor Information Styles */
    .proctor-info {
      background-color: #f2f2f2;
      padding: 20px;
      margin-bottom: 20px;
    }

    .proctor-info h3 {
      margin-top: 0;
    }

    /* Footer Styles */
    footer {
      background-color: #333;
      color: #fff;
      padding: 10px;
      text-align: center;
    }

    /* Table Styles */
    table {
      width: 100%;
      border-collapse: collapse;
      font-family: Arial, sans-serif;
    }

    table th, table td {
      padding: 10px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }

    table th {
      background-color: #f2f2f2;
    }

    table tr:hover {
      background-color: #f5f5f5;
    }
    .badge-success {
    color: #fff;
    background-color: #28a745;
    font-size:17px;
}

.btn {
  display: inline-block;
  font-weight: 400;
  color: #fff;
  text-align: center;
  vertical-align: middle;
  cursor: pointer;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
  background-color: #007bff;
  border: 1px solid #007bff;
  padding: 0.5rem 1rem;
  font-size: 1rem;
  line-height: 1.5;
  border-radius: 0.25rem;
  transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}

.btn:hover {
  color: #fff;
  background-color: #0056b3;
  border-color: #004a99;
}

.btn:focus, .btn.focus {
  outline: 0;
  box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.5);
}

  </style>
  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
  <!-- resources/views/students/index.blade.php -->

    <h1>All Students</h1>

    @if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<!-- Rest of the page content -->

    <div class="row mb-3">
        <div class="col-md-4">
            <input type="text" class="form-control" id="yearFilter" placeholder="Filter by Year">
        </div>
        <div class="col-md-4">
            <input type="text" class="form-control" id="departmentFilter" placeholder="Filter by Department">
        </div>
        <div class="col-md-4">
            <input type="text" class="form-control" id="studentIdFilter" placeholder="Filter by Student ID">
        </div>
    </div>
    <form action="{{ route('PDsend-filtered-students') }}" method="POST">
       
    @csrf
    <table id="studentsTable" class="table table-striped table-hover">
        <thead>
            <tr>
                <th><input type="checkbox" id="selectAll" onclick="toggleSelectAll()"> Select All</th>
                <th>Student ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Department</th>
                <th>Year</th>
                <th>Sex</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
            <tr>
            <td><input type="checkbox" class="studentCheckbox" name="student_ids[]" value="{{ $student->student_id }}"></td>
                <td>{{ $student->student_id }}</td>
                <td>{{ $student->firstname }}</td>
                <td>{{ $student->lastname }}</td>
                <td>{{ $student->department }}</td>
                <td>{{ $student->year }}</td>
                <td>{{ $student->sex }}</td>
                <td>
    @if ($student->pdstatus == 'sent')
        <span class="badge badge-success" style="width: 70px; height: 30px;">{{ $student->pdstatus }}</span>
    @else
        {{ $student->pdstatus }}
    @endif
</td>
</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <button type="submit" class="btn">Send Filtered Students</button>
</form>

<script>
  // Add an event listener to the input fields
  const yearInput = document.getElementById('yearFilter');
const departmentInput = document.getElementById('departmentFilter');
const studentIdInput = document.getElementById('studentIdFilter');

yearInput.addEventListener('input', filterTable);
departmentInput.addEventListener('input', filterTable);
studentIdInput.addEventListener('input', filterTable);


// Function to filter the table
function filterTable() {
    const yearFilter = yearInput.value.toLowerCase();
    const departmentFilter = departmentInput.value.toLowerCase();
    const studentIdFilter = studentIdInput.value.toLowerCase();

    const table = document.getElementById('studentsTable');
    const rows = table.getElementsByTagName('tr');

    // Loop through the rows and hide/show based on the filters
    for (let i = 1; i < rows.length; i++) {
        const row = rows[i];
        const year = row.cells[5].textContent.toLowerCase();
        const department = row.cells[4].textContent.toLowerCase();
        const studentId = row.cells[1].textContent.toLowerCase();

        let shouldShow = true;

        if (yearFilter && year.indexOf(yearFilter) === -1) {
            shouldShow = false;
        }

        if (departmentFilter && department.indexOf(departmentFilter) === -1) {
            shouldShow = false;
        }

        if (studentIdFilter && studentId.indexOf(studentIdFilter) === -1) {
            shouldShow = false;
        }

        row.style.display = shouldShow ? '' : 'none';
    }

    // Show/hide the "not found" message
    const notFoundMessage = document.getElementById('notFoundMessage');
    const visibleRows = Array.from(rows).slice(1).filter(row => row.style.display !== 'none');
    notFoundMessage.classList.toggle('d-none', visibleRows.length > 0);
}
   
function toggleSelectAll() {
  // Get the "Select All" checkbox
  var selectAllCheckbox = document.getElementById("selectAll");

  // Get all the checkboxes in the table
  var checkboxes = document.querySelectorAll("input[type='checkbox'].studentCheckbox");

  // Loop through all the checkboxes and set their checked state
  // based on the "Select All" checkbox's state and the row's display state
  for (var i = 0; i < checkboxes.length; i++) {
    var row = checkboxes[i].parentNode.parentNode;
    checkboxes[i].checked = selectAllCheckbox.checked && row.style.display !== 'none';
  }
}
</script>

</body>
</html>