<!DOCTYPE html>
<html>
<head>
  <title>Navigation Bar, Proctor Info, and Footer Example</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{ asset('css/studentHome.css') }}">
</head>

<body>
    <style>
        /* Styles for the container div */
        div {
          max-width: 800px;
          margin: 0 auto;
          padding: 20px;
        }

        /* Styles for the heading */
        h1, h2 {
          text-align: center;
          font-size: 24px;
          margin-bottom: 20px;
        }

        /* Styles for the form */
        form {
          display: flex;
          flex-direction: column;
        }

        label {
          font-weight: bold;
          margin-bottom: 10px;
        }

        input[type="text"],
        input[type="submit"],
        textarea {
          padding: 10px;
          margin-bottom: 15px;
          border: 1px solid #ccc;
        }

        input[type="submit"] {
          background-color: #4caf50;
          color: white;
          border: none;
          cursor: pointer;
        }

        input[type="submit"]:hover {
          background-color: #45a049;
        }

        /* Styles for the room details */
        .room-details {
          margin-top: 30px;
        }

        .room-details p {
          margin-bottom: 10px;
        }

        .room-resources {
          margin-top: 20px;
        }

        .room-resources label {
          display: block;
          margin-bottom: 5px;
        }
    </style>

<div>
    @isset($room)
    <div class="room-details">
        <h2>Room Resources</h2>
        <div class="room-resources">
            <table class="table">
                <thead>
                    <tr>
                        <th>Resource</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roomResources as $resource)
                    <tr>
                        <td>
                            @if ($resource->name == 'Locker')
                                Locker
                            @elseif ($resource->name == 'Table')
                                Table
                            @elseif ($resource->name == 'Chair')
                                Chair
                            @elseif ($resource->name == 'Light')
                                Light
                            @else
                                {{ $resource->name }}
                            @endif
                        </td>
                        <td>{{ $resource->status ? 'Available' : 'Damaged/Missing' }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <form action="{{ route('room.update', $room->roomNumber) }}" method="POST">
                @csrf
                <label for="damaged_property">Damaged/Missing Resources:</label>
                <textarea id="damaged_property" name="damaged_property" rows="3"></textarea>
                <input type="submit" value="Save">
            </form>
        </div>
    </div>
    @endisset
</div>
</body>
</html>