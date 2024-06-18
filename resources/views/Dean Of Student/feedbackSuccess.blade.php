<!DOCTYPE html>
<html>
<head>
  <title>Thank You!</title>
  <link rel="stylesheet" type="text/css" href="studentHome.css">
</head>

<body>
    <style>

        /* studentHome.css */

body {
  font-family: Arial, sans-serif;
  background-color: #f8f8f8;
}

.container {
  max-width: 600px;
  margin: 0 auto;
  padding: 20px;
  background-color: #fff;
  border-radius: 5px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.success-message {
  text-align: center;
  margin-top: 100px;
}

.success-message h3 {
  font-size: 32px;
  color: #333;
  margin-bottom: 20px;
}

.success-message p {
  font-size: 20px;
  color: #666;
  margin-bottom: 30px;
}

.success-message .emoji {
  font-size: 48px;
  margin-bottom: 30px;
}

.success-message button {
  display: inline-block;
  padding: 10px 20px;
  border: none;
  border-radius: 3px;
  background-color: #007bff;
  color: #fff;
  font-size: 16px;
  font-weight: bold;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

.success-message button:hover {
  background-color: #0056b3;
}

.success-message button:focus {
  outline: none;
}

.success-message button:active {
  transform: translateY(1px);
}

.success-message .share-buttons {
  display: flex;
  justify-content: center;
  align-items: center;
}

.success-message .share-buttons button {
  margin-right: 10px;
  padding: 10px;
  border-radius: 50%;
  background-color: #007bff;
  color: #fff;
  font-size: 20px;
  font-weight: bold;
  border: none;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

.success-message .share-buttons button:hover {
  background-color: #0056b3;
}
        </style>
  <div class="container">
    <div class="success-message">
      <h3>Thank you for your feedback!</h3>
      <p>Your comments are useful to update and upgrade our dormitory system.</p>
      <div class="emoji">😊</div>
      <!-- <button onclick="shareOnTwitter()">Share on Twitter</button>
      <button onclick="shareOnFacebook()">Share on Facebook</button> -->
    </div>
  </div>

  <script>
    function shareOnTwitter() {
      window.open("https://twitter.com/intent/tweet?text=I just provided feedback for the dormitory system. Thank you for your comments! 😊");
    }

    function shareOnFacebook() {
      window.open("https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fexample.com");
    }
  </script>
</body>
</html>