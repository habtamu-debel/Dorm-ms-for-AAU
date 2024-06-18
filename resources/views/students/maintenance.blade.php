<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clearance Requests</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container my-5">
        <h1 class="mb-4">Clearance Requests</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Student Name</th>
                    <th>Department</th>
                    <th>Reason</th>
                    <th>Supporting Documents</th>
                    <th>Contact Details</th>
                    <th>Maintenance Request</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clearances as $clearance)
                    <tr>
                        <td>{{ $clearance->student_name }}</td>
                        <td>{{ $clearance->department }}</td>
                        <td>{{ $clearance->reason }}</td>
                        <td>
                            @if ($clearance->supporting_documents)
                                <a href="{{ route('clearances.download', $clearance->id) }}" target="_blank">View Documents</a>
                            @else
                                -
                            @endif
                        </td>
                        <td>{{ $clearance->contact_details }}</td>
                        <td>
                            @if ($clearance->maintenance_request)
                                <a href="{{ route('maintenance.show', $clearance->maintenance_request->id) }}">View Request</a>
                            @else
                                -
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('clearances.edit', $clearance->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <h2 class="mt-5">Maintenance Request</h2>
        <form action="{{ route('maintenance.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="requester_name">Requester Name</label>
                <input type="text" class="form-control" id="requester_name" name="requester_name" required>
            </div>
            <div class="form-group">
                <label for="department">Department</label>
                <input type="text" class="form-control" id="department" name="department" required>
            </div>
            <div class="form-group">
                <label for="issue_description">Issue Description</label>
                <textarea class="form-control" id="issue_description" name="issue_description" rows="3" required></textarea>
            </div>
            <div class="form-group">
                <label for="supporting_documents">Supporting Documents</label>
                <input type="file" class="form-control-file" id="supporting_documents" name="supporting_documents">
            </div>
            <div class="form-group">
                <label for="contact_details">Contact Details</label>
                <input type="text" class="form-control" id="contact_details" name="contact_details" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit Request</button>
        </form>
    </div>
</body>
</html>