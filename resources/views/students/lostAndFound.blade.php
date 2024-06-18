@extends('students.manageRequest')

@section('content')
<!DOCTYPE html>
<html>
<head>
    <title>Lost and Found Request Form</title>
    <style>
        h1 {
            text-align: center;
            margin-top: 20px;
        }

        form {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: bold;
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .upload-container {
            position: relative;
        }

        .upload-button {
            position: absolute;
            top: 0;
            right: 0;
            padding: 10px 20px;
            background-color: #f1f1f1;
            border: 1px solid #ccc;
            border-radius: 4px;
            cursor: pointer;
        }

        .upload-button:hover {
            background-color: #e0e0e0;
        }

        #photo-name {
            width: calc(100% - 150px);
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            pointer-events: none;
            background-color: #f1f1f1;
        }

        .error-message {
            color: red;
            margin-top: 5px;
        }
        button[type="submit"] {
        background-color: green;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    button[type="submit"]:hover {
        background-color: darkgreen;
    }
    </style>
    <link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>
</head>
<body>
    <h1>Lost and Found Request Form</h1>

    <form action="{{ route('lostandfound.store') }}" method="POST" enctype="multipart/form-data" onsubmit="return validateForm(event)">
        @csrf
        <div class="form-group">
            <label for="item_status">Item Status:</label>
            <select id="item_status" name="item_status">
                <option value="">Select an option</option>
                <option value="found">Found</option>
                <option value="lost">Lost</option>
            </select>
            <div class="error-message" id="item-status-error"></div>
        </div>

        <div class="form-group">
            <label for="item_name">Item Name:</label>
            <input type="text" id="item_name" name="item_name">
            <div class="error-message" id="item-name-error"></div>
        </div>

        <div class="form-group">
            <label for="location_found">Location Found:</label>
            <input type="text" id="location_found" name="location_found">
            <div class="error-message" id="location-found-error"></div>
        </div>

        <div class="form-group">
            <label for="date_found">Date Found:</label>
            <input type="date" id="date_found" name="date_found">
            <div class="error-message" id="date-found-error"></div>
        </div>

        <div class="form-group">
            <label for="additional_details">Additional Details:</label>
            <textarea id="additional_details" name="additional_details" rows="4" placeholder="Enter additional details about the item"></textarea>
            <div class="error-message" id="additional-details-error"></div>
        </div>

        <div class="form-group">
            <label for="claimant_contact">Your Contact Information:</label>
            <input type="text" id="claimant_contact" name="claimant_contact">
            <div class="error-message" id="contact-information-error"></div>
        </div>

        <div class="form-group">
            <label for="photo">Attach Photo (optional):</label>
            <div class="upload-container">
                <input type="text" id="photo-name" readonly>
                <label class="upload-button" for="photo">Browse</label>
                <input type="file" id="photo" name="photo" accept="image/*" onchange="updateFileName()">
                <div class="error-message" id="photo-error"></div>
            </div>
        </div>

        <button type="submit">Submit</button>
    </form>

    <script>
        function validateForm(event) {
            event.preventDefault();

            // Reset error messages
            $(".error-message").text("");

            // Validate item status
            var itemStatus = $("#item_status").val();
            if (itemStatus === "") {
                $("#item-status-error").text("Please select an item status.");
                return false;
            }

            // Validate item name
            var itemName = $("#item_name").val();
            if (itemName === "") {
                $("#item-name-error").text("Please enter the item name.");
                return false;
            }

            // Validate location found
            var locationFound = $("#location_found").val();
            if (locationFound === "") {
                $("#location-found-error").text("Please enter the location where the item was found.");
                return false;
            }

            // Validate date found
            var dateFound = $("#date_found").val();
            if (dateFound === "") {
                $("#date-found-error").text("Please enter the date the item was found.");
                return false;
            }

            // Validate additional details
            var additionalDetails = $("#additional_details").val();
            if (additionalDetails === "") {
                $("#additional-details-error").text("Please enter additional details about the item.");
                return false;
            }

            // Validate claimant contact information
            var claimantContact = $("#claimant_contact").val();
            if (claimantContact === "") {
                $("#contact-information-error").text("Please enter your contact information.");
                return false;
            }

            // Validation passed, submit the form
            event.target.submit();
        }

        function updateFileName() {
            var fileName = $("#photo")[0].files[0].name;
            $("#photo-name").val(fileName);
        }
    </script>
</body>
</html>
@endsection