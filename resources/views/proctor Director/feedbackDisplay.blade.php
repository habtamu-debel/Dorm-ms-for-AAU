<!-- resources/views/feedback/show.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Feedback Entries</title>
    <link rel="stylesheet" href="{{ asset('css/studentHome.css') }}">
</head>
<style>
    /* studentHome.css */

body {
  font-family: Arial, sans-serif;
  background-color: #f8f8f8;
}

.container {
  max-width: 800px;
  margin: 0 auto;
  padding: 20px;
  background-color: #fff;
  border-radius: 5px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

h2 {
  margin-top: 0;
  margin-bottom: 20px;
  font-weight: bold;
  color: #333;
  text-align: center;
}

.table {
  width: 100%;
  border-collapse: collapse;
  margin-bottom: 20px;
}

.table th,
.table td {
  padding: 10px;
  border: 1px solid #ccc;
}

.table th {
  background-color: #f0f0f0;
  font-weight: bold;
  text-align: left;
}

.table td {
  vertical-align: top;
}

.no-entries {
  text-align: center;
  margin-top: 20px;
  font-style: italic;
  color: #888;
}

/* Additional CSS for responsiveness on small screens */
@media (max-width: 480px) {
  .container {
    padding: 10px;
  }

  .table {
    font-size: 14px;
  }
}
    </style>
<body>
    <div class="container">
        <h2 class="text-center">Feedback Entries</h2>

        @if (count($feedbackEntries) > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th>Campus</th>
                        <th>Comment</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($feedbackEntries as $entry)
                        <tr>
                            <td>
                                @if ($entry->student_id == 0)
                                    Unknown
                                @else
                                    {{ $entry->student_id}}
                                @endif
                            </td>
                            <td>{{ $entry->comment}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>No feedback entries found.</p>
        @endif
    </div>
</body>
</html>