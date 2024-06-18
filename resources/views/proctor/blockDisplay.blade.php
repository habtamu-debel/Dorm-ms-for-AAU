<!DOCTYPE html>
<html>
<head>
    <title>Blocks in FBE Dormitory</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <style>
        /* styles.css */

        .block-container {
            margin-bottom: 20px;
            padding: 10px;
            border: 1px solid #ccc;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
        }

        .block-container h2 {
            font-size: 20px;
            color: #333;
        }

        .block-container p {
            font-size: 16px;
            color: #666;
            margin: 5px 0;
        }

        .block-container .yes {
            color: green;
        }

        .block-container .no {
            color: red;
        }

        /* styles.css */

        .block-row {
            display: flex;
            margin-bottom: 20px;
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

        /* Additional CSS */

        .blocks-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .block-container {
            flex: 0 0 auto;
            margin: 10px;
            width: 300px; /* Adjust the width as needed */
        }
    </style>
</head>
<body>
<h2>Blocks In FBE Dormitory</h2>
<div class="blocks-container">
    @foreach ($blocks as $block)
        <div class="block-container">
            <h2>Block: {{ $block->blockName }}</h2>
            <p>Capacity: {{ $block->capacity }}</p>
            <p>Floor: {{ $block->floor }}</p>
            <p>Number of Rooms: {{ $block->numRooms }}</p>

            @if ($block->light)
                <p class="yes">Light: Yes (Number: {{ $block->lightNumber }})</p>
            @else
                <p class="no">Light: No</p>
            @endif

            @if ($block->bathroom)
                <p class="yes">Bathroom: Yes (Number: {{ $block->bathroomNumber }})</p>
            @else
                <p class="no">Bathroom: No</p>
            @endif

            @if ($block->fireHydrant)
                <p class="yes">Fire Hydrant: Yes (Number: {{ $block->fireHydrantNumber }})</p>
            @else
                <p class="no">Fire Hydrant: No</p>
            @endif

            @if ($block->specialFacility)
                <p class="yes">Special Facility: Yes (Number: {{ $block->specialFacilityNumber }})</p>
            @else
                <p class="no">Special Facility: No</p>
            @endif

            @if ($block->toilet)
                <p class="yes">Toilet: Yes (Number: {{ $block->toiletNumber }})</p>
            @else
                <p class="no">Toilet: No</p>
            @endif

            @if ($block->mirror)
                <p class="yes">Mirror: Yes (Number: {{ $block->mirrorNumber }})</p>
            @else
                <p class="no">Mirror: No</p>
            @endif

            <div class="buttons">
                <a href="{{ route('blocks.edit', $block->blockName) }}" class="edit-button">Edit</a>
                <form action="{{ route('blocks.destroy', $block->blockName) }}" method="POST" onsubmit="return confirmDelete(event)">
    @csrf
    @method('DELETE')
    <button type="submit" class="delete-button" data-block-name="{{ $block->blockName }}">Delete</button>
</form>
            </div>
        </div>
    @endforeach
</div>

<script>
    function confirmDelete(event) {
        var blockName = event.target.getAttribute('data-block-name');
        var result = confirm("Are you sure you want to delete the block: " + blockName + "?");

        if (!result) {
            event.preventDefault();
        }

        return result;
    }
</script>
</body>
</html>