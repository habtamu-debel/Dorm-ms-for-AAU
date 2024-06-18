<!DOCTYPE html>
<html>
<head>
    <title>PM Report Form</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <style>
  body {
    font-family: Arial, sans-serif;
    margin: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    min-height: 100vh;
    background-color: #f2f2f2;
}

.container {
    max-width: 500px;
    width: 100%;
    padding: 20px;
    border:2px;
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    transition: box-shadow 0.3s ease;
}

.container:hover {
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
}

h1 {
    color: #333;
    text-align: center;
    margin-bottom: 30px;
}

.form-group {
    margin-bottom: 20px;
}

label {
    display: block;
    font-weight: bold;
    margin-bottom: 5px;
}

input[type="number"] {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 3px;
    transition: border-color 0.3s ease;
}

input[type="number"]:focus {
    border-color: #4CAF50;
}

.error-message {
    margin-top: 5px;
    color: #dc3545;
    font-size: 14px;
}

button[type="submit"] {
    display: block;
    width: 100%;
    padding: 10px;
    background-color: #4CAF50;
    color: #fff;
    border: none;
    border-radius: 3px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

button[type="submit"]:hover {
    background-color: #45a049;
}

@media (max-width: 600px) {
    .container {
        padding: 15px;
    }
}
    </style>
    
<div class="container">
    <form id="pmReportForm" action="{{ route('pmreports.store') }}" method="POST">
    <h1>PM Report Form</h1>
        @csrf
        <div class="form-group">
            <label for="numStudents">Number of Students in Dormitory:</label>
            <input type="number" id="numStudents" name="numStudents" required>
            <span class="error-message" id="numStudentsError"></span>
        </div>

        <div class="form-group">
            <label for="numCases">Number of Cases:</label>
            <input type="number" id="numCases" name="numCases" required>
            <span class="error-message" id="numCasesError"></span>
        </div>

        <div class="form-group">
            <label for="numMaintenances">Number of Maintenance Requests:</label>
            <input type="number" id="numMaintenances" name="numMaintenances" required>
            <span class="error-message" id="numMaintenancesError"></span>
        </div>

        <div class="form-group">
            <label for="numSevereMaintenances">Number of Severe Maintenance Requests:</label>
            <input type="number" id="numSevereMaintenances" name="numSevereMaintenances" required>
            <span class="error-message" id="numSevereMaintenancesError"></span>
        </div>

        <div class="form-group">
            <label for="numDormsCleaning">Number of Dorms Requiring Cleaning:</label>
            <input type="number" id="numDormsCleaning" name="numDormsCleaning" required>
            <span class="error-message" id="numDormsCleaningError"></span>
        </div>

        <button type="submit">Submit</button>
    </form>
</div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // JavaScript
        $(document).ready(function() {
            // Form Validation
            $('#pmReportForm').submit(function(e) {
                e.preventDefault();
                clearErrorMessages();

                var valid = true;

                // Validate input fields
                if (!isNumberValid('numStudents')) {
                    valid = false;
                }
                if (!isNumberValid('numCases')) {
                    valid = false;
                }
                if (!isNumberValid('numMaintenances')) {
                    valid = false;
                }
                if (!isNumberValid('numSevereMaintenances')) {
                    valid = false;
                }
                if (!isNumberValid('numDormsCleaning')) {
                    valid = false;
                }

                if (valid) {
                    // Submit the form if all fields are valid
                    this.submit();
                }
            });

            // Clear error messages
            function clearErrorMessages() {
                $('.error-message').text('');
            }

            // Validate number input
            function isNumberValid(inputId) {
                var input = $('#' + inputId);
                var value = input.val().trim();

                // Check if the input value is a positive integer
                if (value === '' || !(/^\d+$/.test(value))) {
                    $('#' + inputId + 'Error').text('Please enter a valid positive integer.');
                    input.addClass('input-error');
                    return false;
                }

                return true;
            }
        });
    </script>
</body>
</html>