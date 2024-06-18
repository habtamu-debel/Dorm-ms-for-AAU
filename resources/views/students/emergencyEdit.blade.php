

@extends('students.manageRequest')
@section('content')
<!DOCTYPE html>
<html>
<head>
    <title>Room Maintenance Form</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <style>
        .container {
    margin-top: 50px;
}

.card {
    border-radius: 10px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
}

.card-header {
    background-color: #007bff;
    color: #fff;
    font-weight: bold;
}

.form-group {
    margin-bottom: 20px;
}

.form-control {
    border-radius: 5px;
    padding: 10px;
}

.btn-primary {
    background-color: #007bff;
    border-color: #007bff;
    border-radius: 5px;
    padding: 10px 20px;
}

.btn-primary:hover {
    background-color: #0056b3;
    border-color: #0056b3;
}
        </style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Submitted Request</div>

                <div class="card-body">
                    <form action="{{ route('emergencies.update', $emergency->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="student_name">Student Name</label>
                            <input type="text" class="form-control" id="student_name" name="student_name" value="{{ $emergency->student_name }}" required>
                        </div>

                        <div class="form-group">
                            <label for="request_type">Request Type</label>
                            <input type="text" class="form-control" id="request_type" name="request_type" value="{{ $emergency->request_type }}" required>
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3" required>{{ $emergency->description }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="contact_phone">Contact Phone</label>
                            <input type="text" class="form-control" id="contact_phone" name="contact_phone" value="{{ $emergency->contact_phone }}" required>
                        </div>

                        <div class="form-group">
                            <label for="urgency_level">Urgency Level</label>
                            <input type="text" class="form-control" id="urgency_level" name="urgency_level" value="{{ $emergency->urgency_level }}" required>
                        </div>

                        <div class="form-group">
                            <label for="supporting_media">Supporting Media</label>
                            <input type="file" class="form-control-file" id="supporting_media" name="supporting_media">
                        </div>

                        <div class="form-group">
                            <label for="location_of_emergency">Location of Emergency</label>
                            <select class="form-control" id="location_of_emergency" name="location_of_emergency" required>
                                <option value="building" {{ $emergency->location_of_emergency == 'building' ? 'selected' : '' }}>Building</option>
                                <option value="room" {{ $emergency->location_of_emergency == 'room' ? 'selected' : '' }}>Room</option>
                                <option value="other" {{ $emergency->location_of_emergency == 'other' ? 'selected' : '' }}>Other</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="building_name">Building Name</label>
                            <input type="text" class="form-control" id="building_name" name="building_name" value="{{ $emergency->building_name }}">
                        </div>

                        <div class="form-group">
                            <label for="room_number">Room Number</label>
                            <input type="text" class="form-control" id="room_number" name="room_number" value="{{ $emergency->room_number }}">
                        </div>

                        <div class="form-group">
                            <label for="other_location">Other Location</label>
                            <input type="text" class="form-control" id="other_location" name="other_location" value="{{ $emergency->other_location }}">
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

</body>
</html>