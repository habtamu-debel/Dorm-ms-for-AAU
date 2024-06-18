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

        .error-text {
        color: red;
        font-size: small;
    }
    </style>
    <h1>Room Maintenance Form</h1>

    <form action="{{ route('maintenance.store') }}" method="POST" enctype="multipart/form-data" onsubmit="validateForm(event)">
    @csrf

    <div class="form-group">
        <label for="room-number">Room Number:</label>
        <input type="text" id="room-number" name="room-number">
        <p id="room-number-error" class="error-text"></p>
    </div>

    <div class="form-group">
        <label for="maintenance-type">Type of Maintenance:</label>
        <select id="maintenance-type" name="maintenance-type">
            <option value="facility">Facility</option>
            <option value="equipment">Equipment</option>
            <option value="safety">Safety</option>
        </select>
    </div>

    <div class="form-group">
        <label for="urgency">Urgency:</label>
        <select id="urgency" name="urgency">
            <option value="low">Low</option>
            <option value="medium">Medium</option>
            <option value="high">High</option>
        </select>
    </div>

    <div class="form-group">
        <label for="attachment">Attachment:</label>
        <input type="file" id="attachment" name="attachment">
        <p id="attachment-error" class="error-text"></p>
    </div>

    <div class="form-group">
        <label for="date">Date:</label>
        <input type="text" id="date" name="date" readonly>
        <p id="date-error" class="error-text"></p>
    </div>

    <div class="form-group">
        <label for="description">Description:</label>
        <textarea id="description" name="description" rows="4" placeholder="Enter a detailed description of the maintenance issue" oninput="validateDescription()"></textarea>
        <p id="description-error" class="error-text"></p>
    </div>

    <div class="form-group">
        <label for="contact">Phone Number:</label>
        <input type="text" id="contact" name="contact" oninput="validatePhoneNumber()" placeholder="+251">
        <p id="contact-error" class="error-text"></p>
    </div>

    <button type="submit">Submit</button>
</form>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $(function() {
        $("#date").datepicker();
    });

    function validateForm(event) {
        event.preventDefault(); // Prevent the default form submission

        let isValid = true; // Default form validity

        const descriptionInput = document.getElementById('description');
        const description = descriptionInput.value.trim();
        const descriptionError = document.getElementById('description-error');

        // Split the description by whitespace to count the words
        const wordCount = description.split(/\s+/).length;

        if (description === '') {
            descriptionError.textContent = 'Please enter a description.';
            isValid = false;
        } else if (wordCount < 10) {
            descriptionError.textContent = 'Description must be at least 10 words.';
            isValid = false;
        }  else {
            descriptionError.textContent = '';
        }

        const phoneNumberInput = document.getElementById('contact');
        const phoneNumber = phoneNumberInput.value.trim();
        const phoneNumberError = document.getElementById('contact-error');

        if (phoneNumber === '') {
            phoneNumberError.textContent = 'Please enter a phone number.';
            isValid = false;

        } else if (!/^\+251\d{9}$/.test(phoneNumber)) {
    phoneNumberError.textContent = 'Phone number must start with +251 and add exactly 9 digits.';
    isValid = false;
}else if (!/^\+?\d+$/.test(phoneNumber)) {
    phoneNumberError.textContent = 'Phone number must contain only numeric digits and start with a "+" sign.';
    isValid = false;
}else {
            phoneNumberError.textContent = '';
        }

        // Validate room number
        const roomNumberInput = document.getElementById('room-number');
        const roomNumber = roomNumberInput.value.trim();
        const roomNumberError = document.getElementById('room-number-error');

        if (roomNumber === '') {
            roomNumberError.textContent = 'Please enter a room number.';
            isValid = false;
        } else {
            roomNumberError.textContent = '';
        }

        // Validate attachment
        const attachmentInput = document.getElementById('attachment');
        const attachment = attachmentInput.value;
        const attachmentError = document.getElementById('attachment-error');

        if (attachment === '') {
            attachmentError.textContent = 'Please select an attachment.';
            isValid = false;
        } else {
            attachmentError.textContent = '';
        }

        const dateInput = document.getElementById('date');
        const dateValue = dateInput.value.trim();
        const dateError = document.getElementById('date-error');

        if (dateValue === '') {
            dateError.textContent = 'Please enter a date.';
            isValid = false;
        } else {
            const enteredDate = new Date(dateValue);

            if (isNaN(enteredDate.getTime())) {
                dateError.textContent = 'Invalid date format. Please enter a valid date.';
                isValid = false;
            } else {
                dateError.textContent = '';
            }
        }

        // Submit the form if there are no errors
        if (isValid) {
            event.target.submit();
        }
    }
</script>
    
</body>
</html>