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
  <form action="{{ route('allocate') }}" method="POST">
    @csrf
@if (session('success'))
<div class="alert alert-success"> {{ session('success') }} </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
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
        <input type="text" class="form-control" id="studentIdFilter" placeholder="Filter by Student ID" value="{{ $student_id ?? '' }}">
    </div>
</div>

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
            <th>Block</th>
            <th>Floor</th>
            <th>Room</th>
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
            <td>{{ $student->block }}</td>
            <td>{{ $student->floor }}</td>
            <td>{{ $student->room }}</td>

            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<select class="form-control" name="block_id" id="block">
    <option value="">Select Block</option>
    @foreach ($blocks as $block)
        <option value="{{ $block }}">{{ $block }}</option>
    @endforeach
</select>

<select class="form-control" name="floor_id" id="floor" disabled>
    <option value="">Select Floor</option>
</select>

<select class="form-control" name="room_id" id="room" disabled>
    <option value="">Select Room</option>
</select>

<script>
    // Function to fetch floors and rooms based on the selected block
    document.getElementById('block').addEventListener('change', function() {
        var blockId = this.value;
        var floorSelect = document.getElementById('floor');
        var roomSelect = document.getElementById('room');

        // Clear floor and room options
        floorSelect.innerHTML = '<option value="">Select Floor</option>';
        roomSelect.innerHTML = '<option value="">Select Room</option>';
        floorSelect.setAttribute('disabled', 'disabled');
        roomSelect.setAttribute('disabled', 'disabled');

        if (blockId) {
            // Fetch floors and rooms for the selected block via AJAX
            fetch('/api/floors-and-rooms/' + blockId)
                .then(response => response.json())
                .then(data => {
                    // Populate floor options
                    data.floors.forEach(floor => {
                        var option = document.createElement('option');
                        option.value = floor;
                        option.textContent = floor;
                        floorSelect.appendChild(option);
                    });
                    floorSelect.removeAttribute('disabled');

                    // Populate room options
                    data.rooms.forEach(room => {
                        var option = document.createElement('option');
                        option.value = room;
                        option.textContent = room;
                        roomSelect.appendChild(option);
                    });
                    roomSelect.removeAttribute('disabled');
                })
                .catch(error => console.error('Error fetching floors and rooms:', error));
        }
    });
</script>


<button type="submit" class="btn btn-primary">Update Student Allocation</button>
</form>
    
</div>


<script>
const form = document.getElementById('allocate-form');
const studentCheckboxes = document.querySelectorAll('.studentCheckbox');
const blockSelects = document.querySelectorAll('[name="block_id"]');
const floorSelects = document.querySelectorAll('[name="floor_id"]');
const roomSelects = document.querySelectorAll('[name="room_id"]');

form.addEventListener('submit', (event) => {
    event.preventDefault();

    // Collect the selected student IDs, block IDs, floor IDs, and room IDs
    const studentIds = Array.from(studentCheckboxes)
        .filter(checkbox => checkbox.checked)
        .map(checkbox => checkbox.value);
    const blockIds = Array.from(blockSelects)
        .map(select => select.value);
    const floorIds = Array.from(floorSelects)
        .map(select => select.value);
    const roomIds = Array.from(roomSelects)
        .map(select => select.value);

    // Add the collected data to the form
    const formData = new FormData(form);
    formData.set('student_ids', JSON.stringify(studentIds));
    formData.set('block_id', JSON.stringify(blockIds));
    formData.set('floor_id', JSON.stringify(floorIds));
    formData.set('room_id', JSON.stringify(roomIds));

    // Submit the form
    form.submit();
});

// Add an event listener to the input fields
const yearInput = document.getElementById('yearFilter');
const departmentInput = document.getElementById('departmentFilter');
const studentIdInput = document.getElementById('studentIdFilter');
yearInput.addEventListener('input', filterTable);
departmentInput.addEventListener('change', filterTable);
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