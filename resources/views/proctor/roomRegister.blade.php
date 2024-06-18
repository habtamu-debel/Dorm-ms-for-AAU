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
      padding-bottom:20px;
    }

    h1 {
      text-align: center;
    }

    form {
      width: 500px;
      margin: 0 auto;
      padding: 20px;
      background-color: #ffffff;
      border: 2px solid rgba(73, 98, 209, 0.5);
      box-shadow: 0 0 5px rgba(73, 98, 209, 0.5);
      border-radius: 5px;
      padding-bottom:20px;
      margin-bottom:50px;
    }

    label {
      display: block;
      margin-top: 10px;
    }

    input[type="text"],
    input[type="number"],
    input[type="submit"],
    select{
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
      width: 100%;
      height: 30px;
    }

    input[type="submit"]:hover {
      background-color: #45a049;
    }

    .register {
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .text-danger {
      color: red;
      font-size: 14px;
      margin-top: 5px;
    }
  </style>
  <div class="register">
    <h1>Room Registration</h1>

    <form id="registrationForm" action="{{ route('room.store') }}" method="POST" onsubmit="return validateForm()">
      @csrf
      <label for="block">Block:</label>
      <select id="block" name="block" required>
        <option value="">Select a block</option>
        @foreach ($blockNames as $blockName)
        <option value="{{ $blockName }}">{{ $blockName }}</option>
        @endforeach
      </select>

      <label for="floor">
        Floor:
        <select id="floor" name="floor" required>
          <option value="">Select a floor</option>
          @foreach ($floors as $floor)
          <option value="{{ $floor }}">{{ $floor }}</option>
          @endforeach
        </select>
      </label>

      <label for="roomNumber">Room Number:</label>
      <input type="text" id="roomNumber" name="roomNumber" value="{{ old('roomNumber') }}" required pattern="\d+" title="Please enter a valid room number">
      <div id="roomNumberError" class="text-danger"></div>

      <label for="capacity">Capacity:</label>
      <input type="number" id="capacity" name="capacity" value="{{ old('capacity') }}" required min="1">
      <div id="capacityError" class="text-danger"></div>

      <label for="locker">Locker:</label>
      <input type="checkbox" id="locker" name="locker" onclick="toggleInput('lockerNumber')" {{ old('locker') ? 'checked' : '' }}>
      <input type="number" id="lockerNumber" name="lockerNumber" placeholder="Enter locker number" style="display: none;" value="{{ old('lockerNumber') }}">

      <label for="table">Table:</label>
      <input type="checkbox" id="table" name="table" onclick="toggleInput('tableNumber')" {{ old('table') ? 'checked' : '' }}>
      <input type="number" id="tableNumber" name="tableNumber" placeholder="Enter table number" style="display: none;" value="{{ old('tableNumber') }}">

      <label for="chair">Chair:</label>
      <input type="checkbox" id="chair" name="chair" onclick="toggleInput('chairNumber')"  {{ old('chair') ? 'checked' : '' }}>
      <input type="number" id="chairNumber" name="chairNumber"placeholder="Enter chair number" style="display: none;" value="{{ old('chairNumber') }}">

      <label for="light">Light:</label>
      <input type="checkbox" id="light" name="light" onclick="toggleInput('lightNumber')" {{ old('light') ? 'checked' : '' }}>
      <input type="number" id="lightNumber" name="lightNumber" placeholder="Enter light number" style="display: none;" value="{{ old('lightNumber') }}">

      <label for="charger">Charger:</label>
      <input type="checkbox" id="charger" name="charger" onclick="toggleInput('chargerNumber')" {{ old('charger') ? 'checked' : '' }}>
      <input type="number" id="chargerNumber" name="chargerNumber" placeholder="Enter charger number" style="display: none;" value="{{ old('chargerNumber') }}"><br>

      <input type="submit" value="Register">
    </form>
  </div>

  <script>
    function toggleInput(inputId) {
      var input = document.getElementById(inputId);
      input.style.display = input.style.display === 'none' ? 'block' : 'none';
    }

    function validateForm() {
      var roomNumber = document.getElementById('roomNumber');
      var capacity = document.getElementById('capacity');
      var roomNumberError = document.getElementById('roomNumberError');
      var capacityError = document.getElementById('capacityError');
      var valid = true;

      roomNumberError.textContent = '';
      capacityError.textContent = '';

      if (!roomNumber.checkValidity()) {
        roomNumberError.textContent = roomNumber.title;
        valid = false;
      }

      if (!capacity.checkValidity()) {
        capacityError.textContent = 'Please enter a valid capacity';
        valid = false;
      }

      return valid;
    }

    document.addEventListener("DOMContentLoaded", function() {
      populateBlockNames();
    });

    function populateBlockNames() {
      const blockNames = @json(session('blockNames'));

      const blockSelect = document.getElementById("block");
      blockNames.forEach(function (blockName) {
        const option = document.createElement("option");
        option.value = blockName;
        option.textContent = blockName;
        blockSelect.appendChild(option);
      });
    }
  </script>
</body>
</html>