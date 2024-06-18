<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Staff;
use App\Models\Room;
use App\Models\ProctorStudentList;
use App\Models\ManagerStudentList;
use App\Models\Block;


class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function filterStudents(Request $request)
    {

        dd('kjfkjhj');
        $query = Student::query();

        if ($request->has('year')) {
            $query->where('year', $request->input('year'));
        }

        if ($request->has('department')) {
            $query->where('department', $request->input('department'));
        }

        if ($request->has('id')) {
            $query->where('student_id', $request->input('id'));
        }

        $students = $query->get();
        return redirect()->action([StudentController::class, 'showStudents'])->with('success', 'Maintenance request deleted successfully!');
    }

    public function sendFilteredStudents(Request $request)
    {
        $selectedStudentIds = $request->input('student_ids', []);
    
        // Retrieve all the student information
        $allStudents = Student::select('student_id', 'firstname', 'lastname', 'department','year', 'sex')->get();
    
        // Filter the students based on the selected student IDs
        $students = $allStudents->whereIn('student_id', $selectedStudentIds);
    
        // Insert the selected student IDs into the proctorstudentslist table
      
    
        // Update the status of the selected students
        Student::whereIn('student_id', $selectedStudentIds)
               ->update([
                   'status' => 'sent',
               ]);
    
        $request->session()->flash('success', 'Filtered students sent successfully!');
        // Redirect to the desired route
        return redirect()->route('showStudents');
    }
    public function showStudents()
{
    $students = Student::all();
    return view('Registrar.studentList', ['students' => $students]);

}

public function studentsInfo()
{
    $students = Student::all();
    return view('proctor.studentInfo', ['students' => $students]);

}

public function viewStudents()
{
    $students = Student::where('status', 'sent')->get();
    return view('Proctor Director.studentList', ['students' => $students]);
}


public function PMshowStudents()
{
    $students = Student::where('pdstatus', 'sent')->get();
    return view('Proctor Manager.studentList', ['students' => $students]);

}

public function PDsendFilteredStudents (Request $request)
    {
        $selectedStudentIds = $request->input('student_ids', []);
    
        // Retrieve all the student information
        $allStudents = Student::select('student_id', 'firstname', 'lastname', 'department','year', 'sex')->get();
    
        // Filter the students based on the selected student IDs
        $students = $allStudents->whereIn('student_id', $selectedStudentIds);
    
        // Insert the selected student IDs into the proctorstudentslist table
      
    
        // Update the status of the selected students
        Student::whereIn('student_id', $selectedStudentIds)
               ->update([
                   'pdstatus' => 'sent',
               ]);
    
          $request->session()->flash('success', 'Filtered students sent successfully!');
    // Redirect to the desired route
    return redirect()->route('viewStudents');
    }
     /* Show the form for creating a new resource.
     */



     
