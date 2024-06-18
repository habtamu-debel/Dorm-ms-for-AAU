<!-- resources/views/proctor-requests/edit.blade.php -->

<!DOCTYPE html>
<html>
<head>
  <title>Navigation Bar, Proctor Info, and Footer Example</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="{{ asset('css/proctorHome.css') }}">
</head>
<body>
    <h1>Edit Proctor Request</h1>

    <form action="{{ route('proctor-requests.update', $proctorRequest->requestId) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div>
            <label for="requestId">Request ID:</label>
            <input type="text" name="requestId" id="requestId" value="{{ $proctorRequest->requestId }}" required>
        </div>

        <div>
            <label for="category">Category:</label>
            <input type="text" name="category" id="category" value="{{ $proctorRequest->category }}" required>      
        </div>

        <div>
            <label for="occurrence">Occurrence:</label>
            <input type="date" name="occurrence" id="occurrence" value="{{ $proctorRequest->occurrence }}" required>
        </div>

        <div>
            <label for="media">Media:</label>
            <input type="file" name="media" id="media" value="{{ $proctorRequest->media }}">
        </div>

        <div>
            <label for="impact">Impact:</label>
            <input type="text" name="impact" id="impact" value="{{ $proctorRequest->impact }}" required>
        </div>

        <div>
            <label for="urgency">Urgency:</label>
            <input type="text" name="urgency" id="urgency" value="{{ $proctorRequest->urgency }}" required>
        </div>

        <div>
            <label for="room">Room:</label>
            <input type="text" name="room" id="room" value="{{ $proctorRequest->room }}" required>
        </div>

        <div>
            <label for="description">Description:</label>
            <textarea name="description" id="description" required>{{ $proctorRequest->description }}</textarea>
        </div>

        <div>
            <label for="contact">Contact:</label>
            <input type="text" name="contact" id="contact" value="{{ $proctorRequest->contact }}" required>
        </div>

        <div>
            <button type="submit">Update</button>
        </div>
    </form>

</body>
</html>