<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Success Page</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
    <style>
        body {
  font-family: Arial, sans-serif;
  background-color: #f1f1f1;
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
  margin: 0;
}

.container {
  background-color: white;
  padding: 40px;
  border-radius: 8px;
  box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
  text-align: center;
}

.success-message {
  margin-bottom: 30px;
}

.checkmark {
  font-size: 60px;
  color: #4CAF50;
  margin-bottom: 20px;
}

h1 {
  font-size: 24px;
  color: #333;
  margin-bottom: 10px;
}

p {
  font-size: 16px;
  color: #666;
}

button {
  background-color: #4CAF50;
  color: white;
  border: none;
  padding: 12px 24px;
  font-size: 16px;
  border-radius: 4px;
  cursor: pointer;
}

button:hover {
  background-color: #45a049;
}
        </style>
  <div class="container">
    <div class="success-message">
      <i class="checkmark">✓</i>
      <h1>Success!</h1>
      <p>Your Announcement Posted Successfully !!.</p>
    </div>
    <button id="backButton">Go Back</button>
  </div>

  <script src="script.js">
    document.addEventListener('DOMContentLoaded', function() {
  var backButton = document.getElementById('backButton');

  backButton.addEventListener('click', function() {
    // Add your redirect logic here
    window.location.href = 'your-previous-page.html';
  });
});
  </script>
</body>
</html>