<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clearance Requests</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<style>
    /* Center the form content */
.container {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
  background-color: #f5f5f5;
}

.card {
  width: 100%;
  max-width: 600px;
  border-radius: 8px;
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
  overflow: hidden;
  width:600px;
}

.card-header {
  background-color: #4CAF50;
  color: #fff;
  padding: 1.5rem;
  font-size: 1.2rem;
  font-weight: bold;
}

.card-body {
  padding: 2rem;
  width:300px;
}

.form-control {
  border: 1px solid #ccc;
  border-radius: 4px;
  padding: 0.75rem 1rem;
  font-size: 1rem;
  transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}

.form-control:focus {
  border-color: #4CAF50;
  box-shadow: 0 0 0 0.2rem rgba(76, 175, 80, 0.25);
}

.btn-primary {
  background-color: #4CAF50;
  border-color: #4CAF50;
  color: #fff;
  padding: 0.75rem 1.5rem;
  font-size: 1rem;
  border-radius: 4px;
  transition: background-color 0.15s ease-in-out, border-color 0.15s ease-in-out;
}

.btn-primary:hover {
  background-color: #3e8e41;
  border-color: #3e8e41;
}
</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Student Registration</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('students.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="reason" class="col-md-4 col-form-label text-md-right">Reason</label>

                            <div class="col-md-6">
                                <textarea id="reason" class="form-control @error('reason') is-invalid @enderror" name="reason" rows="5" required autocomplete="reason" style="width: 300px;">{{ old('reason') }}</textarea>

                                @error('reason')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="attachment" class="col-md-4 col-form-label text-md-right">Attachment</label>

                            <div class="col-md-6">
                                <input id="attachment" type="file" class="form-control-file @error('attachment') is-invalid @enderror" name="attachment" required autocomplete="attachment">

                                @error('attachment')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>