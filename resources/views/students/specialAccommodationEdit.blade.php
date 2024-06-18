@extends('students.manageRequest')

@section('content')

<!DOCTYPE html>
<html>
<head>
  <title>Navigation Bar</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/css/bootstrap.min.css">
 
  
</head>

<body>
<style>
    </style>

<div class="container">
    <h1>Edit Accommodation Request</h1>

    <form action="{{ route('accommodation.update', $accommodation->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="reason">Reason</label>
            <input type="text" class="form-control" id="reason" name="reason" value="{{ $accommodation->reason }}" required>
        </div>

        <div class="form-group">
            <label for="medical_documentation">Medical Documentation</label>
            <input type="file" class="form-control-file" id="medical_documentation" name="medical_documentation">
            @if ($accommodation->medical_documentation)
                <p>Current document: <a href="{{ asset('storage/' . $accommodation->medical_documentation) }}">View</a></p>
            @endif
        </div>

        <div class="form-group">
            <label for="preferred_accommodation">Preferred Accommodation</label>
            <input type="text" class="form-control" id="preferred_accommodation" name="preferred_accommodation" value="{{ $accommodation->preferred_accommodation }}" required>
        </div>

        <div class="form-group">
            <label for="supporting_information">Supporting Information</label>
            <textarea class="form-control" id="supporting_information" name="supporting_information" rows="3" required>{{ $accommodation->supporting_information }}</textarea>
        </div>

        <div class="form-group">
            <label for="contact_details">Contact Details</label>
            <input type="text" class="form-control" id="contact_details" name="contact_details" value="{{ $accommodation->contact_details }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection

</body>
</html>