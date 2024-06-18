<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BuildingMaintenance;
use Carbon\Carbon;
use App\Models\Block;
class BuildingMaintenanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            
            'category' => 'required',
            'occurrence' => 'required',
            'impact' => 'required',
            'urgency' => 'required',
            'room' => 'required',
            'description' => 'required',
            'contact' => 'required',
        ]);
        $validatedData['occurrence'] = Carbon::createFromFormat('d/m/Y', $validatedData['occurrence'])->toDateTimeString();
        BuildingMaintenance::create($validatedData);
        $buildingMaintenance = BuildingMaintenance::create($validatedData);

        return view('proctor.maintenancePrint', ['buildingMaintenance' => $buildingMaintenance]);
    }


    public function home()
    {

        $blockNames = Block::pluck('blockName')->all();
        
        // Retrieve all distinct floors from the blocks table
        $floors = Block::distinct()->pluck('floor')->all();
    
        return view('proctor.buildingMaintenance', compact('blockNames', 'floors'));
       
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
