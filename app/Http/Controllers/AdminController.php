<?php


namespace App\Http\Controllers;
use App\Models\Staff;
use App\Models\Account;
use Illuminate\Support\Facades\Mail;

use Illuminate\Http\Request;
use App\Mail\StaffRegistrationMail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    // App\Http\Controllers\AdminController.php
    public function register(Request $request)
    {
        // Validate the form data
        $validator = Validator::make($request->all(), [
            'staffid' => 'required|string|unique:accounts,staffid',
            'firstname' => 'required|regex:/^[a-zA-Z]+$/|min:2',
            'lastname' => 'required|regex:/^[a-zA-Z]+$/|min:2',
            'email' => 'required|email|unique:staffs,email',
            'password' => 'required|string',
            'phone' => 'required|string|regex:/^\+?251[0-9]{9}$/',
            'role' => 'required|string',
            'campus' => 'required|string',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        $validatedData = $validator->validated();
        $validatedData['password'] = Hash::make($validatedData['password']);
    
        // Create a new account record
        $account = Account::create([
            'staffid' => $validatedData['staffid'],
            'password' => $validatedData['password'],
        ]);
    
        // Create a new staff record
        $staff = Staff::create([
            'staffid' => $validatedData['staffid'],
            'firstname' => $validatedData['firstname'],
            'lastname' => $validatedData['lastname'],
            'email' => $validatedData['email'],
            'password' => $validatedData['password'],
            'phone' => $validatedData['phone'],
            'role' => $validatedData['role'],
            'campus' => $validatedData['campus'],
        ]);
    
        // Optionally, you can perform additional actions here, such as sending a confirmation email
        // Send the email
        // Mail::to($staff->email)->send(new StaffRegistrationMail($validatedData['password']));
    
        // Redirect the user to a success page or perform any other desired action
        return redirect()->route('admin.success');
    }
}