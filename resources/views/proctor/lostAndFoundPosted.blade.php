@extends('proctor.responseRequest')

@section('content')

<!DOCTYPE html>
<html>
<head>
    <title>Lost and Found Posts</title>
    <style>
        /* General styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        /* Container styles */
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        /* Post styles */
        .post {
            background-color: #f5f5f5;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 20px;
            margin-bottom: 20px;
        }

        .post h2 {
            margin-top: 0;
        }

        .post p {
            margin: 5px 0;
        }

        .post hr {
            border: none;
            border-top: 1px solid #ddd;
            margin: 20px 0;
        }
    </style>
</head>
<body>
    <div class="container">
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
    </div>
    @endsection
</body>
</html>