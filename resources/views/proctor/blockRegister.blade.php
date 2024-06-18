<!DOCTYPE html>
<html>
<head>
  <title>Room Registration</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 20px;
    }

    h1 {
      text-align: center;
    }

    form {
      width: 300px;
      margin: 0 auto;
    }

    label {
      display: block;
      margin-top: 10px;
    }

    input[type="text"],
    input[type="number"],
    input[type="submit"] {
      width: 100%;
      padding: 5px;
      margin-top: 5px;
    }

    input[type="checkbox"] {
      margin-top: 10px;
    }

    input[type="submit"] {
      background-color: #4CAF50;
      color: white;
      cursor: pointer;
    }

    input[type="submit"]:hover {
      background-color: #45a049;
    }

    .register {
      padding: 30px;
    }

    #registrationForm {
      border: 2px;
      box-shadow: 0 0 5px rgba(73, 98, 209, 0.5);
      width: 500px;
      padding: 20px;
    }

    .form-group {
      position: relative;
      margin-bottom: 1rem;
    }

    .form-group .form-control {
      /* Your input field styles */
    }

    .form-group .text-danger {
      color: red;
      font-size: 0.875rem;
      margin-top: 0.25rem;
    }
    .text-danger {
  color: red;
  font-size: 0.875rem;
  margin-top: 0.25rem;
}

.is-invalid {
  border-color: #dc3545;
  padding-right: calc(1.5em + 0.75rem);
  background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 12 12' width='12' height='12' fill='none' stroke='%23dc3545'%3e%3ccircle cx='6' cy='6' r='4.5'/%3e%3cpath stroke-linejoin='round' d='M5.8 3.6h.4L6 6.5z'/%3e%3ccircle cx='6' cy='8.2' r='.6' fill='%23dc3545' stroke='none'/%3e%3c/svg%3e");
  background-repeat: no-repeat;
  background-position: right calc(0.375em + 0.1875rem) center;
  background-size: calc(0.75em + 0.375rem) calc(0.75em + 0.375rem);
}

