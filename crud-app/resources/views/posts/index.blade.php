<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Posts</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9fafb; /* Lighter background */
            color: #555; /* Lighter text color */
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #ffffff; /* Light background */
            color: #333; /* Dark text color for contrast */
            padding: 20px;
            text-align: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Subtle shadow */
        }
        h1 {
            margin: 0;
        }
        a {
            color: #3e8e41; /* Soft green */
            text-decoration: none;
            font-weight: bold;
        }
        a:hover {
            text-decoration: underline;
        }
        .container {
            padding: 20px;
        }
        .create-post {
            display: inline-block;
            background-color: #f0f9f4; /* Light green background */
            color: #333; /* Dark text for visibility */
            padding: 10px 20px;
            margin-bottom: 20px;
            border-radius: 5px;
            text-align: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05); /* Light shadow */
        }
        .create-post:hover {
            background-color: #e3f2e1; /* Even lighter green */
        }
        ul {
            list-style: none;
            padding: 0;
        }
        li {
            background-color: white; /* Clean white background */
            margin: 10px 0;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Subtle shadow */
        }
        .post-actions {
            margin-top: 10px;
        }
        .post-actions a,
        .post-actions button {
            margin-right: 10px;
            padding: 8px 12px;
            background-color: #4caf50; /* Soft green for actions */
            color: white;
            text-decoration: none;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .post-actions a:hover,
        .post-actions button:hover {
            background-color: #45a049; /* Darker green on hover */
        }
        .alert-success {
            background-color: #d4edda;
            color: #155724;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #c3e6cb;
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <header>
        <h1>All Posts</h1>
    </header>

    <div class="container">
        <!-- Link to Dashboard -->
        <a href="{{ route('dashboard') }}" class="create-post">Go to Dashboard</a>

        <a href="{{ route('posts.create') }}" class="create-post">Create New Post</a>

        @if (session('success'))
            <div class="alert-success">
                <p>{{ session('success') }}</p>
            </div>
        @endif

        <ul>
            @foreach ($posts as $post)
                <li>
                    <strong>{{ $post->title }}</strong>
                    <p>{{ $post->content }}</p>
                    <div class="post-actions">
                        <a href="{{ route('posts.show', $post) }}">View</a>
                        <a href="{{ route('posts.edit', $post) }}">Edit</a>
                        <form action="{{ route('posts.destroy', $post) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</body>
</html>
