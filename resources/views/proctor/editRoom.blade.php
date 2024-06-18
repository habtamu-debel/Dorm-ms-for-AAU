<!DOCTYPE html>
<html>
<head>
    <title>Edit Room</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/styles.css') }}">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
        }

        h1 {
            color: #333;
        }

        form {
            margin-top: 20px;
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="checkbox"] {
            margin-top: 5px;
        }

        button[type="submit"] {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #4caf50;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #45a049;
        }

        #error-message {
            color: red;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit Room</h1>

        <form action="{{ route('rooms.update', $room->roomNumber) }}" method="POST">
            @csrf
            @method('PUT')

            <div>
                <label for="block">Block:</label>
                <input type="text" id="block" name="block" value="{{ $room->block }}">
            </div>

            <div>
                <label for="room_number">Room Number:</label>
                <input type="text" id="room_number" name="room_number" value="{{ $room->roomNumber }}">
            </div>

            <div>
                <label for="capacity">Capacity:</label>
                <input type="number" id="capacity" name="capacity" value="{{ $room->capacity }}">
            </div>

            <div>
                <label for="locker">Locker:</label>
                <input type="checkbox" id="locker" name="locker" {{ $room->locker ? 'checked' : '' }}>
            </div>

            <div>
                <label for="locker_number">Locker Number:</label>
                <input type="text" id="locker_number" name="locker_number" value="{{ $room->lockerNumber }}">
            </div>

            <div>
                <label for="table">Table:</label>
                <input type="checkbox" id="table" name="table" {{ $room->table ? 'checked' : '' }}>
            </div>

            <div>
                <label for="table_number">Table Number:</label>
                <input type="text" id="table_number" name="table_number" value="{{ $room->tableNumber }}">
            </div>

            <div>
                <label for="chair">Chair:</label>
                <input type="checkbox" id="chair" name="chair" {{ $room->chair ? 'checked' : '' }}>
            </div>

            <div id="chairNumberField" style="{{ $room->chair ? '' : 'display: none;' }}">
                <label for="chair_number">Chair Number:</label>
                <input type="text" id="chair_number" name="chair_number" value="{{ $room->chairNumber }}">
            </div>

            <div>
                <label for="light">Light:</label>
                <input type="checkbox" id="light" name="light" {{ $room->light ? 'checked' : '' }}>
            </div>

            <div id="lightNumberField" style="{{ $room->light ? '' : 'display: none;' }}">
                <label for="light_number">Light Number:</label>
                <input type="text" id="light_number" name="light_number" value="{{ $room->lightNumber }}">
            </div>

            <div>
                <label for="charger">Charger:</label>
                <input type="checkbox" id="charger" name="charger" {{ $room->charger ? 'checked' : '' }}>
            </div>

            <div id="chargerNumberField" style="{{ $room->charger ? '' : 'display: none;' }}">
                <label for="charger_number">Charger Number:</label>
                <input type="text" id="charger_number" name="charger_number" value="{{ $room->chargerNumber }}">
            </div>

        <!-- Add more fields as needed -->

        <button type="submit">Update</button>
    </form>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var chairCheckbox = document.getElementById('chair');
            var chairNumberField = document.getElementById('chairNumberField');
            chairCheckbox.addEventListener('change', function() {
                chairNumberField.style.display = chairCheckbox.checked ? '' : 'none';
            });

            var lightCheckbox = document.getElementById('light');
            var lightNumberField = document.getElementById('lightNumberField');
            lightCheckbox.addEventListener('change', function() {
                lightNumberField.style.display = lightCheckbox.checked ? '' : 'none';
            });

            var chargerCheckbox = document.getElementById('charger');
            var chargerNumberField = document.getElementById('chargerNumberField');
            chargerCheckbox.addEventListener('change', function() {
                chargerNumberField.style.display = chargerCheckbox.checked ? '' : 'none';
            });
        });
    </script>
</body>
</html>