.invalid-feedback {
  display: block;
  width: 100%;
  margin-top: 0.25rem;
  font-size: 0.875em;
  color: #dc3545;
}
  </style>
  <div class="register">
    <h1>Block Registration</h1>

    <form id="registrationForm" action="{{ route('block.store') }}" method="POST" onsubmit="return validateForm()">
      @csrf
      <div class="form-group">
        <label for="blockName">Block Name</label>
        <input type="text" name="blockName" id="blockName" class="form-control @error('blockName') is-invalid @enderror" value="{{ old('blockName') }}">
        <div class="text-danger" id="blockName_error"></div>
        @error('blockName')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>

      <label for="floor">Floor:</label>
      <input type="number" id="floor" name="floor" value="{{ old('floor') }}" required>
      <div class="text-danger" id="floor_error"></div>

      <label for="numRooms">Number of Rooms:</label>
      <input type="number" id="numRooms" name="numRooms" value="{{ old('numRooms') }}" required>
      <div class="text-danger" id="numRooms_error"></div>

      <label for="capacity">Capacity:</label>
      <input type="number" id="capacity" name="capacity" value="{{ old('capacity') }}" required>
      <div class="text-danger" id="capacity_error"></div>

      <label for="light">Light:</label>
      <input type="checkbox" id="light" name="light" onclick="toggleInput('lightNumber')" value="{{ old('light') }}">
      <input type="number" id="lightNumber" name="lightNumber" placeholder="Enter number of Lights" style="display: none;" value="{{ old('lightNumber') }}">
      <div class="text-danger" id="lightNumber_error"></div>

      <label for="bathroom">Bathroom:</label>
      <input type="checkbox" id="bathroom" name="bathroom" onclick="toggleInput('bathroomNumber')" value="{{ old('bathroom') }}">
      <input type="number" id="bathroomNumber" name="bathroomNumber" placeholder="Enter number of bathrooms" style="display: none;" value="{{ old('bathroomNumber') }}">
      <div class="text-danger" id="bathroomNumber_error"></div>

      <label for="toilet">Toilet:</label>
      <input type="checkbox" id="toilet" name="toilet" onclick="toggleInput('toiletNumber')" value="{{ old('toilet') }}">
      <input type="number" id="toiletNumber" name="toiletNumber" placeholder="Enter number of toilets" style="display: none;" value="{{ old('toiletNumber') }}">
      <div class="text-danger" id="toiletNumber_error"></div>

      <label for="fireHydrant">Fire Hydrant:</label>
      <input type="checkbox" id="fireHydrant" name="fireHydrant" onclick="toggleInput('fireHydrantNumber')" value="{{ old('fireHydrant') }}">

      <input type="number" id="fireHydrantNumber" name="fireHydrantNumber" placeholder="Enter number of fire hydrants" style="display: none;" value="{{ old('fireHydrantNumber') }}">
      <div class="text-danger" id="fireHydrantNumber_error"></div>

      <label for="specialFacility">Special Facility:</label>
      <input type="checkbox" id="specialFacility" name="specialFacility" onclick="toggleInput('specialFacilityNumber')" value="{{ old('specialFacility') }}">
      <input type="number" id="specialFacilityNumber" name="specialFacilityNumber" placeholder="Enter special facility number" style="display: none;" value="{{ old('specialFacilityNumber') }}">
      <div class="text-danger" id="specialFacilityNumber_error"></div>

      <label for="mirror">Mirror:</label>
      <input type="checkbox" id="mirror" name="mirror" onclick="toggleInput('mirrorNumber')" value="{{ old('mirror') }}">
      <input type="number" id="mirrorNumber" name="mirrorNumber" placeholder="Enter number of mirrors" style="display: none;" value="{{ old('mirrorNumber') }}">
      <div class="text-danger" id="mirrorNumber_error"></div>

      <input type="submit" value="Register">
    </form>

    <script>
      function toggleInput(inputId) {
        var input = document.getElementById(inputId);
        input.style.display = input.style.display === 'none' ? 'block' : 'none';
      }

      function validateForm() {
  var blockName = document.getElementById('blockName').value;
  var floor = document.getElementById('floor').value;
  var numRooms = document.getElementById('numRooms').value;
  var capacity = document.getElementById('capacity').value;

  var blockName_error = document.getElementById('blockName_error');
  var floor_error = document.getElementById('floor_error');
  var numRooms_error = document.getElementById('numRooms_error');
  var capacity_error = document.getElementById('capacity_error');

  blockName_error.textContent = "";
  floor_error.textContent = "";
  numRooms_error.textContent = "";
  capacity_error.textContent = "";

  var isValid = true;

  if (blockName.trim() === "") {
    blockName_error.textContent = "Block Name is required";
    isValid = false;
  }

  if (floor <= 0) {
    floor_error.textContent = "Floor must be a positive number";
    isValid = false;
  }

  if (numRooms <= 0) {
    numRooms_error.textContent = "Number of Rooms must be a positive number";
    isValid = false;
  }

  if (capacity <= 0) {
    capacity_error.textContent = "Capacity must be a positive number";
    isValid = false;
  }

  // Validate checkboxes
  var lightChecked = document.getElementById('light').checked;
  var lightNumber = document.getElementById('lightNumber').value;
  var bathroomChecked = document.getElementById('bathroom').checked;
  var bathroomNumber = document.getElementById('bathroomNumber').value;
  var toiletChecked = document.getElementById('toilet').checked;
  var toiletNumber = document.getElementById('toiletNumber').value;
  var fireHydrantChecked = document.getElementById('fireHydrant').checked;
  var fireHydrantNumber = document.getElementById('fireHydrantNumber').value;
  var specialFacilityChecked = document.getElementById('specialFacility').checked;
  var specialFacilityNumber = document.getElementById('specialFacilityNumber').value;
  var mirrorChecked = document.getElementById('mirror').checked;
  var mirrorNumber = document.getElementById('mirrorNumber').value;

  var lightNumber_error = document.getElementById('lightNumber_error');
  var bathroomNumber_error = document.getElementById('bathroomNumber_error');
  var toiletNumber_error = document.getElementById('toiletNumber_error');
  var fireHydrantNumber_error = document.getElementById('fireHydrantNumber_error');
  var specialFacilityNumber_error = document.getElementById('specialFacilityNumber_error');
  var mirrorNumber_error = document.getElementById('mirrorNumber_error');

  lightNumber_error.textContent = "";
  bathroomNumber_error.textContent = "";
  toiletNumber_error.textContent = "";
  fireHydrantNumber_error.textContent = "";
  specialFacilityNumber_error.textContent = "";
  mirrorNumber_error.textContent = "";

  if (lightChecked && (lightNumber === "" || lightNumber <= 0)) {
    lightNumber_error.textContent = "Please enter a valid number of lights";
    isValid = false;
  }

  if (bathroomChecked && (bathroomNumber === "" || bathroomNumber <= 0)) {
    bathroomNumber_error.textContent = "Please enter a valid number of bathrooms";
    isValid = false;
  }

  if (toiletChecked && (toiletNumber === "" || toiletNumber <= 0)) {
    toiletNumber_error.textContent = "Please enter a valid number of toilets";
    isValid = false;
  }

  if (fireHydrantChecked && (fireHydrantNumber === "" || fireHydrantNumber <= 0)) {
    fireHydrantNumber_error.textContent = "Please enter a valid number of fire hydrants";
    isValid = false;
  }

  if (specialFacilityChecked && (specialFacilityNumber === "" || specialFacilityNumber <= 0)) {
    specialFacilityNumber_error.textContent = "Please enter a valid number for the special facility";
    isValid = false;
  }

  if (mirrorChecked && (mirrorNumber === "" || mirrorNumber <= 0)) {
    mirrorNumber_error.textContent = "Please enter a valid number of mirrors";
    isValid = false;
  }

  return isValid;
}
    </script>
  </div>
</body>
</html>