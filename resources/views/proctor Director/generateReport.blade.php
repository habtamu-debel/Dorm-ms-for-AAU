<!DOCTYPE html>
<html>
<head>
  <title>Generate Report</title>
  <link rel="stylesheet" type="text/css" href="{{ asset('css/styles.css') }}">
</head>
<body>
  <div class="register">
    <h1>Create Daily Report</h1>

    <form id="reportForm" action="{{ route('reports.store') }}" method="POST">
      @csrf
      <!-- Add this code to display the error message -->
      @if ($errors->any())
        <div class="error-message">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <label for="resourceExist">Number of Resources:</label>
      <input type="number" id="resourceExist" name="resourceExist"  value="{{ old('resourceExist') }}" required>

      <label for="numCases">Number of Cases:</label>
      <input type="number" id="numCases" name="numCases" value="{{ old('numCases') }}" required>

      <label for="numDamages">Number of Damages:</label>
      <input type="number" id="numDamages" name="numDamages"  value="{{ old('numDamages') }}"  required>

      <input type="submit" value="Submit Report">
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
      border: 2px;
      box-shadow: 0 0 5px rgba(73, 98, 209, 0.5);
      width: 500px;
      padding: 20px;
      margin: 0 auto;
    }

    label {
      display: block;
      margin-top: 10px;
    }

    input[type="number"],
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
      margin-bottom: 10px;
    }
  </style>

  <script>
     $(function() {
        $("#reportId").datepicker();
    });

    </script>

</body>
</html>