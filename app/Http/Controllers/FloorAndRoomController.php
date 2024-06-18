<?php

namespace App\Http\Controllers;

use App\Models\Room;

class FloorAndRoomController extends Controller
{
    public function getFloorsAndRooms($blockId)
    {
        // Retrieve floors and numRooms based on the provided block ID
        $floors = Room::where('block', $blockId)->distinct()->pluck('floor')->all();
        $rooms = Room::where('block', $blockId)->distinct()->pluck('roomNumber')->all();

        // Return the floors and numRooms as JSON
        return response()->json([
            'floors' => $floors,
            'rooms' => $rooms
        ]);
    }
}
