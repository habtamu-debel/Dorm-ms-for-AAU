<!-- editAnnouncement.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Edit Announcement</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f1f1f1;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        form {
            margin-top: 20px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        textarea {
            resize: vertical;
            height: 100px;
        }

        input[type="file"] {
            margin-top: 5px;
        }

        img {
            margin-top: 10px;
            display: block;
            max-width: 100%;
        }

        button[type="submit"] {
            margin-top: 10px;
            background-color: #4CAF50;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
    <div class="container">
        <h1>Edit Announcement</h1>

        <form action="{{ route('announcementPM.update', ['id' => $announcement->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div>
                <label for="title">Title:</label>
                <input type="text" name="title" id="title" value="{{ $announcement->title }}" required>
            </div>

            <div>
                <label for="content">Content:</label>
                <textarea name="content" id="content" rows="4" required>{{ $announcement->content }}</textarea>
            </div>

            <div>
                <label for="type">Type:</label>
                <input type="text" name="type" id="type" value="{{ $announcement->type }}" required>
            </div>

            <div>
                <label for="attachment">Attachment:</label>
                <input type="file" name="attachment" id="attachment">
            </div>

            <div>
                <img src="{{ asset('attachments/' . $announcement->attachment) }}" alt="Attachment" width="200" height="150">
            </div>

            <div>
                <button type="submit">Update</button>
            </div>
        </form>
    </div>
</body>
</html>