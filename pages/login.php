<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Social Media Post Creator</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.js"></script>
</head>
<body class="bg-gray-100">
    <!-- Navigation Bar -->
    <nav class="bg-white shadow-md">
        <div class="max-w-6xl mx-auto px-4">
            <div class="flex justify-between items-center h-16">
                <div class="text-2xl font-bold text-blue-600">SocialApp</div>
                <div class="flex items-center space-x-4">
                    <img src="/api/placeholder/40/40" alt="Profile" class="w-10 h-10 rounded-full">
                    <span class="font-medium">John Doe</span>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="max-w-2xl mx-auto mt-8 px-4">
        <!-- Post Creation Card -->
        <div class="bg-white rounded-lg shadow-md p-4">
            <div class="flex space-x-4">
                <img src="/api/placeholder/40/40" alt="Profile" class="w-12 h-12 rounded-full">
                <div class="flex-1">
                    <textarea 
                        class="w-full h-32 p-3 border border-gray-300 rounded-lg resize-none focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        placeholder="What's on your mind?"></textarea>
                    
                    <!-- Post Actions -->
                    <div class="mt-4 flex items-center justify-between border-t border-b border-gray-200 py-3">
                        <div class="flex space-x-6">
                            <button class="flex items-center space-x-2 text-gray-600 hover:text-gray-800">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                <span>Photo/Video</span>
                            </button>
                            <button class="flex items-center space-x-2 text-gray-600 hover:text-gray-800">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span>Feeling/Activity</span>
                            </button>
                        </div>
                    </div>
                    
                    <!-- Post Button -->
                    <div class="mt-4">
                        <button class="w-full bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                            Post
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Example Previous Post -->
        <div class="bg-white rounded-lg shadow-md p-4 mt-6">
            <div class="flex items-center space-x-3">
                <img src="/api/placeholder/40/40" alt="Profile" class="w-10 h-10 rounded-full">
                <div>
                    <div class="font-medium">John Doe</div>
                    <div class="text-gray-500 text-sm">2 hours ago</div>
                </div>
            </div>
            <p class="mt-4">This is an example post! How is everyone doing today? 😊</p>
            <div class="mt-4 flex items-center space-x-4 text-gray-600">
                <button class="flex items-center space-x-2 hover:text-blue-600">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5" />
                    </svg>
                    <span>Like</span>
                </button>
                <button class="flex items-center space-x-2 hover:text-blue-600">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                    </svg>
                    <span>Comment</span>
                </button>
                <button class="flex items-center space-x-2 hover:text-blue-600">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z" />
                    </svg>
                    <span>Share</span>
                </button>
            </div>
        </div>
    </main>
</body>
</html>