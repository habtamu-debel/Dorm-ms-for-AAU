<!DOCTYPE html>
<html>
<head>
  <title>Edit Block</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 20px;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      background-color: #f4f4f4;
    }

    .container {
      width: 400px;
      padding: 30px;
      background-color: #ffffff;
      border-radius: 5px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      display: flex;
      flex-direction: column;
      align-items: center;
      margin-top:700px;
    }

    h1 {
      margin-bottom: 20px;
      text-align: center;
      flex: 0 0 auto;
    }

    form {
      margin-bottom: 20px;
      flex: 1 1 auto;
      width: 100%;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }
    label {
      display: block;
      margin-bottom: 5px;
      font-weight: bold;
    }

    input[type="text"],
    input[type="number"] {
      width: 100%;
      padding: 5px;
      margin-bottom: 10px;
    }

    input[type="checkbox"] {
      margin-bottom: 10px;
    }

    button[type="submit"] {
      background-color: #4CAF50;
      color: white;
      padding: 10px 16px;
      border: none;
      cursor: pointer;
      width: 100%;
    }

    .field-group {
      margin-bottom: 20px;
    }

    .edit {
      border: 2px solid red;
    }

    .error-message {
      color: red;
      font-size: 12px;
      margin-top: 5px;
    }
</style>

<div class="container">
  <h1>Edit Block</h1>
  <form action="{{ route('blocks.update', urlencode($block->blockName)) }}" method="POST" onsubmit="return validateForm()">
    @csrf
    @method('PUT')

    <div class="field-group">
      <label for="blockName">Block Name:</label>
      <input type="text" id="blockName" name="blockName" value="{{ $block->blockName }}">
      <span id="blockNameError" class="error-message"></span>
    </div>

    <div class="field-group">
      <label for="capacity">Capacity:</label>
      <input type="number" id="capacity" name="capacity" value="{{ $block->capacity }}">
      <span id="capacityError" class="error-message"></span>
    </div>

    <div class="field-group">
      <label for="floor">Floor:</label>
      <input type="number" id="floor" name="floor" value="{{ $block->floor }}">
      <span id="floorError" class="error-message"></span>
    </div>

    <div class="field-group">
      <label for="room_number">Room Number:</label>
      <input type="text" id="room_number" name="room_number" value="{{ $block->numRooms }}">
      <span id="roomNumberError" class="error-message"></span>
    </div>

    <div class="field-group">
      <label for="light">Light:</label>
      <input type="checkbox" id="light" name="light" {{ $block->light ? 'checked' : '' }}>
    </div>

    <div class="field-group" id="lightNumberField">
      <label for="light_number">Light Number:</label>
      <input type="text" id="light_number" name="light_number" value="{{ $block->lightNumber }}">
      <span id="lightNumberError" class="error-message"></span>
    </div>

    <div class="field-group">
      <label for="bathroom">Bathroom:</label>
      <input type="checkbox" id="bathroom" name="bathroom" {{ $block->bathroom ? 'checked' : '' }}>
    </div>

    <div class="field-group" id="bathroomNumberField">
      <label for="bathroom_number">Bathroom Number:</label>
      <input type="text" id="bathroom_number" name="bathroom_number" value="{{ $block->bathroomNumber }}">
      <span id="bathroomNumberError" class="error-message"></span>
    </div>

    <button type="submit">Save</button>
  </form>
</div>

<script>
  function validateForm() {
    // Reset error messages
    document.getElementById("blockNameError").textContent = "";
    document.getElementById("capacityError").textContent = "";
    document.getElementById("floorError").textContent = "";
    document.getElementById("roomNumberError").textContent = "";
    document.getElementById("lightNumberError").textContent = "";
    document.getElementById("bathroomNumberError").textContent = "";

    // Fetch form inputs
    var blockName = document.getElementById("blockName").value;
    var capacity = document.getElementById("capacity").value;
    var floor = document.getElementById("floor").value;
    var roomNumber = document.getElementById("room_number").value;
    var lightChecked = document.getElementById("light").checked;
    var lightNumber = document.getElementById("light_number").value;
    var bathroomChecked = document.getElementById("bathroom").checked;
    var bathroomNumber = document.getElementById("bathroom_number").value;

    // Validate block name
    if (blockName.trim() === "") {
      document.getElementById("blockNameError").textContent = "Please enter a block name.";
      document.getElementById("blockName").classList.add("edit");
      return false;
    }

    // Validate capacity
    if (capacity.trim() === "" || isNaN(capacity) || capacity <= 0) {
      document.getElementById("capacityError").textContent = "Please enter a valid capacity.";
      document.getElementById("capacity").classList.add("edit");
      return false;
    }

    // Validate floor
    if (floor.trim() === "" || isNaN(floor) || floor < 0) {
      document.getElementById("floorError").textContent = "Please enter a valid floor number.";
      document.getElementById("floor").classList.add("edit");
      return false;
    }

    // Validate room number
    if (roomNumber.trim() === "" || isNaN(roomNumber) || roomNumber <= 0) {
      document.getElementById("roomNumberError").textContent = "Please enter a valid room number.";
      document.getElementById("room_number").classList.add("edit");
      return false;
    }

    // Validate light number if light is checked
    if (lightChecked && (lightNumber.trim() === "" || isNaN(lightNumber) || lightNumber <= 0)) {
      document.getElementById("lightNumberError").textContent = "Please enter a valid light number.";
      document.getElementById("light_number").classList.add("edit");
      return false;
    }

    // Validate bathroom number if bathroom is checked
    if (bathroomChecked && (bathroomNumber.trim() === "" || isNaN(bathroomNumber) || bathroomNumber <= 0)) {
      document.getElementById("bathroomNumberError").textContent = "Please enter a valid bathroom number.";
      document.getElementById("bathroom_number").classList.add("edit");
      return false;
    }

    return true;
  }
</script>

</body>
</html>