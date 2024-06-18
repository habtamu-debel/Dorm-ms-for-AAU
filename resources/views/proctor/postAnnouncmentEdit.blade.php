<!DOCTYPE html>
<html>
<head>
    <title>Edit Announcement</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            width: 600px;
            max-width: 100%;
            background-color: #fff;
            padding: 20px;
            border-radius: 4px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        h1 {
            margin-bottom: 20px;
            text-align: center;
        }

        form {
            margin-top: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button[type="submit"] {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit Announcement</h1>

        <form action="{{ route('announcement.update', ['id' => $announcement->id]) }}" method="POST">
            @csrf
            @method('PUT')

            <div>
                <label for="title">Title:</label>
                <input type="text" name="title" value="{{ $announcement->title }}" required>
            </div>

            <div>
                <label for="content">Content:</label>
                <textarea name="content" required>{{ $announcement->content }}</textarea>
            </div>

            <div>
                <label for="type">For:</label>
                <input type="text" name="type" value="{{ $announcement->type }}" required>
            </div>

            <!-- <div>
                <label for="type">Attachment:</label>
                <input type="file" name="attachment" value="{{ $announcement->attachment }}" required>
            </div> -->


            <!-- Add other fields as needed -->

            <button type="submit">Update</button>
        </form>
    </div>
</body>
</html>