<!DOCTYPE html>
<html>
<head>
    <title>View Dorm</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/viewDorm.css') }}">
</head>

<style>
    body {
  background-color: #f5f5f5;
}

body {
  background-color: #f5f5f5;
}

.container {
  max-width: 800px;
}

.card {
  background-color: #fff;
  border: none;
  box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
  transition: all 0.3s ease-in-out;
}

.card:hover {
  box-shadow: 0 1rem 3rem rgba(0, 0, 0, 0.175);
  transform: translateY(-5px);
}

.card-header {
  background-color: #007bff;
  color: #fff;
  font-weight: bold;
  border-bottom: none;
}

.card-title {
  font-size: 2rem;
  font-weight: bold;
}

.card-subtitle {
  font-size: 1.5rem;
  font-weight: bold;
}

.table {
  background-color: #fff;
  box-shadow: 0 0.25rem 0.75rem rgba(0, 0, 0, 0.05);
}

.table thead th {
  border-top: none;
  border-bottom: 1px solid #dee2e6;
  font-weight: bold;
}

.table tbody tr:hover {
  background-color: #f5f5f5;
}

.card {
  background-color: #fff;
  border: none;
  box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
  transition: all 0.3s ease-in-out;
}

.card:hover {
  box-shadow: 0 1rem 3rem rgba(0, 0, 0, 0.175);
  transform: translateY(-5px);
}

.card-header {
  background-color: #007bff;
  color: #fff;
  font-weight: bold;
  border-bottom: none;
}

.card-title {
  font-size: 2rem;
  font-weight: bold;
}

.card-subtitle {
  font-size: 1.5rem;
  font-weight: bold;
}

.table {
  background-color: #fff;
  box-shadow: 0 0.25rem 0.75rem rgba(0, 0, 0, 0.05);
}

.table thead th {
  border-top: none;
  border-bottom: 1px solid #dee2e6;
  font-weight: bold;
}

.table tbody tr:hover {
  background-color: #f5f5f5;
}
    </style>
<body>
    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="card shadow-lg p-5 rounded">
            <div class="card-header">
                <h1 class="card-title text-center">Your Dorm</h1>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-sm-4 font-weight-bold">Block:</div>
                    <div class="col-sm-8">{{ $block }}</div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-4 font-weight-bold">Floor:</div>
                    <div class="col-sm-8">{{ $floor }}</div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-4 font-weight-bold">Room:</div>
                    <div class="col-sm-8">{{ $room }}</div>
                </div>
                <h2 class="card-subtitle mb-3 text-center">Your Roommates</h2>
                @if($roommates->count() > 0)
                    <table class="table table-striped shadow-sm">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Year</th>
                                <th>Department</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roommates as $roommate)
                                <tr>
                                    <td>{{ $roommate->firstname }} {{ $roommate->lastname }}</td>
                                    <td>{{ $roommate->year }}</td>
                                    <td>{{ $roommate->department }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p class="text-center">No roommates found.</p>
                @endif

                <p>show the resources and enter anything that damaged</p>

                <a href="{{ route('dormCheckIn') }}" class="btnPrimary">Dorm Check In</a>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            function showRoommateModal(name, email) {
                $('#roommate-name').text(name);
                $('#roommate-email').text(email);
                $('#roommateModal').modal('show');
            }
        </script>
    @endpush
</body>
</html>