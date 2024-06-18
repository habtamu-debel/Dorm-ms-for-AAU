<!DOCTYPE html>
<html>
<head>
    <title>Edit Clearance Request</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <style>
        body {
            background-color: #f2f2f2;
            font-family: 'Roboto', sans-serif;
        }

        .container {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }

        h1 {
            text-align: center;
            color: #007bff;
            margin-bottom: 30px;
        }

        .form-group label {
            font-weight: bold;
        }

        .form-control {
            border-radius: 5px;
            border: 1px solid #ccc;
            padding: 10px;
            font-size: 16px;
        }

        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(76, 175, 80, 0.5);
        }

        .btn-primary {
            background-color: #4CAF50;
            border-color: #4CAF50;
            font-size: 16px;
            padding: 10px 20px;
            border-radius: 5px;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #3e8e41;
            border-color: #3e8e41;
        }

        .is-invalid {
            border-color: #dc3545;
            box-shadow: 0 0 5px rgba(220, 53, 69, 0.5);
        }
    </style>
</head>
<body>
    <div class="container my-5">
        <h1>Edit Clearance Request</h1>

        <form action="{{ route('clearances.update', $clearance->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="student_id">Student ID</label>
                <input type="text" class="form-control @error('student_id') is-invalid @enderror" id="student_id" name="student_id" value="{{ old('student_id', $clearance->student_id) }}">
                @error('student_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="student_name">Student Name</label>
                <input type="text" class="form-control @error('student_name') is-invalid @enderror" id="student_name" name="student_name" value="{{ old('student_name', $clearance->student_name) }}">
                @error('student_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="department">Department</label>
                <input type="text" class="form-control @error('department') is-invalid @enderror" id="department" name="department" value="{{ old('department', $clearance->department) }}">
                @error('department')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="reason">Reason</label>
                <input type="text" class="form-control @error('reason') is-invalid @enderror" id="reason" name="reason" value="{{ old('reason', $clearance->reason) }}">
                @error('reason')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="supporting_documents">Supporting Documents</label>
                <input type="file" class="form-control-file @error('supporting_documents') is-invalid @enderror" id="supporting_documents" name="supporting_documents">
                @error('supporting_documents')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="contact_details">Contact Details</label>
                <input type="text" class="form-control @error('contact_details') is-invalid @enderror" id="contact_details" name="contact_details" value="{{ old('contact_details', $clearance->contact_details) }}">
                @error('contact_details')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Update Clearance</button>
        </form>
    </div>
</body>
</html>