<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Block;
use Illuminate\Validation\Rule;
class BlockController extends Controller
{
    public function store(Request $request)
{
    // Validate the form data
    $validatedData = $request->validate([
        'blockName' => [
            'required',
            Rule::unique('blocks')->ignore($request->input('id')),
        ],
        'capacity' => 'required|numeric',
        'floor'   =>'required|numeric',
    ]);

    // Create a new Block instance with the validated data
    $block = new Block();
    $user = session('user');
    $block->staffid = session('user')->staffid;
    $block->blockName = $request->blockName;
    $block->capacity = $request->capacity;
    $block->floor = $request->floor;
    $block->numRooms = $request->numRooms;
    $block->light = $request->has('light');
    $block->lightNumber = $request->lightNumber;
    $block->bathroom = $request->has('bathroom');
    $block->bathroomNumber = $request->bathroomNumber;
    $block->fireHydrant = $request->has('fireHydrant');
    $block->fireHydrantNumber = $request->fireHydrantNumber;
    $block->specialFacility = $request->has('specialFacility');
    $block->specialFacilityNumber = $request->specialFacilityNumber;
    $block->toilet = $request->has('toilet');
    $block->toiletNumber = $request->toiletNumber;
    $block->mirror = $request->has('mirror');
    $block->mirrorNumber = $request->mirrorNumber;

    // Save the block to the database
    $block->save();

    return redirect()->route('blocks.index')->with('success', 'Block created successfully');
}

public function index()
{
    $blocks = Block::all();

    return view('proctor.blockDisplay', compact('blocks'));
}


public function edit(Block $block)
    {
        // Retrieve the room from the database and pass it to the view for editing
        return view('proctor.blockEdit', compact('block'));
    }

public function update(Request $request, Block $block)
{
    // Validate the form data
    $request->validate([
        'blockName' => 'required|string',
        'capacity' => 'required|integer|min:1',
        'floor' => 'required|integer',
        'room_number' => 'required|string',
        'light' => 'nullable|in:on,off',
        'light_number' => 'nullable|string',
        'bathroom' => 'nullable|in:on,off',
        'bathroom_number' => 'nullable|string',
        'fire_hydrant' => 'nullable|in:on,off',
        'fire_hydrant_number' => 'nullable|string',
        'special_facility' => 'nullable|in:on,off',
        'special_facility_number' => 'nullable|string',
        'toilet' => 'nullable|in:on,off',
        'toilet_number' => 'nullable|string',
        'mirror' => 'nullable|in:on,off',
        'mirror_number' => 'nullable|string',
    ]);

    // Convert checkbox values to 1 and 0
    $light = $request->input('light') === 'on' ? 1 : 0;
    $bathroom = $request->input('bathroom') === 'on' ? 1 : 0;
    $fireHydrant = $request->input('fire_hydrant') === 'on' ? 1 : 0;
    $specialFacility = $request->input('special_facility') === 'on' ? 1 : 0;
    $toilet = $request->input('toilet') === 'on' ? 1 : 0;
    $mirror = $request->input('mirror') === 'on' ? 1 : 0;

    // Update the block data in the database
    $block->blockName = $request->input('blockName');
    $block->numRooms = $request->input('room_number');
    $block->capacity = $request->input('capacity');
    $block->floor = $request->input('floor');
    $block->light = $request->input('light') === 'on' ? 1 : 0;
    $block->lightNumber = $request->input('light_number');
    $block->bathroom = $bathroom;
    $block->bathroomNumber = $request->input('bathroom_number');
    $block->firehydrant = $fireHydrant;
    $block->fireHydrantNumber = $request->input('fire_hydrant_number');
    $block->specialFacility = $specialFacility;
    $block->specialFacilityNumber = $request->input('special_facility_number');
    $block->toilet = $toilet;
    $block->toiletNumber = $request->input('toilet_number');
    $block->mirror = $mirror;
    $block->mirrorNumber = $request->input('mirror_number');
    $block->save();

    // Redirect to the index function to display all the values in the blocks table
    return redirect()->action([BlockController::class, 'index'])->with('success', 'Block updated successfully');
}

public function destroy(Block $block)
{
    // Delete the block from the database
    $block->delete();

    // Redirect to the index function to display all the blocks
    return redirect()->action([BlockController::class, 'index'])->with('success', 'Block deleted successfully');
}


}
