<!DOCTYPE html>
<html>
<head>
  <title>Response Page</title>
  <!-- Include any necessary stylesheets or scripts -->
</head>
<body>
  <style>
    .container {
  width: 600px;
  margin: 0 auto;
  padding: 20px;
  background-color: #f2f2f2;
}

h1 {
  text-align: center;
}

.form-group {
  margin-bottom: 20px;
}

label {
  display: block;
  font-weight: bold;
}

textarea {
  width: 100%;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 4px;
}

button[type="submit"] {
  padding: 10px 20px;
  background-color: #4CAF50;
  color: white;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

button[type="submit"]:hover {
  background-color: #45a049;
}
    </style>
  <div class="container">
    <h1>Response Page</h1>
    <form action="{{ route('submitResponse', ['id' => $appointment->id]) }}" method="POST">
    @csrf
    @method('PUT') <!-- Add this line to simulate a PUT request -->
    <div class="form-group">
        <label for="response">Response Description:</label>
        <textarea id="response" name="response" rows="4" cols="50" required></textarea>
    </div>
    <button type="submit">Submit</button>
</form>
  </div>
</body>
</html>