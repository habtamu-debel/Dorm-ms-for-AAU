<!DOCTYPE html>
<html>
<head>
  <title>Generate Report</title>
  <link rel="stylesheet" type="text/css" href="{{ asset('css/styles.css') }}">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.min.js"></script>
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
</head>
<body>
  <div class="register">
    <h1>Create Daily Report</h1>

    <form id="reportForm" action="{{ route('reports.store') }}" method="POST">
      @csrf
      <div class="form-group">
        <label for="reportId">Report Day:</label>
        <input type="text" id="reportId" name="reportId" required>
        @if ($errors->has('reportId'))
          <span class="error-message">{{ $errors->first('reportId') }}</span>
        @endif
      </div>

      <div class="form-group">
        <label for="resourceExist">Number of Resources:</label>
        <input type="number" id="resourceExist" name="resourceExist" value="{{ old('resourceExist') }}" required>
        @if ($errors->has('resourceExist'))
          <span class="error-message">{{ $errors->first('resourceExist') }}</span>
        @endif
      </div>

      <div class="form-group">
        <label for="numCases">Number of Cases:</label>
        <input type="number" id="numCases" name="numCases" value="{{ old('numCases') }}" required>
        @if ($errors->has('numCases'))
          <span class="error-message">{{ $errors->first('numCases') }}</span>
        @endif
      </div>

      <div class="form-group">
        <label for="numDamages">Number of Damages:</label>
        <input type="number" id="numDamages" name="numDamages" value="{{ old('numDamages') }}" required>
        @if ($errors->has('numDamages'))
          <span class="error-message">{{ $errors->first('numDamages') }}</span>
        @endif
      </div>

      <div class="form-group">
        <input type="submit" value="Submit Report">
      </div>
    </form>
  </div>

  <style>
    /* CSS (styles.css) */

    body {
      font-family: Arial, sans-serif;
      margin: 20px;
    }

    h1 {
      text-align: center;
    }

    .register {
      padding: 30px;
    }

    #reportForm {
      border: 2px solid #4962d1;
      box-shadow: 0 0 5px rgba(73, 98, 209, 0.5);
      width: 500px;
      padding: 20px;
      margin: 0 auto;
    }

    .form-group {
      margin-bottom: 15px;
    }

    label {
      display: block;
    }

    input[type="number"],
    input[type="text"],
    input[type="submit"] {
      width: 100%;
      padding: 5px;
      margin-top: 5px;
    }

    input[type="submit"] {
      background-color: #4CAF50;
      color: white;
      cursor: pointer;
    }

    input[type="submit"]:hover {
      background-color: #45a049;
    }

    .error-message {
      color: red;
      font-size: 14px;
    }
  </style>

  <script>
    $(function() {
      var today = new Date();
      var dd = String(today.getDate()).padStart(2, '0');
      var mm = String(today.getMonth() + 1).padStart(2, '0');
      var yyyy = today.getFullYear();

      $('#reportId').val(yyyy + '-' + mm + '-' + dd);
    });
  </script>
</body>
</html>