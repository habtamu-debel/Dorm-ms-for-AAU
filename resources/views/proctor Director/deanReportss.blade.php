<!DOCTYPE html>
<html>
<head>
  <title>List of Reports</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{ asset('css/proctorManagerHome.css') }}">
</head>

<style>
  /* Custom CSS */

  /* Container */
  .container {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
  }

  /* Table */
  table {
    width: 100%;
    border-collapse: collapse;
  }

  table th, table td {
    padding: 10px;
    text-align: left;
    border-bottom: 1px solid #ddd;
  }

  table th {
    background-color: #f2f2f2;
  }

  table tbody tr:nth-child(even) {
    background-color: #f9f9f9;
  }

  table tbody tr:hover {
    background-color: #e9e9e9;
  }

  table td a {
    margin-right: 5px;
    color: #007bff;
    text-decoration: none;
  }

  table td a:hover {
    text-decoration: underline;
  }

  table td form {
    display: inline;
  }

  table td button {
    padding: 5px 10px;
    background-color: #dc3545;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
  }

  table td button:hover {
    background-color: #c82333;
  }
</style>

<body>
  <div class="container">
    <h2>List of Reports</h2>

    <table>
      <thead>
        <tr>
          <th>Number of Students</th>
          <th>Number of Cases</th>
          <th>Number of Maintenances</th>
          <th>Number of Severe Maintenances</th>
          <th>Number of Dorms Cleaning</th>
          <th>status Of services</th>
          <th>number of FreeDorms</th>
          
        </tr>
      </thead>
      <tbody>
        @foreach($pmReports as $pmReport)
          <tr>
            <td>{{ $pmReport->numStudentsAllocated }}</td>
            <td>{{ $pmReport->numStudentClearanced }}</td>
            <td>{{ $pmReport->numMaintenances }}</td>
            <td>{{ $pmReport->numSevereMaintenances }}</td>
            <td>{{ $pmReport->DormsCleaning }}</td>
            <td>{{ $pmReport->statusOfservices }}</td>
            <td>{{ $pmReport->numFreeDorms }}</td>
           
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    // JavaScript
    $(document).ready(function() {
      // Add hover effect to table rows
      $('table tbody tr').hover(
        function() {
          $(this).addClass('hovered');
        },
        function() {
          $(this).removeClass('hovered');
        }
      );

      // Confirm delete
      $('table td form').submit(function(e) {
        e.preventDefault();

        var form = this;
        var confirmMessage = "Are you sure you want to delete?";

        if (confirm(confirmMessage)) {
          form.submit();
        }
      });
    });
  </script>

</body>
</html>