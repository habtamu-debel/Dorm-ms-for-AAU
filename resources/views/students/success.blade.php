<!DOCTYPE html>
<html>
<head>
  <title>Success Page</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f5f5f5;
      margin: 0;
      padding: 0;
    }

    .container {
      max-width: 600px;
      margin: 0 auto;
      padding: 20px;
      background-color: #fff;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
      border-radius: 5px;
      text-align: center;
      margin-top: 100px;
    }

    h1 {
      color: #4caf50;
      font-size: 24px;
      margin-bottom: 20px;
    }

    p {
      font-size: 16px;
      margin-bottom: 10px;
    }

    .button {
      display: inline-block;
      background-color: #4caf50;
      color: #fff;
      padding: 10px 20px;
      text-decoration: none;
      border-radius: 5px;
      margin-top: 20px;
    }

    .button:hover {
      background-color: #45a049;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Success!</h1>
    <p>Your form has been submitted successfully.</p>
    <p>Thank you for your submission.</p>
    <a href="#" class="button">Go Back</a>
  </div>

  <script>
    document.querySelector(".button").addEventListener("click", function(event) {
      event.preventDefault();
      history.back();
    });
  </script>
</body>
</html>