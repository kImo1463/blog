<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Post</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7fa;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .card {
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            width: 400px; /* Width of the form */
            margin: 20px;
            padding: 20px;
        }
        .card-header {
            background-color: #3e8e41;
            color: white;
            font-size: 24px;
            text-align: center;
            padding: 20px;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }
        .form-label {
            font-weight: bold;
            color: #555;
            margin-bottom: 8px;
            display: block;
        }
        .form-control {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
            margin-bottom: 20px;
            font-size: 16px;
        }
        .form-control:focus {
            border-color: #3e8e41;
            outline: none;
            box-shadow: 0 0 8px rgba(62, 142, 65, 0.2);
        }
        .btn-primary {
            background-color: #3e8e41;
            border: none;
            color: white;
            font-size: 16px;
            padding: 12px 20px;
            width: 100%;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .btn-primary:hover {
            background-color: #2c6c2f;
        }
        .container {
            display: flex;
            justify-content: flex-start; /* Align content to the left */
            align-items: flex-start;    /* Align content to the top */
            min-height: 100vh;
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                Create New Post
            </div>
            <form action="{{ route('posts.store') }}" method="POST">
                @csrf
                <div>
                    <label for="title" class="form-label">Title</label>
                    <input type="text" name="title" id="title" class="form-control" required>
                </div>
                <div>
                    <label for="content" class="form-label">Content</label>
                    <textarea name="content" id="content" class="form-control" required></textarea>
                </div>
                <button type="submit" class="btn-primary">Create</button>
            </form>
        </div>
    </div>
</body>
</html>
