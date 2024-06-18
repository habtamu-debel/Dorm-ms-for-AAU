<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Staff;

class ProfileController extends Controller
{
    public function create()
    {
        return view('proctor.profile');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'region' => 'required',
            'wereda' => 'required',
            'zone' => 'required',
            'town' => 'required',
            'photo' => 'required|image|mimes:jpeg,jpg,png|max:2048',
        ]);
    
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photoPath = $photo->store('photos', 'public');
        }
    
        $user = session('user');
        $staff = Staff::where('staffid', $user->staffid)->first();
    
        if ($staff) {
            $staff->region = $validatedData['region'];
            $staff->wereda = $validatedData['wereda'];
            $staff->zone = $validatedData['zone'];
            $staff->town = $validatedData['town'];
            $staff->photo = $photoPath ?? null;
            $staff->save();
    
            return redirect('proctor.myprofile');
        } else {
            return redirect()->back()->with('error', 'Staff not found');
        }
    }

    public function show()
{
    $user = session('user');
    $staff = Staff::where('staffid', $user->staffid)->first();

    return view('proctor.myprofile', compact('staff'));
}
}
