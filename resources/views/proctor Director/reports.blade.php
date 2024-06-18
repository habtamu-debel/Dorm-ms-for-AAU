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
        <form id="pmReportForm" action="{{ route('directorReport.store') }}" method="POST">
            <h1>PM Report Form</h1>
            @csrf

            <div class="form-group">
                <label for="numStudentsAccepted">Number of Students Accepted:</label>
                <input type="number" id="numStudentsAccepted" name="numStudentsAccepted" required>
                <span class="error-message" id="numStudentsAcceptedError"></span>
            </div>

            <div class="form-group">
                <label for="numStudentsAllocated">Number of Students Allocated:</label>
                <input type="number" id="numStudentsAllocated" name="numStudentsAllocated" required>
                <span class="error-message" id="numStudentsAllocatedError"></span>
            </div>

            <div class="form-group">
                <label for="numStudentClearanced">Number of Student Clearanced:</label>
                <input type="number" id="numStudentClearanced" name="numStudentClearanced" required>
                <span class="error-message" id="numStudentClearancedError"></span>
            </div>

            <div class="form-group">
                <label for="numFreeDorms">Number of Free Dorms:</label>
                <input type="number" id="numFreeDorms" name="numFreeDorms" required>
                <span class="error-message" id="numFreeDormsError"></span>
            </div>

            <button type="submit">Submit</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // JavaScript code here
        $(document).ready(function() {
            $('#pmReportForm').submit(function(e) {
                e.preventDefault(); // Prevent form submission

                // Validate form inputs
                var isValid = true;




                var numStudentsAllocated = $('#numStudentsAccepted').val();
                if (numStudentsAllocated.trim() === '') {
                    $('#numStudentsAcceptedError').text('Please enter the number of students allocated.');
                    isValid = false;
                } else {
                    $('#numStudentsAcceptedError').text('');
                }

                // Validate number of students allocated
                var numStudentsAllocated = $('#numStudentsAllocated').val();
                if (numStudentsAllocated.trim() === '') {
                    $('#numStudentsAllocatedError').text('Please enter the number of students allocated.');
                    isValid = false;
                } else {
                    $('#numStudentsAllocatedError').text('');
                }

                // Validate number of student clearanced
                var numStudentClearanced = $('#numStudentClearanced').val();
                if (numStudentClearanced.trim() === '') {
                    $('#numStudentClearancedError').text('Please enter the number of student clearanced.');
                    isValid = false;
                } else {
                    $('#numStudentClearancedError').text('');
                }
                
                // Validate number of free dorms
                var numFreeDorms = $('#numFreeDorms').val();
                if (numFreeDorms.trim() === '') {
                    $('#numFreeDormsError').text('Please enter the number of free dorms.');
                    isValid = false;
                } else {
                    $('#numFreeDormsError').text('');
                }

                if (isValid) {
                    // If form is valid, submit the form
                    $(this).unbind('submit').submit();
                }
            });
        });
    </script>
</body>
</html>