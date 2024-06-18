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
    <h1>Clearance Request Form</h1>

    <form action="{{ route('clearance.store') }}" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
    @csrf
    

        <div class="form-group">
            <label for="student_name">Student Name:</label>
            <input type="text" id="student_name" name="student_name">
        </div>

        <div class="form-group">
            <label for="department">Department:</label>
            <input type="text" id="department" name="department">
        </div>

    
        <div class="form-group">
            <label for="reason">Reason for Clearance:</label>
            <textarea id="reason" name="reason" rows="4" placeholder="Enter the reason for the clearance request"></textarea>
        </div>

        <div class="form-group">
            <label for="supporting_documents">Supporting Documents:</label>
            <input type="file" id="supporting_documents" name="supporting_documents">
        </div>


        <div class="form-group">
            <label for="contact_details">Contact Details:</label>
            <input type="text" id="contact_details" name="contact_details">
        </div>

        <button type="submit">Submit</button>
    </form>

    <script>
        // JavaScript code, if needed
    </script>
@endsection