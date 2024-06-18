<!DOCTYPE html>
<html>
<head>
  <title>Rooms In FBE Dormitory</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
  <style>
    /* styles.css */

    .block-container {
        display: flex;
        flex-wrap: wrap;
        margin-left:150px;
    }

    .room-container {
        flex: 0 0 25%;
        margin: 10px;
        padding: 10px;
        border: 1px solid #ccc;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
    }

    .room-container h2 {
        font-size: 20px;
        color: #333;
    }

    .room-container p {
        font-size: 16px;
        color: #666;
        margin: 5px 0;
    }

    .room-container .yes {
        color: green;
    }

    .room-container .no {
        color: red;
    }

    /* styles.css */

    .buttons {
        display: flex;
        justify-content: space-between;
        margin-top: 10px;
    }

    .edit-button,
    .delete-button {
        background-color: #4CAF50;
        color: white;
        padding: 8px 16px;
        text-decoration: none;
        border-radius: 4px;
    }

    .edit-button {
        background-color: #4CAF50;
        color: white;
        padding: 8px 16px;
        text-decoration: none;
        border-radius: 4px;
    }

    .delete-button {
        background-color: #f44336;
        color: white;
        padding: 8px 16px;
        text-decoration: none;
        border-radius: 4px;
    }
  </style>
</head>
<body>
<h2>Rooms In FBE Dormitory</h2>
<div class="block-container">
    @foreach ($rooms as $room)
    <div class="room-container">
        <h2>Room in FBE Dormitory</h2>
        <h2>Block-{{ $room->block }} <br> Room-{{ $room->roomNumber }}</h2>
        <p>Capacity: {{ $room->capacity }}</p>

        @if ($room->locker)
            <p class="yes">Locker: Yes (Number: {{ $room->lockerNumber }})</p>
        @else
            <p class="no">Locker: No</p>
        @endif

        @if ($room->table)
            <p class="yes">Table: Yes (Number: {{ $room->tableNumber }})</p>
        @else
            <p class="no">Table: No</p>
        @endif

        @if ($room->chair)
            <p class="yes">Chair: Yes (Number: {{ $room->chairNumber }})</p>
        @else
            <p class="no">Chair: No</p>
        @endif

        @if ($room->light)
            <p class="yes">Light: Yes (Number: {{ $room->lightNumber }})</p>
        @else
            <p class="no">Light: No</p>
        @endif

        @if ($room->charger)
            <p class="yes">Charger: Yes (Number: {{ $room->chargerNumber }})</p>
        @else
            <p class="no">Charger: No</p>
        @endif

        <div class="buttons">
            <a href="{{ route('rooms.edit', $room->roomNumber) }}" class="edit-button">Edit</a>
            <form action="{{ route('rooms.destroy', $room->roomNumber) }}" method="POST" onsubmit="return confirmDelete(event)">
    @csrf
    @method('DELETE')
    <button type="submit" class="delete-button">Delete</button>
</form>
        </div>
    </div>
    @endforeach
</div>

<script>
    function confirmDelete(event) {
        var roomNumber = event.target.getAttribute('data-room-number');
        var result = confirm("Are you sure you want to delete the room ?");

        if (!result) {
            event.preventDefault();
        }

        return result;
    }
</script>
</body>
</html>