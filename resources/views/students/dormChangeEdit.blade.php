@extends('students.manageRequest')

@section('content')

<!DOCTYPE html>
<html>
<head>
    <title>Room Maintenance Form</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
</head>
<body>
    <style>
        body {
  display: flex;
  flex-direction: column;
  align-items: center;
  height: 100vh;
  margin: 0;
  background-color: #f2f2f2;
}

.extended-page {
  flex-grow: 1;
  width: 100%;
}

form {
  background-color: white;
  padding: 40px;
  border-radius: 8px;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
  max-width: 600px;
  width: 100%;
  margin-top: 40px;
}

.form-group {
  margin-bottom: 20px;
}

label {
  display: block;
  font-weight: bold;
  margin-bottom: 5px;
}

input[type="text"],
input[type="number"],
input[type="date"],
select,
textarea {
  width: 100%;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 4px;
  font-size: 16px;
}

textarea {
  resize: vertical;
}

button[type="submit"] {
  background-color: #4CAF50;
  color: white;
  padding: 10px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  font-size: 16px;
}

button[type="submit"]:hover {
  background-color: #45a049;
}
        </style>

    <h1>Edit Dorm Change Request</h1>

    <form action="{{ route('dorm-changes.update', $dormChange->id) }}" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="student_name">Student Name:</label>
            <input type="text" id="student_name" name="student_name" value="{{$dormChange->student_name }}">
        </div>

        <div class="form-group">
            <label for="current_dorm_duration">Minimum Stay Duration in Current Dorm:</label>
            <input type="number" id="current_dorm_duration" name="current_dorm_duration" value="{{ $dormChange->current_dorm_duration }}">
        </div>

        <div class="form-group">
            <label for="reason">Reason for Dorm Change:</label>
            <select id="reason" name="reason">
                <option value="">Select a reason</option>
                <option value="medical_issues" {{$dormChange->reason == 'medical_issues' ? 'selected' : '' }}>Medical Issues</option>
                <option value="twins" {{ $dormChange->reason == 'twins' ? 'selected' : '' }}>Twins</option>
                <option value="disability" {{$dormChange->reason == 'disability' ? 'selected' : '' }}>Disability</option>
                <option value="argument" {{ $dormChange->reason == 'argument' ? 'selected' : '' }}>Argument</option>
                <option value="safety_issue" {{ $dormChange->reason == 'safety_issue' ? 'selected' : '' }}>Safety Issue</option>
            </select>
        </div>

        <div class="form-group">
            <label for="description">Description:</label>
            <textarea id="description" name="description" rows="4">{{ $dormChange->description }}</textarea>
        </div>

        <div class="form-group">
            <label for="room_number_features">Room Type and Features:</label>
            <textarea id="room_number_features" name="room_number_features" rows="4">{{ $dormChange->room_number_features }}</textarea>
        </div>

        <div class="form-group">
            <label for="special_needs">Consideration of Special Needs:</label>
            <textarea id="special_needs" name="special_needs" rows="4">{{ $dormChange->special_needs }}</textarea>
        </div>

        <div class="form-group">
            <label for="supporting_file">Supporting File:</label>
            <input type="file" id="supporting_file" name="supporting_file">
        </div>

        <div class="form-group">
            <label for="date_of_submission">Date of Submission:</label>
            <input type="date" id="date_of_submission" name="date_of_submission" value="{{ $dormChange->date_of_submission }}">
        </div>

        <div class="form-group">
            <label for="contact_details">Contact:</label>
            <input type="text" id="contact_details" name="contact_details" value="{{ $dormChange->contact_details }}">
        </div>

        <button type="submit">Update</button>
    </form>
@endsection

</body>
</html>