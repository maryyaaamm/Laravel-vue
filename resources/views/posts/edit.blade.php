<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Edit Post</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
    <div class="max-w-2xl mx-auto p-6 bg-gray-100 min-h-screen">
        <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">✏️ Edit Post</h2>

        <!-- Edit Form -->
        <form action="{{ route('posts.update', $post->id) }}" method="POST" class="bg-white shadow-md rounded-lg p-4 mb-6">
            @csrf
            @method('PUT')
            <input
                type="text"
                name="title"
                placeholder="Enter Title"
                class="w-full p-3 border rounded-lg mb-3 focus:ring-2 focus:ring-pink-400"
                value="{{ $post->title }}"
                required
            />
            <textarea
                name="content"
                placeholder="Write Content..."
                class="w-full p-3 border rounded-lg mb-3 focus:ring-2 focus:ring-pink-400"
                required
            >{{ $post->content }}</textarea>
            <button
                type="submit"
                class="w-full bg-pink-500 text-white font-bold py-2 rounded-lg hover:bg-pink-600 transition"
            >
                💾 Update Post
            </button>
        </form>
    </div>
</body>
</html>