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

    
<h1>Dorm Change Request Form</h1>

<form action="{{ route('dorm-changes.store') }}" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
    @csrf
       

        <div class="form-group">
            <label for="student_name">Student Name:</label>
            <input type="text" id="student_name" name="student_name">
        </div>


        <div class="form-group">
            <label for="current_dorm_duration">Minimum Stay Duration in Current Dorm:</label>
            <input type="number" id="current_dorm_duration" name="current_dorm_duration">
        </div>

        <div class="form-group">
    <label for="reason">Reason for Dorm Change:</label>
    <select id="reason" name="reason">
        <option value="">Select a reason</option>
        <option value="medical_issues">Medical Issues</option>
        <option value="twins">Twins</option>
        <option value="disability">Disability</option>
        <option value="argument">Argument</option>
        <option value="safety_issue">Safety Issue</option>
    </select>
</div>

        <div class="form-group">
            <label for="description">Description:</label>
            <textarea id="description" name="description" rows="4" placeholder="descripe your dorm change reason"></textarea>
        </div>

        <div class="form-group">
            <label for="room_number_features">Room Type and Features:</label>
            <textarea id="room_number_features" name="room_number_features" rows="4" placeholder="Specify your preferred room type or specific features you are looking for in the new dorm"></textarea>
        </div>

        <div class="form-group">
            <label for="special_needs">Consideration of Special Needs:</label>
            <textarea id="special_needs" name="special_needs" rows="4" placeholder="Specify any special needs or accommodations required"></textarea>
        </div>

        <div class="form-group">
            <label for="supporting_file">Supporting File:</label>
            <input type="file" id="supporting_file" name="supporting_file">
        </div>

        <div class="form-group">
            <label for="date_of_submission">Date of Submission:</label>
            <input type="date" id="date_of_submission" name="date_of_submission">
        </div>

        <div class="form-group">
            <label for="contact_details">Contact:</label>
            <input type="text" id="contact_details" name="contact_details">
        </div>
        <button type="submit">Submit</button>
    </form>

    <script>
        // JavaScript code, if needed
    </script>
@endsection