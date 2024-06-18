@extends('students.manageRequest')

@section('content')
    
<!DOCTYPE html>
<html>
<head>
    <title>Room Maintenance Form</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
</head>
<body>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f5f5f5;
        }
        
        h1 {
            text-align: center;
            color: #333;
        }
        
        form {
            max-width: 500px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 6px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        label {
            display: block;
            margin-bottom: 5px;
            color: #555;
            font-weight: bold;
        }
        
        input[type="text"],
        input[type="file"],
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            transition: border-color 0.3s ease;
        }
        
        input[type="text"]:focus,
        input[type="file"]:focus,
        textarea:focus {
            border-color: #4CAF50;
        }
        
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            transition: border-color 0.3s ease;
        }
        
        select:focus {
            border-color: #4CAF50;
        }
        
        button[type="submit"] {
            padding: 12px 24px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }
        
        button[type="submit"]:hover {
            background-color: #45a049;
        }
        
        .error-message {
            color: red;
            margin-top: 5px;
        }
        
        @media screen and (max-width: 600px) {
            form {
                padding: 10px;
            }
            
            input[type="text"],
            input[type="file"],
            textarea,
            select {
                padding: 8px;
            }
            
            button[type="submit"] {
                padding: 10px 20px;
                font-size: 14px;
            }
        }
    </style>
  
    <h1>Resource Exit Form</h1>
    <form action="{{ route('resource-exit.store') }}" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
    @csrf

    <div class="form-group">
        <label for="student_first_name">Student First Name:</label>
        <input type="text" id="student_first_name" name="student_first_name" value="{{ old('student_first_name') }}">
        <div id="student_first_name_error" class="error-message"></div>
    </div>

    <div class="form-group">
        <label for="student_last_name">Student Last Name:</label>
        <input type="text" id="student_last_name" name="student_last_name" value="{{ old('student_last_name') }}">
        <div id="student_last_name_error" class="error-message"></div>
    </div>

    <div class="form-group">
        <label for="year">Year:</label>
        <input type="number" id="year" name="year" value="{{ old('year') }}">
        <div id="year_error" class="error-message"></div>
    </div>

    <div class="form-group">
        <label for="department">Department:</label>
        <input type="text" id="department" name="department" value="{{ old('department') }}">
        <div id="department_error" class="error-message"></div>
    </div>

    <div class="form-group">
        <label for="items_exit">Items to Exit:</label>
        <textarea id="items_exit" name="items_exit" rows="4" placeholder="List the items you are returning/leaving behind">{{ old('items_exit') }}</textarea>
        <div id="items_exit_error" class="error-message"></div>
    </div>

    <div class="form-group">
        <label for="date_of_submission">Date of Submission:</label>
        <input type="date" id="date_of_submission" name="date_of_submission" value="{{ old('date_of_submission') }}">
        <div id="date_of_submission_error" class="error-message"></div>
    </div>

    <button type="submit">Submit</button>
</form>

    


<script>
   function validateForm() {
  // Get the form fields
  var studentFirstName = document.getElementById("student_first_name");
  var studentLastName = document.getElementById("student_last_name");
  var yearField = document.getElementById("year");
  var departmentField = document.getElementById("department");
  var itemsExitField = document.getElementById("items_exit");
  var dateOfSubmissionField = document.getElementById("date_of_submission");

  // Get the error message elements
  var studentFirstNameError = document.getElementById("student_first_name_error");
  var studentLastNameError = document.getElementById("student_last_name_error");
  var yearError = document.getElementById("year_error");
  var departmentError = document.getElementById("department_error");
  var itemsExitError = document.getElementById("items_exit_error");
  var dateOfSubmissionError = document.getElementById("date_of_submission_error");

  // Clear any previous error messages
  studentFirstNameError.textContent = "";
  studentLastNameError.textContent = "";
  yearError.textContent = "";
  departmentError.textContent = "";
  itemsExitError.textContent = "";
  dateOfSubmissionError.textContent = "";

  // Validate the form fields
  var isValid = true;

  if (studentFirstName.value.trim() === "") {
    studentFirstNameError.textContent = "Please fill the field.";
    isValid = false;
  } else if (containsNumbers(studentFirstName.value)) {
    studentFirstNameError.textContent = "Please enter a valid first name.";
    isValid = false;
  }

  if (studentLastName.value.trim() === "") {
    studentLastNameError.textContent = "Please fill the field.";
    isValid = false;
  } else if (containsNumbers(studentLastName.value)) {
    studentLastNameError.textContent = "Please enter a valid last name.";
    isValid = false;
  }

  if (yearField.value.trim() === "") {
    yearError.textContent = "Please fill the field.";
    isValid = false;
  } 

  if (departmentField.value.trim() === "") {
    departmentError.textContent = "Please fill the field.";
    isValid = false;
  } else if (containsNumbers(departmentField.value)) {
    departmentError.textContent = "Please enter a valid department.";
    isValid = false;
  }

  if (itemsExitField.value.trim() === "") {
    itemsExitError.textContent = "Please fill the field.";
    isValid = false;
  }

  if (dateOfSubmissionField.value === "") {
    dateOfSubmissionError.textContent = "Please fill the field.";
    isValid = false;
  }

  return isValid;
}

function containsNumbers(str) {
  // Regular expression to check if a string contains numbers
  return /\d/.test(str);
}
</script>
@endsection
    </body>
    </html>