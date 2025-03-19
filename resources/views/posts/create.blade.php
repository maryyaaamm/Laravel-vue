<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Post</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex justify-center items-center h-screen">

    <div class="bg-white p-6 rounded-lg shadow-lg w-1/3">
        <h2 class="text-2xl font-bold text-center mb-4">Create a New Post</h2>

        <form action="{{ url('/post') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 font-bold">Title</label>
                <input type="text" name="title" class="w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-bold">Content</label>
                <textarea name="content" class="w-full p-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500" required></textarea>
            </div>

            <div class="text-center">
                <button type="submit" class="bg-pink-500 text-white px-4 py-2 rounded-lg hover:bg-pink-600 transition">Create Post</button>
            </div>
        </form>

        <div class="text-center mt-4">
            <a href="{{ url('/') }}" class="text-blue-500">Back to Posts</a>
        </div>
    </div>

</body>
</html>
