<!DOCTYPE html>
<html>
<head>
    <title>Announcements</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f2f2f2;
        }

        .container {
            width: 80%;
            max-width: 600px;
            background-color: white;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-top:3000px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        .announcement {
            margin-bottom: 20px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .announcement-title {
            font-weight: bold;
            margin-bottom: 5px;
        }

        .announcement-content {
            margin-bottom: 5px;
        }

        .announcement-date {
            font-size: 0.8em;
            color: #888;
        }
        .announcement-actions {
        margin-top: 10px;
    }

    .announcement-actions a,
    .announcement-actions form {
        display: inline-block;
        margin-right: 10px;
    }

    .announcement-actions button {
        background-color: #4CAF50;
        color: white;
        padding: 8px 16px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 14px;
    }

    .announcement-actions button:hover {
        background-color: #45a049;
    }

    .announcement-actions form {
        display: inline-block;
    }

    .announcement-actions form button {
        background-color: #f44336;
    }

    .announcement-actions form button:hover {
        background-color: #d32f2f;
    }
    </style>
    <div class="container">
        <h1>Announcements</h1>

        @foreach ($announcements as $announcement)
            <div class="announcement" >
           
            
                <div class="announcement-title">Title:{{ $announcement->title }}</div>
                <div class="announcement-title">Content:{{ $announcement->content }}</div>
                <div class="announcement-title">Type:{{ $announcement->type }}</div>
                <img src="{{ asset('attachments/' . $announcement->attachment) }}" alt="Attachment" width="500" height="300">
                <div class="announcement-title">Posted At:{{ $announcement->created_at }}</div>
                
                <div class="announcement-actions">
                <a href="{{ route('registrarAnnouncement.edit', ['id' => $announcement->id]) }}">
                        <button>Edit</button>
                    </a>
                    <form action="{{ route('registrarAnnouncement.destroy', ['id' => $announcement->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="confirmDelete(event)">Delete</button>
                    </form>
                </div>
            </div>
            <br>

        @endforeach

    </div>

    <script>
        function confirmDelete(event) {
            event.preventDefault();
            if (confirm("Are you sure you want to delete this announcement?")) {
                event.target.closest("form").submit();
            }
        }
    </script>
</body>
</html>