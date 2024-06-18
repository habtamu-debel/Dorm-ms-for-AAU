<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Block;
use Illuminate\Validation\Rule;

class RoomController extends Controller
{
    public function store(Request $request)
    {// Validate the form data
    $validatedData = $request->validate([
        'block' => 'required',
        'roomNumber' => [
            'required',
            Rule::unique('rooms')->where(function ($query) use ($request) {
                return $query->where('block', $request->block);
            })
        ],
        'capacity' => 'required|numeric',
    ]);

    // Create a new Room instance with the validated data
    $room = new Room();
    $room->block = $request->block;
    $room->floor = $request->floor;
    $room->roomNumber = $request->roomNumber;
    $room->capacity = $request->capacity;
    $room->locker = $request->has('locker');
    $room->lockerNumber = $request->lockerNumber;
    $room->table = $request->has('table');
    $room->tableNumber = $request->tableNumber;
    $room->chair = $request->has('chair');
    $room->chairNumber = $request->chairNumber;
    $room->light = $request->has('light');
    $room->lightNumber = $request->lightNumber;
    $room->charger = $request->has('charger');
    $room->chargerNumber = $request->chargerNumber;

    // Save the room to the database
    $room->save();
     return redirect()->action([RoomController::class, 'index'])->with('success', 'Room updated successfully');
    }


public function index()
{
    $rooms = Room::all();

    return view('proctor.roomsDisplay', compact('rooms'));
}

public function edit(Room $room)
    {
        // Retrieve the room from the database and pass it to the view for editing
        return view('proctor.editRoom', compact('room'));
    }

    public function update(Request $request, Room $room)
    {
        // Validate the form data
        $request->validate([
            'block' => 'required|string',
        'room_number' => 'required|string',
        'capacity' => 'required|integer|min:1',
        'locker' => 'nullable|in:on,off',
        'locker_number' => 'nullable|string',
        'table' => 'nullable|in:on,off',
        'table_number' => 'nullable|string',
        'chair' => 'nullable|in:on,off',
        'chair_number' => 'nullable|string',
        'light' => 'nullable|in:on,off',
        'light_number' => 'nullable|string',
        'charger' => 'nullable|in:on,off',
        'charger_number' => 'nullable|string',
        ]);
    
        // Convert checkbox values to 1 and 0
        $locker = $request->input('locker') === 'on' ? 1 : 0;
        $table = $request->input('table') === 'on' ? 1 : 0;
        $chair = $request->input('chair') === 'on' ? 1 : 0;
        $light = $request->input('light') === 'on' ? 1 : 0;
        $charger = $request->input('charger') === 'on' ? 1 : 0;
    
        // Update the room data in the database
        $room->block = $request->input('block');
    $room->roomNumber = $request->input('room_number');
    $room->capacity = $request->input('capacity');
    $room->locker = $request->input('locker') === 'on' ? 1 : 0;
    $room->lockerNumber = $request->input('locker_number');
    $room->table = $request->input('table') === 'on' ? 1 : 0;
    $room->tableNumber = $request->input('table_number');
    $room->chair = $request->input('chair') === 'on' ? 1 : 0;
    $room->chairNumber = $request->input('chair_number');
    $room->light = $request->input('light') === 'on' ? 1 : 0;
    $room->lightNumber = $request->input('light_number');
    $room->charger = $request->input('charger') === 'on' ? 1 : 0;
    $room->chargerNumber = $request->input('charger_number');
    $room->save();

        // Redirect to the index function to display all the values in the rooms table
        return redirect()->action([RoomController::class, 'index'])->with('success', 'Room updated successfully');
    }
    public function destroy(Room $room)
    
    {
       
        // Delete the room from the database
        $room->delete();
    
        // Redirect to the index function to display all the rooms
        return redirect()->action([RoomController::class, 'index'])->with('success', 'Room deleted successfully');
    }


    public function roomRegister()
    {
        // Retrieve all block names from the blocks table
        $blockNames = Block::pluck('blockName')->all();
        
        // Retrieve all distinct floors from the blocks table
        $floors = Block::distinct()->pluck('floor')->all();
    
        return view('proctor.roomRegister', ['blockNames' => $blockNames, 'floors' => $floors]);
    }

    public function blockStore(Request $request)
    {
        dd('fgjgjf');
    
        // Retrieve the block name from the session or the request
        $blockName = $request->session()->get('blockName', $request->input('blockName'));

        // Create a new block instance or retrieve an existing one
        $block = Block::firstOrCreate(['name' => $blockName]);

        return view('blocks.register', compact('block'));
    }

}