public function PMsendFilteredStudents (Request $request)
{
    $selectedStudentIds = $request->input('student_ids', []);

    // Retrieve all the student information
    $allStudents = Student::select('student_id', 'firstname', 'lastname', 'department','year', 'sex')->get();

    // Filter the students based on the selected student IDs
    $students = $allStudents->whereIn('student_id', $selectedStudentIds);

    // Insert the selected student IDs into the proctorstudentslist table
  

    // Update the status of the selected students
    Student::whereIn('student_id', $selectedStudentIds)
           ->update([
               'pmstatus' => 'sent',
           ]);

      $request->session()->flash('success', 'Filtered students sent successfully!');
// Redirect to the desired route
return redirect()->route('PMshowStudents');
}
// In your controller
public function studentList(Request $request)
{
    $user = session('user');
    $studentId = $user->staffid;

    // Retrieve the student's sex from the staffs table based on the student ID
    $student = Staff::where('staffid', $studentId)->first();
    $studentSex = $student->sex;

    // Construct the appropriate query based on the student's sex
    if ($studentSex == 'M') {
        $students = Student::where('sex', 'M')
                          ->where('pmstatus', 'sent')
                          ->get();
    } elseif ($studentSex == 'F') {
      
        $students = Student::where('sex', 'F')
                          ->where('pmstatus', 'sent')
                          ->get();
    } else {
        // Handle the case where the student's sex is not 'M' or 'F'
        $students = [];
    }

    $blocks = Block::pluck('blockName')->all();
    $floors = Block::distinct()->pluck('floor')->all();
    $rooms = Block::distinct()->pluck('numRooms')->all();

    return view('proctor.studentList', [
        'blocks' => $blocks,
        'floors' => $floors,
        'rooms' => $rooms,
        'students' => $students
    ]);
}
public function allocate(Request $request)
{
    $selectedStudentIds = $request->input('student_ids');

    $block = $request->input('block_id');
    $floor = $request->input('floor_id');
    $room = $request->input('room_id');

    // Validate the inputs if necessary

    if (is_null($selectedStudentIds) || !is_array($selectedStudentIds)) {
        return redirect()->action([StudentController::class, 'studentList'])->with('error', 'Please select at least one student.');
    }

    $numSelectedStudents = count($selectedStudentIds);
    $allocatedStudents = 0;
    $currentRoom = $room;

    // Get the room capacity
    $roomCapacity = $this->getRoomCapacity($block, $floor, $currentRoom);

    // Get the number of students already allocated to the current room
    $numAllocatedStudents = Student::where('block', $block)
                                   ->where('floor', $floor)
                                   ->where('room', $currentRoom)
                                   ->count();

    // Calculate the remaining capacity in the current room
    $remainingCapacity = $roomCapacity - $numAllocatedStudents;

    // Allocate students iteratively if the selected students are greater than 8
    if ($numSelectedStudents > 8) {
        for ($i = 0; $i < $numSelectedStudents; $i++) {
            // If the current room is full, move to the next room
            if ($remainingCapacity == 0) {
                $currentRoom++;
                $roomCapacity = $this->getRoomCapacity($block, $floor, $currentRoom);
                $numAllocatedStudents = Student::where('block', $block)
                                               ->where('floor', $floor)
                                               ->where('room', $currentRoom)
                                               ->count();
                $remainingCapacity = $roomCapacity - $numAllocatedStudents;
            }

            // Allocate the student to the current room
            $student = Student::findOrFail($selectedStudentIds[$i]);
            $student->block = $block;
            $student->floor = $floor;
            $student->room = $currentRoom;
            $student->save();
            $allocatedStudents++;
            $remainingCapacity--;
        }
    } else {
        // If the selected students are less than or equal to 8, allocate all of them to the specified room
        if ($numSelectedStudents > $remainingCapacity) {
            return redirect()->action([StudentController::class, 'studentList'])
                ->with('error', 'The selected room has reached its maximum capacity. The maximum number of students you can assign to this room is ' . $remainingCapacity . '.');
        }

        for ($i = 0; $i < $numSelectedStudents; $i++) {
            $student = Student::findOrFail($selectedStudentIds[$i]);
            $student->block = $block;
            $student->floor = $floor;
            $student->room = $currentRoom;
            $student->save();
            $allocatedStudents++;
        }
    }

    return redirect()->action([StudentController::class, 'studentList'])->with('success', 'Room(s) updated successfully');
}

private function getRoomCapacity($block, $floor, $room)
{
    // Query the rooms table to get the room capacity
    $roomCapacity = Room::where('block', $block)
                        ->where('floor', $floor)
                        ->where('roomNumber', $room)
                        ->value('capacity');

    return $roomCapacity ?? 0;
}


public function viewDorm()
{


    $user = session('user');
    $studentId = $user->student_id;
    $student = Student::findOrFail( $studentId);
    

    $block = $student->block;
    $floor = $student->floor;
    $room = $student->room;


    // Get the other students assigned to the same room
    $roommates = Student::where('block', $block)
                         ->where('floor', $floor)
                         ->where('room', $room)
                         ->where('student_id', '!=',$studentId)
                         ->get();

                        

    return view('students.viewDorm', [
        'student' => $student,
        'block' => $block,
        'floor' => $floor,
        'room' => $room,
        'roommates' => $roommates
    ]);
}
    public function claimItem()
    {
        return view('students.claimItem');
    }


public function assignDorm($id)
{
    // Retrieve the student information using the $studentId
    $student = Student::findOrFail($d);
dd('ddhfgd');
    // Implement the logic to allocate a new dorm for the student
    // ...

    // Redirect to the appropriate view or perform any other necessary actions
    return redirect()->route('showStudentsList', ['student_id' => $id]);
}
    /**
     * Store a newly created resource in storage.
     */
 
   

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
