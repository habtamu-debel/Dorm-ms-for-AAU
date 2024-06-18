<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Staff;


class StaffController extends Controller
{
    public function index()
{
    
    $staffs = Staff::all();
    
    return view('staffDisplay', compact('staffs'));
}

public function edit($id)
{
    $staff = Staff::find($id);

    if (!$staff) {
        return redirect()->back()->with('error', 'Staff not found.');
    }

    return view('editStaff', compact('staff'));
}

public function update(Request $request, $id)
{
    $staff = Staff::find($id);

    if (!$staff) {
        return redirect()->back()->with('error', 'Staff not found.');
    }

    // Validate the request data
    $validatedData = $request->validate([
        'firstname' => 'required',
        'lastname' => 'required',
        'email' => 'required|email',
    
        'phone' => 'required|numeric',
        'campus' => 'required',
    ]);

    // Update the staff record
    $staff->firstname = $validatedData['firstname'];
    $staff->lastname = $validatedData['lastname'];
    $staff->email = $validatedData['email'];
    
    $staff->phone = $validatedData['phone'];
    $staff->campus = $validatedData['campus'];
    // Update other fields as needed
    $staff->save();
   

    return redirect()->route('staffs.index')->with('success', 'Staff updated successfully.');
}

public function destroy($id)
{
    $staff = Staff::find($id);

    if (!$staff) {
        return redirect()->back()->with('error', 'Staff not found.');
    }

    $staff->delete();

    return redirect()->route('staffs.index')->with('success', 'Staff deleted successfully.');
}


public function destination()
{
    return view('admin.adminRegister');
}

}
