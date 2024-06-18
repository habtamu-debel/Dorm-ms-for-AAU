<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 4px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333;
            font-size: 28px;
            margin-bottom: 20px;
            border-bottom: 1px solid #ccc;
            padding-bottom: 10px;
        }

        h2 {
            color: #666;
            font-size: 22px;
            margin-top: 30px;
            margin-bottom: 10px;
        }

        p {
            color: #777;
            margin-bottom: 8px;
        }

        .profile-photo {
            text-align: center;
        }

        .profile-photo img {
            width: 200px;
            height: 200px;
            border-radius: 50%;
            object-fit: cover;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .no-photo {
            color: #777;
            font-style: italic;
            margin-top: 10px;
        }

        .profile-info {
            padding-top: 20px;
            border-top: 1px solid #ccc;
        }

        .profile-info h2:first-child {
            margin-top: 0;
        }

        .profile-info p:last-child {
            margin-bottom: 0;
        }

        .profile-info p strong {
            display: inline-block;
            width: 120px;
            font-weight: bold;
        }

        .profile-info p:nth-child(odd) {
            background-color: #f9f9f9;
            padding: 8px 16px;
        }

        .profile-info p:nth-child(even) {
            background-color: #fff;
            padding: 8px 16px;
        }

        .profile-info p:last-child {
            border-radius: 0 0 4px 4px;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Profile</h1>

    <div class="profile-photo">
        @if ($staff->photo)
            <img src="{{ asset('photo/' . $staff->photo) }}" alt="Profile Photo">
        @else
            <p class="no-photo">No photo available</p>
        @endif
    </div>

    <div class="profile-info">
        <h2>Personal Information</h2>
        <p><strong>Staff ID:</strong> {{ $staff->staffid }}</p>
        <p><strong>First Name:</strong> {{ $staff->firstname }}</p>
        <p><strong>Last Name:</strong> {{ $staff->lastname }}</p>
        <p><strong>Email:</strong> {{ $staff->email }}</p>
        <p><strong>Phone:</strong> {{ $staff->phone }}</p>
        <p><strong>Campus:</strong> {{ $staff->campus }}</p>
        <p><strong>Role:</strong> {{ $staff->role }}</p>

        <h2>Location Information</h2>
        <p><strong>Region:</strong> {{ $staff->region }}</p>
        <p><strong>Wereda:</strong> {{ $staff->wereda }}</p>
        <p><strong>Zone:</strong> {{ $staff->zone }}</p>
        <p><strong>Town:</strong> {{ $staff->town }}</p>
    </div>
</div>
</body>
</html>