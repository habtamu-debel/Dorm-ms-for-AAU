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
    
    <h1>Emergency/Safety Request Form</h1>
   
    <form action="{{ route('emergency.store') }}" method="POST" enctype="multipart/form-data" >
    @csrf
       
        <div class="form-group">
    <label for="student_name">Student Name:</label>
    <input type="text" id="student_name" name="student_name"  placeholder="optional">
</div>

        <div class="form-group">
            <label for="request_type">Request Type:</label>
            <select id="request_type" name="request_type">
                <option value="medical_emergency">Medical Emergency</option>
                <option value="fire_emergency">Fire Emergency</option>
                <option value="security_concern">Security Concern</option>
                <option value="maintenance_issue">Maintenance Issue</option>
                <option value="other">Other</option>
            </select>
        </div>

        <div class="form-group">
            <label for="description">Description of Emergency/Safety Concern:</label>
            <textarea id="description" name="description" rows="4" placeholder="Provide a detailed description"></textarea>
        </div>

        
    
        <div class="form-group">
            <label for="contact_phone">Contact Phone:</label>
            <input type="text" id="contact_phone" name="contact_phone">
        </div>

    

        <div class="form-group">
            <label for="urgency_level">Urgency Level:</label>
            <select id="urgency_level" name="urgency_level">
                <option value="low">Low</option>
                <option value="medium">Medium</option>
                <option value="high">High</option>
            </select>
        </div>

        <div class="form-group">
            <label for="supporting_media">Supporting Media:</label>
            <input type="file" id="supporting_media" name="supporting_media">
        </div>

        <div class="form-group">    
  <label for="location_of_emergency">Location of Emergency:</label>
  <select id="location-of-emergency" name="location_of_emergency">
    <option value="">Select location</option>
    <option value="building">Building</option>
    <option value="room">Room</option>
    <option value="other">Other</option>
  </select>

  <div id="building-input" style="display: none;">
    <label for="building_name">Building Name:</label>
    <input type="text" id="building_name" name="building_name">
  </div>

  <div id="room-input" style="display: none;">
    <label for="room_number">Room Number:</label>
    <input type="text" id="room_number" name="room_number">
  </div>

  <div id="other-input" style="display: none;">
    <label for="other_location">Other Location:</label>
    <input type="text" id="other_location" name="other_location">
  </div>
    </div>
  <button type="submit">Submit</button>
</form>

<script>
  const locationSelect = document.getElementById('location-of-emergency');
  const buildingInput = document.getElementById('building-input');
  const roomInput = document.getElementById('room-input');
  const otherInput = document.getElementById('other-input');

  locationSelect.addEventListener('change', function() {
    buildingInput.style.display = 'none';
    roomInput.style.display = 'none';
    otherInput.style.display = 'none';

    switch (this.value) {
      case 'building':
        buildingInput.style.display = 'block';
        break;
      case 'room':
        roomInput.style.display = 'block';
        break;
      case 'other':
        otherInput.style.display = 'block';
        break;
    }
  });
</script>
@endsection