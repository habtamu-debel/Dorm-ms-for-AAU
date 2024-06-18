<!DOCTYPE html>
<html>
<head>
    <title>Building Maintenance Form</title>
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
input[type="number"],
input[type="datetime-local"],
textarea {
  width: 100%;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 4px;
  transition: border-color 0.3s ease;
}

input[type="text"]:focus,
input[type="number"],
input[type="datetime-local"]:focus,
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
  input[type="number"],
  input[type="datetime-local"],
  textarea,
  select {
    padding: 8px;
  }
  
  button[type="submit"] {
    padding: 10px 20px;
    font-size: 14px;
  }
}

.error{
  font-size:12px;
  color:red;
}
    </style>
    <h1>Building Maintenance Form</h1>

    <form action="{{ route('buildingmaintenance.store') }}" method="POST">

    @csrf

    <div class="form-group">
        <label for="block">Block:</label>
        <input type="text" id="block" name="block">
        <p id="block-error" class="error"></p>
    </div>

    <div class="form-group">
        <label for="floor">Floor:</label>
        <input type="number" id="floor" name="floor">
        <p id="floor-error" class="error"></p>
    </div>

    <div class="form-group">
        <label for="category">Maintenance Type:</label>
        <select id="category" name="category">
            <option value="facility">Facility</option>
            <option value="equipment">Equipment</option>
            <option value="safety">Safety</option>
        </select>
    </div>

    <div class="form-group">
        <label for="occurrence">Date When It Occurred:</label>
        <input type="text" id="occurrence" name="occurrence"  readonly>
        <p id="occurrence-error" class="error"></p>
    </div>

    <div class="form-group">
        <label for="media">Supporting Media:</label>
        <input type="file" id="media" name="media">
    </div>

    <div class="form-group">
        <label for="impact">Impact/Severity:</label>
        <select id="impact" name="impact">
            <option value="low">Low</option>
            <option value="medium">Medium</option>
            <option value="high">High</option>
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
        <label for="room">Room/Area Details:</label>
        <textarea id="room" name="room"></textarea>
    </div>

    <div class="form-group">
        <label for="description">Description:</label>
        <textarea id="description" name="description" rows="4" placeholder="Enter a detailed description of the maintenance issue"></textarea>
        <p id="description-error" class="error"></p>
    </div>

    <div class="form-group">
        <label for="contact">Phone:</label>
        <input type="text" id="contact" name="contact">
        <p id="contact-error" class="error"></p>
    </div>

    <button type="submit">Submit</button>
</form>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $(function() {
        $("#occurrence").datepicker();
    });

    function validateForm() {
        let isValid = true;



         // Validate block
      
        // Validate block
        const block = $("#block").val().trim();
        if (block === "") {
            $("#block-error").text("Please enter the block information.");
            isValid = false;
        } else if (!/^[a-zA-Z]+$/.test(block)) {
            $("#block-error").text("Please enter a valid block name (only letters are allowed).");
            isValid = false;
        } else {
            $("#block-error").text("");
        }

        // Validate floor
        const floor = $("#floor").val().trim();
        if (floor === "") {
            $("#floor-error").text("Please enter the floor information.");
            isValid = false;
        } else if (!/^\d+$/.test(floor)) {
            $("#floor-error").text("Please enter a valid floor number (only numeric values are allowed).");
            isValid = false;
        } else {
            $("#floor-error").text("");
        }
        // Validate occurrence date
        const occurrence = $("#occurrence").val().trim();
        if (occurrence === "") {
            $("#occurrence-error").text("Please select the date when the maintenance occurred.");
            isValid = false;
        } else {
            $("#occurrence-error").text("");
        }

        // Validate description
        const description = $("#description").val().trim();
        if (description === "" || description.split(" ").length < 10) {
            $("#description-error").text("Please enter a detailed description with at least 10 words.");
            isValid = false;
        } else {
            $("#description-error").text("");
        }

        // Validate contact phone
        const contact = $("#contact").val().trim();
        const contactRegex = /^\+251\d{9}$/;
        if (contact === "" || !contactRegex.test(contact)) {
            $("#contact-error").text("Please enter a valid phone number starting with '+251' followed by 9 digits.");
            isValid = false;
        } else {
            $("#contact-error").text("");
        }

        return isValid;
    }

    $("form").submit(function(event) {
        if (!validateForm()) {
            event.preventDefault();
        }
    });
</script>
</body>
</html>