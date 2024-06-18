<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CheckIn;
use App\Models\Room;


class DormCheckInController extends Controller
{
    public function show(Request $request)
    {
        $roomNumber = $request->input('roomNumber');
        $room = Room::where('roomNumber', $roomNumber)->first();
        $roomResources = $room->resources;
    
        return view('your-view-file', [
            'room' => $room,
            'roomResources' => $roomResources,
        ]);
    }
    public function confirm($roomNumber)
{
    // Logic to mark the room as confirmed

    return redirect()->route('home')->with('success', 'Room confirmed successfully.');
}

public function objection($roomNumber)
{
    // Logic to handle objections for the room

    return redirect()->route('home')->with('success', 'Objection submitted successfully.');
}





}
