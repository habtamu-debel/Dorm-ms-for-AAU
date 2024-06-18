<!DOCTYPE html>
<html>
<head>
    <title>Lost and Found Post</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        h1 {
            font-size: 24px;
            margin-bottom: 20px;
            font-style: italic;
        }

        .post-content {
            margin-bottom: 20px;
        }

        .post-content strong {
            font-weight: bold;
        }

        .post-content p {
            margin-bottom: 10px;
        }

        .post-date {
            font-size: 12px;
            color: #888;
        }
    </style>
</head>
<body>
<h1>List of Lost and Found Posts</h1>

@if (isset($posts) && count($posts) > 0)
    @foreach ($posts as $post)
        <div class="post">
            <h2>{{ $post->item_name }}</h2>
            <p>Status: {{ $post->item_status }}</p>
            <p>Location: {{ $post->location_found }}</p>
            <p>Date Found: {{ $post->date_found }}</p>
            <p>Additional Details: {{ $post->additional_details }}</p>
           
            <hr>
        </div>
    @endforeach
@else
    <p>No posts available.</p>
@endif
</body>
</html>