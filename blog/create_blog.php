<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Post</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify"></script>
    <script src="https://unpkg.com/htmx.org@2.0.4"></script>
    <style>
</style>
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex items-center justify-center p-4">
        <div class="bg-white rounded-lg shadow-lg w-full max-w-lg">
            <!-- Header -->
            <div class="p-4 border-b">
                <h2 class="text-xl font-bold text-center">Create Post</h2>
            </div>

            <form class="p-4" action="../classes/tags.php" method="POST">
            <div class="flex flex-col space-y-2 mb-4">
                <input 
                    type="search" 
                    placeholder="Your name" 
                    name="nameTags" 
                    class="border border-gray-300 p-3 rounded-lg w-full focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

                <div class="flex items-center space-x-3 mb-4">
                <input type="text" name="addTags" id="addTags" placeholder="Search and add tags" class="border p-2 rounded-lg flex-1" >
                <div class="flex flex-col space-y-2">
                <input 
                    type="search" 
                    placeholder="Your name" 
                    name="nameTags" 
                    class="border border-gray-300 p-3 rounded-lg w-full focus:outline-none focus:ring-2 focus:ring-blue-500"
                    hx-post="../classes/tags.php" 
                    hx-trigger="keyup changed" 
                    hx-swap="innerHTML" 
                    hx-target="#searchResults">
                <div id="searchResults" class="rounded-lg border border-gray-200 shadow-lg bg-white max-h-60 overflow-y-auto p-2">
                </div>
            </div>
                </div>
                <textarea 
                    class="w-full h-40 p-4 border rounded-lg resize-none mb-4 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="What's on your mind?"></textarea>

                <div class="border rounded-lg p-4 mb-4">
                    <h3 class="font-semibold mb-3">Add to your post</h3>
                    <div class="flex space-x-4">
                        <button type="button" class="flex items-center space-x-2 text-green-600 hover:bg-green-50 p-2 rounded-lg">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            <span>Photo</span>
                        </button>
                        <button type="button" class="flex items-center space-x-2 text-purple-600 hover:bg-purple-50 p-2 rounded-lg">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                            </svg>
                            <span>Video</span>
                        </button>
                        <button type="button" class="flex items-center space-x-2 text-yellow-600 hover:bg-yellow-50 p-2 rounded-lg">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span>Feeling</span>
                        </button>
                    </div>
                </div>

                <!-- Privacy Setting -->
                <div class="mb-4">
                    <select class="w-full p-2 border rounded-lg">
                        <option value="public">🌎 Public</option>
                    </select>
                </div>

                <!-- Post Button -->
                <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                    Post
                </button>
            </form>
        </div>
    </div>
</body>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        let input = document.getElementById('addTags');
        window.tagify = new Tagify(input); 
        document.addEventListener('click', function (event) {
            if (event.target.closest('.tag')) {
                let value = event.target.closest('.tag').value;
                if (value) {
                    window.tagify.addTags(value);
                }
            }
        });
    });
</script>
</html>