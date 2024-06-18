<!DOCTYPE html>
<html>
<head>
  <title>Navigation Bar, Proctor Info, and Footer Example</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{ asset('css/adminHome.css') }}">
</head>
<body>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f1f1f1;
        margin: 0;
        padding: 20px;
    }

    h2 {
        text-align: center;
        color: #333;
        margin-top: 50px;
        font-size: 36px;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
    }

    .container {
        max-width: 600px;
        margin: 0 auto;
        background-color: #fff;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .success-message {
        text-align: center;
        color: #4CAF50;
        font-size: 24px;
        margin-top: 30px;
    }

    .success-icon {
        display: block;
        text-align: center;
        margin-bottom: 20px;
    }

    .success-icon img {
        width: 100px;
        height: 100px;
    }
</style>
</head>
<body>
    <div class="container">
        <div class="success-icon">
            <img src="success-icon.png" alt="Success Icon">
        </div>
        <h2>Success</h2>
        <p class="success-message">Your action was successful!</p>
        <a href="{{ route('admin.showStaffs') }}" class="btn btn-primary">Show all Staffs</a>
    </div>
    
</body>
</html>
</body>
</html>