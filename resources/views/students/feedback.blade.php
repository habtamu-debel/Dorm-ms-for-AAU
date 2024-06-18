<!DOCTYPE html>
<html>
<head>
  <title>Feedback Page</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{ asset('css/studentHome.css') }}">
</head>
<style>

  /* studentHome.css */

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

h2 {
  margin-top: 0;
  margin-bottom: 20px;
  font-weight: bold;
  color: #333;
}

.feedback-form {
  margin-bottom: 20px;
}

.form-group {
  margin-bottom: 20px;
}

.form-label {
  font-weight: bold;
}

textarea {
  width: 100%;
  min-height: 100px;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 3px;
  resize: vertical;
}

.checkbox-container {
  display: flex;
  align-items: center;
  margin-bottom: 10px;
}

.checkbox-container input[type="checkbox"] {
  margin-right: 6px;
}

.checkbox-container label {
  font-weight: normal;
}

button[type="submit"] {
  display: block;
  width: 100%;
  padding: 10px 20px;
  border: none;
  border-radius: 3px;
  background-color: #007bff;
  color: #fff;
  font-size: 16px;
  font-weight: bold;
  cursor: pointer;
}

button[type="submit"]:hover {
  background-color: #0056b3;
}

#successModal {
  display: none;
  position: fixed;
  z-index: 1;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  overflow: auto;
  background-color: rgba(0, 0, 0, 0.4);
}

#successContent {
  background-color: #c8e6c9; /* Green background color */
  margin: 15% auto;
  padding: 20px;
  border: 1px solid #4caf50; /* Green border color */
  width: 300px;
  text-align: center;
  color: #4caf50; /* Green text color */
}

#closeBtn {
  color: #aaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
  cursor: pointer;
}

#closeBtn:hover,
#closeBtn:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
}

.checkbox-container input[type="checkbox"] {
  margin-right: 6px;
  transform: scale(1.5); /* Increase the size of the checkbox */
}

</style>

<body>
  <div class="container">
    <h2 class="text-center">Give Your Feedback</h2>

    <form action="{{ route('feedback.submit') }}" method="POST" class="feedback-form">
      @csrf


      <div class="form-group checkbox-container">
      <label for="use-student-id">Can we Use your Id and Other Personal Info</label>
  <input type="checkbox" id="use-student-id" name="use-student-id">
  
</div>
      
      <div class="form-group">
        <label for="comment" class="form-label">Feedback or Comment:</label>
        <textarea id="comment" name="comment" class="form-control" rows="4" required></textarea>
      </div>

     
      
      <button type="submit" class="btn btn-primary" onclick="submitForm()">Submit</button>
    </form>
  </div>

 

  <script>

  </script>
</body>
</html>