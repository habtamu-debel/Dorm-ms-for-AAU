<!DOCTYPE html>
<html>
<head>
  <title>Navigation Bar, Proctor Info, and Footer Example</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="{{ asset('css/proctorHome.css') }}">
  <style>
    /* CSS (styles.css) */

    body {
      font-family: Arial, sans-serif;
      background-color: #f8f8f8;
    }

    .container {
      max-width: 800px;
      margin: 0 auto;
      padding: 20px;
      background-color: #fff;
      border-radius: 5px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    h1 {
      font-size: 24px;
      margin-bottom: 20px;
      text-align: center;
    }

    .report-list {
      list-style: none;
      padding: 0;
    }

    .report-item {
      background-color: #f9f9f9;
      border: 1px solid #e5e5e5;
      border-radius: 4px;
      padding: 10px;
      margin-bottom: 10px;
    }

    .report-id {
      font-weight: bold;
      margin-bottom: 5px;
    }

    .report-data {
      display: flex;
      align-items: center;
      margin-bottom: 5px;
    }

    .label {
      display: inline-block;
      width: 150px;
      font-weight: bold;
      color: #666666;
    }

    .value {
      margin-left: 10px;
    }

    .no-reports {
      color: #999999;
      font-style: italic;
      text-align: center;
    }

    .buttons {
      display: flex;
      justify-content: flex-end;
      margin-top: 10px;
    }

    .edit-button,
    .delete-button {
      display: inline-block;
      padding: 8px 12px;
      border-radius: 3px;
      font-size: 14px;
      font-weight: bold;
      text-decoration: none;
      color: #fff;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    .edit-button {
      background-color: #007bff;
      margin-right: 10px;
    }

    .delete-button {
      background-color: #dc3545;
    }

    .edit-button:hover,
    .delete-button:hover {
      background-color: #0056b3;
    }

    .edit-button:focus,
    .delete-button:focus {
      outline: none;
    }
  </style>
</head>
<body>
<div class="container">
  <h1>Reports</h1>

  @if($reports->isEmpty())
    <p class="no-reports">No reports available.</p>
  @else
    <ul class="report-list">
      @foreach($reports as $report)
        <li class="report-item">
          <div class="report-id">Report ID: {{ $report->reportId->format('Y-m-d') }} </div>
          <div class="report-data">
            <span class="label">Number of Resources:</span>
            <span class="value">{{ $report->resourceExist }}</span>
          </div>
          <div class="report-data">
            <span class="label">Number of Cases:</span>
            <span class="value">{{ $report->numCases }}</span>
          </div>
          <div class="report-data">
            <span class="label">Number of Damages:</span>
            <span class="value">{{ $report->numDamages }}</span>
          </div>

          <div class="buttons">
            <a href="{{ route('reports.edit', $report->reportId) }}" class="edit-button">Edit</a>
            <form action="{{ route('reports.destroy', $report->reportId) }}" method="POST" class="delete-form">
              @csrf
              @method('DELETE')
              <button type="submit" class="delete-button">Delete</button>
            </form>
          </div>
        </li>
      @endforeach
    </ul>
  @endif
</div>


 


<script>
  // JavaScript

  // Confirm before deleting a report
  const deleteForms = document.querySelectorAll('.delete-form');

  deleteForms.forEach(form => {
    form.addEventListener('submit', (event) => {
      const confirmDelete = confirm('Are you sure you want to delete this report?');

      if (!confirmDelete) {
        event.preventDefault();
      }
    });
  });
</script>
</body>
</html>