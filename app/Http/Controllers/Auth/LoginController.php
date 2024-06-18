<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Account;
use App\Models\Staff;
use App\Models\Student;
use App\Models\StudentAccount;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }
    public function login(Request $request)
    {
        $credentials = $request->only('staffid', 'password');
        $staffid = $credentials['staffid'];
    
        $validationRules = [
            'staffid' => 'required',
            'password' => 'required',
        ];
    
        $validationMessages = [
            'staffid.required' => 'Please enter a staff ID.',
            'password.required' => 'Please enter a password.',
        ];
    
        $validator = Validator::make($credentials, $validationRules, $validationMessages);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        // Check if the staff ID exists in the StudentAccount table
        $studentAccount = StudentAccount::where('student_id', $staffid)->first();
    
        if ($studentAccount) {
            // Student user found, check password
            if (sha1($credentials['password']) === $studentAccount->password) {
                // Password is correct, fetch the student's first and last name
                $student = Student::where('student_id', $staffid)->first();
    
                if ($student) {
                    // Redirect to the student home page with the student's name
                    session(['user' => $studentAccount, 'firstName' => $student->firstname, 'lastName' => $student->lastname,'department' => $student->department,'year' => $student->year]);
                    return redirect()->route('studentHome')->with('student_id', $studentAccount->student_id);
                } else {
                    // Student record not found, display an error message
                    $validator->errors()->add('staffid', 'Incorrect staff ID or password. Please try again.');
                    return redirect()->back()->withErrors($validator)->withInput();
                }
            } else {
                // Incorrect password, display error message below password input
                $validator->errors()->add('password', 'Incorrect staff ID or password. Please try again.');
                return redirect()->back()->withErrors($validator)->withInput();
            }
        } else {
            // User not found in the StudentAccount table, check the Account table
            $account = Account::where('staffid', $staffid)->first();
    
            if ($account) {
                // Staff user found, check password
                if (Hash::check($credentials['password'], $account->password)) {
                    // Password is correct, fetch the staff role from the Staff model
                    $staff = Staff::where('staffid', $staffid)->first();
    
                    if ($staff) {
                        // Redirect to the appropriate page based on the staff role
                        session(['user' => $staff]);
    
                        if ($staff->role == 'Proctor') {
                            return redirect()->route('proctorHome')->with('staffid', $staff->staffid);
                        } elseif ($staff->role == 'Admin') {
                            return redirect()->route('adminHome', ['staffid' => $staff->staffid]);
                        }
                            elseif ($staff->role == 'Proctor Manager') {
                                return redirect()->route('proctorManagerHome', ['staffid' => $staff->staffid]);
                        } // Add more conditions for other staff roles
                        elseif ($staff->role == 'Dean of Students') {
                            return redirect()->route('deanOfStudentHome', ['staffid' => $staff->staffid]);
                    } //
                    elseif ($staff->role == 'Proctor Director') {
                        return redirect()->route('proctorDirectorHome', ['staffid' => $staff->staffid]);
                } //
                elseif ($staff->role == 'Registrar') {
                    return redirect()->route('registrarHome', ['staffid' => $staff->staffid]);
            } //

                    } else {
                        // Staff record not found, display an error message
                        $validator->errors()->add('staffid', 'Incorrect staff ID or password. Please try again.');
                        return redirect()->back()->withErrors($validator)->withInput();
                    }
                } else {
                    // Incorrect password, display error message below password input
                    $validator->errors()->add('password', 'Incorrect staff ID or password. Please try again.');
                    return redirect()->back()->withErrors($validator)->withInput();
                }
            } else {
                // User not found in both StudentAccount and Account tables
                $validator->errors()->add('staffid', 'Incorrect staff ID or password. Please try again.');
                return redirect()->back()->withErrors($validator)->withInput();
            }
        }
    }}