<!DOCTYPE html>
<html>
<head>
    <title>Edit Lost and Found Request</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }

        .container {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 4px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-top: 0;
            color: #333;
        }

        form {
            margin-top: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: bold;
            color: #666;
        }

        input[type="text"],
        input[type="date"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit Lost and Found Request</h1>

        <form action="{{ route('lostandfound.update', $lostAndFound->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="item_status">Item Status:</label>
                <input type="text" id="item_status" name="item_status" value="{{ $lostAndFound->item_status }}" required>
            </div>

            <div class="form-group">
                <label for="item_name">Item Name:</label>
                <input type="text" id="item_name" name="item_name" value="{{ $lostAndFound->item_name }}" required>
            </div>

            <div class="form-group">
                <label for="location_found">Location Found:</label>
                <input type="text" id="location_found" name="location_found" value="{{ $lostAndFound->location_found }}" required>
            </div>

            <div class="form-group">
                <label for="date_found">Date Found:</label>
                <input type="date" id="date_found" name="date_found" value="{{ $lostAndFound->date_found }}" required>
            </div>

            <button type="submit">Update</button>
        </form>
    </div>
</body>
</html>