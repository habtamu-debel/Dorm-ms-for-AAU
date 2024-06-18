<!DOCTYPE html>
<html>
<head>
  <title>Reports</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{ asset('css/proctorHome.css') }}">

  <style>
    /* CSS (styles.css) */

    /* Container */
    .container {
      max-width: 800px;
      margin: 0 auto;
      padding: 20px;
    }

    /* Report list */
    .report-list {
      list-style: none;
      padding: 0;
    }

    /* Report item */
    .report-item {
      background-color: #f9f9f9;
      border: 1px solid #e5e5e5;
      border-radius: 4px;
      padding: 10px;
      margin-bottom: 20px;
    }

    /* Report ID */
    .report-id {
      font-weight: bold;
      margin-bottom: 10px;
    }

    /* Report data */
    .report-data {
      display: flex;
      align-items: center;
      margin-bottom: 5px;
    }

    /* Label */
    .label {
      display: inline-block;
      width: 150px;
      font-weight: bold;
      color: #666;
    }

    /* Value */
    .value {
      margin-left: 10px;
    }

    /* No reports message */
    .no-reports-message {
      color: #999;
      font-style: italic;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Reports</h1>

    @if($reports->isEmpty())
      <p class="no-reports-message">No reports available.</p>
    @else
      <ul class="report-list">
        @foreach($reports as $report)
          <li class="report-item">
            <div class="report-id">Report ID: {{ $report->reportId }}</div>
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
          </li>
        @endforeach
      </ul>
    @endif
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    // JavaScript
    $(document).ready(function() {
      // Add hover effect to report items
      $('.report-item').hover(
        function() {
          $(this).addClass('hovered');
        },
        function() {
          $(this).removeClass('hovered');
        }
      );
    });
  </script>
</body>
</html>