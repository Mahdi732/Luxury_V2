<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facebook Clone Design</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Syncopate:wght@400;700&family=Commissioner:wght@200;300;400;500&display=swap');
        
        body {
            font-family: 'Commissioner', sans-serif;
        }
        
        .syncopate {
            font-family: 'Syncopate', sans-serif;
        }
    </style>
</head>
<body class="bg-[#18191A]">
    <!-- Navbar -->

     <nav class=" w-full z-50 bg-zinc-950/90 backdrop-blur-lg">
        <div class="max-w-screen-2xl mx-auto px-8">
            <div class="flex justify-between items-center h-28">
                <a href="../index.php" class="text-xl text-white syncopate">Luxury</a>
                <div class="hidden lg:flex items-center gap-16">
                    <a href="menu.php" class="text-sm text-white hover:text-zinc-300">FLEET</a>
                    <a href="#experience" class="text-sm text-white hover:text-zinc-300">EXPERIENCE</a>
                    <a href="#contact" class="text-sm text-white hover:text-zinc-300">CONTACT</a>
                    <?php
                        if (isset($_SESSION["admin"]) && $_SESSION["admin"] === true) {
                            echo '<div class="flex items-center gap-6">
                            <div class="relative group">
                                    <a href="clientdashboard.php" class="flex items-center gap-2 hover:text-zinc-300 transition-all">
                                        <img src="https://cdn.pixabay.com/photo/2017/06/13/12/53/profile-2398782_1280.png" alt="Profile" class="w-10 h-10 rounded-full ">
                                    </a>
                                    <div class="absolute right-0 w-48 py-2 mt-2 bg-zinc-900 rounded-lg shadow-xl opacity-0 group-hover:opacity-100 transition-all">
                                        <a href="clientdashboard.php" class="block px-4 py-2 text-sm hover:bg-zinc-800">Profile Settings</a>
                                        <a href="clientdashboard.php" class="block px-4 py-2 text-sm hover:bg-zinc-800">Dashboard</a>
                                        <hr class="my-2 border-zinc-700">
                                        <form method="POST" action="classes/user.php">
                                        <button type="submit" name="log_out" class="block px-4 w-full text-start py-2 text-sm text-red-400 hover:bg-zinc-800">Logout</button>
                                        </form>
                                    </div>
                                </div>
                            </div>';
                        }elseif (isset($_SESSION["admin"]) && $_SESSION["admin"] === false){
                            echo '<div class="flex items-center gap-6">
                            <div class="relative group">
                                    <a href="admindashboard.php" class="flex items-center gap-2 hover:text-zinc-300 transition-all">
                                        <img src="https://cdn.pixabay.com/photo/2017/06/13/12/53/profile-2398782_1280.png" alt="Profile" class="w-10 h-10 rounded-full ">
                                    </a>
                                    <div class="absolute right-0 w-48 py-2 mt-2 bg-zinc-900 rounded-lg shadow-xl opacity-0 group-hover:opacity-100 transition-all">
                                        <a href="admindashboard.php" class="block px-4 py-2 text-sm hover:bg-zinc-800">Profile Settings</a>
                                        <a href="admindashboard.php" class="block px-4 py-2 text-sm hover:bg-zinc-800">Dashboard</a>
                                        <hr class="my-2 border-zinc-700">
                                        <form method="POST" action="classes/user.php">
                                        <button type="submit" name="log_out" class="block px-4 w-full text-start py-2 text-sm text-red-400 hover:bg-zinc-800">Logout</button>
                                        </form>
                                    </div>
                                </div>
                            </div>';
                        }else {
                            echo '<button class="px-8 py-4 bg-white text-black text-sm hover:bg-zinc-100">
                                <a href="login.php">Logni NOW</a>
                              </button>';
                        }
                    
                    ?>
                    
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="pt-16 bg-[#18191A]">
        <div class="max-w-screen-2xl mx-auto grid grid-cols-12 gap-4 px-4">
            <!-- Left Sidebar -->
            <div class="col-span-3  w-[320px] pt-4 overflow-y-auto h-screen">
                <div class="space-y-1">
                    <a href="#" class="flex items-center space-x-3 p-2 hover:bg-[#3A3B3C] rounded-lg">
                        <img src="/api/placeholder/36/36" alt="Profile" class="w-9 h-9 rounded-full">
                        <span class="text-gray-200">John Doe</span>
                    </a>
                    <a href="#" class="flex items-center space-x-3 p-2 hover:bg-[#3A3B3C] rounded-lg">
                        <i class="fas fa-user-friends text-red-800 text-xl w-9 h-9 flex items-center justify-center"></i>
                        <span class="text-gray-200">My Post</span>
                    </a>
                </div>
            </div>

            <!-- Main Feed -->
            <div class="col-span-6 col-start-4 px-4">
                <!-- Stories -->
                <div class="flex space-x-2 py-4 overflow-x-auto">
                    <div class="flex-shrink-0 relative w-28 h-48 rounded-xl overflow-hidden cursor-pointer">
                        <img src="/api/placeholder/112/192" alt="Story" class="w-full h-full object-cover">
                        <div class="absolute bottom-0 w-full p-2 bg-gradient-to-t from-black">
                            <p class="text-white text-xs">Create Story</p>
                        </div>
                    </div>
                    <div class="flex-shrink-0 relative w-28 h-48 rounded-xl overflow-hidden cursor-pointer">
                        <img src="/api/placeholder/112/192" alt="Story" class="w-full h-full object-cover">
                        <div class="absolute bottom-0 w-full p-2 bg-gradient-to-t from-black">
                            <p class="text-white text-xs">Jane Smith</p>
                        </div>
                    </div>
                    <div class="flex-shrink-0 relative w-28 h-48 rounded-xl overflow-hidden cursor-pointer">
                        <img src="/api/placeholder/112/192" alt="Story" class="w-full h-full object-cover">
                        <div class="absolute bottom-0 w-full p-2 bg-gradient-to-t from-black">
                            <p class="text-white text-xs">Mike Johnson</p>
                        </div>
                    </div>
                </div>

                <!-- Create Post -->
                <div class="bg-[#242526] rounded-lg shadow mb-4">
                    <div class="p-4">
                        <div class="flex items-center space-x-2">
                            <img src="/api/placeholder/40/40" alt="Profile" class="w-10 h-10 rounded-full">
                            <input type="text" placeholder="Find The Post That You Want " class="bg-[#3A3B3C] rounded-full py-2 px-4 text-gray-200 placeholder-gray-400 w-full">
                        </div>
                        <div class="border-t border-[#3A3B3C] mt-4 pt-4">
                            <div class="flex justify-between">
                                <button class="buttonAfficheForm flex items-center space-x-2 hover:bg-[#3A3B3C] px-6 py-2 rounded-lg">
                                    <i class="fas fa-video text-red-500"></i>
                                    <span class="text-gray-300">video</span>
                                </button>
                                <button class="buttonAfficheForm flex items-center space-x-2 hover:bg-[#3A3B3C] px-6 py-2 rounded-lg">
                                    <i class="fas fa-images text-green-500"></i>
                                    <span class="text-gray-300">Photo</span>
                                </button>
                                <button class="buttonAfficheForm flex items-center space-x-2 hover:bg-[#3A3B3C] px-6 py-2 rounded-lg">
                                    <i class="fas fa-smile text-yellow-500"></i>
                                    <span class="text-gray-300">Feeling/activity</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Posts -->
                <div class="space-y-4">
                    <!-- Post 1 -->
                    <div class="bg-[#242526] rounded-lg shadow">
                        <div class="p-4">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-2">
                                    <img src="/api/placeholder/40/40" alt="Profile" class="w-10 h-10 rounded-full">
                                    <div>
                                        <p class="text-gray-200 font-semibold">Jane Smith</p>
                                        <p class="text-gray-400 text-sm">2 hours ago</p>
                                    </div>
                                </div>
                                <button class="text-gray-400 hover:bg-[#3A3B3C] p-2 rounded-full">
                                    <i class="fas fa-ellipsis-h"></i>
                                </button>
                            </div>
                            <p class="text-gray-200 mt-4">Just had an amazing day at the beach! 🌊</p>
                            <img src="/api/placeholder/600/400" alt="Post" class="w-full h-[400px] object-cover rounded-lg mt-4">
                            
                            <!-- Reactions -->
                            <div class="flex items-center justify-between mt-4 px-2">
                                <div class="flex items-center space-x-1">
                                    <span class="text-red-800 bg-red-800 rounded-full p-1"><i class="fas fa-thumbs-up text-xs text-white"></i></span>
                                    <span class="text-gray-400 text-sm">1.2K</span>
                                </div>
                                <div class="flex space-x-2 text-sm text-gray-400">
                                    <span>234 comments</span>
                                    <span>56 shares</span>
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="border-t border-[#3A3B3C] mt-4 pt-1">
                                <div class="flex justify-between py-1">
                                    <button class="flex items-center justify-center space-x-2 hover:bg-[#3A3B3C] px-6 py-2 rounded-lg flex-1">
                                        <i class="far fa-thumbs-up text-gray-400"></i>
                                        <span class="text-gray-400">Like</span>
                                    </button>
                                    <button class="flex items-center justify-center space-x-2 hover:bg-[#3A3B3C] px-6 py-2 rounded-lg flex-1">
                                        <i class="far fa-comment text-gray-400"></i>
                                        <span class="text-gray-400">Comment</span>
                                    </button>
                                    <button class="flex items-center justify-center space-x-2 hover:bg-[#3A3B3C] px-6 py-2 rounded-lg flex-1">
                                        <i class="fas fa-share text-gray-400"></i>
                                        <span class="text-gray-400">Share</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Sidebar -->
            <div class="col-span-3 right-4 w-[320px] pt-4">
                <div class="bg-[#242526] rounded-lg p-4">
                    <h3 class="text-gray-200 font-semibold mb-4">Sponsored</h3>
                    <div class="space-y-4">
                        <div class="flex items-center space-x-2">
                            <img src="/api/placeholder/100/100" alt="Ad" class="w-[100px] h-[100px] rounded-lg">
                            <div>
                                <p class="text-gray-200 text-sm">Amazing Product</p>
                                <p class="text-gray-400 text-xs">website.com</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-[#242526] rounded-lg p-4 mt-4">
                    <h3 class="text-gray-200 font-semibold mb-4">Contacts</h3>
                    <div class="space-y-2">
                        <div class="flex items-center space-x-2 hover:bg-[#3A3B3C] p-2 rounded-lg cursor-pointer">
                            <div class="relative">
                                <img src="/api/placeholder/32/32" alt="Friend" class="w-8 h-8 rounded-full">
                                <div class="absolute bottom-0 right-0 w-3 h-3 bg-green-500 rounded-full border-2 border-[#242526]"></div>
                            </div>
                            <span class="text-gray-200">Sarah Connor</span>
                        </div>
                        <div class="flex items-center space-x-2 hover:bg-[#3A3B3C] p-2 rounded-lg cursor-pointer">
                            <div class="relative">
                                <img src="/api/placeholder/32/32" alt="Friend" class="w-8 h-8 rounded-full">
                                <div class="absolute bottom-0 right-0 w-3 h-3 bg-green-500 rounded-full border-2 border-[#242526]"></div>
                            </div>
                            <span class="text-gray-200">John Connor</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="formAddPost" class="h-full fixed inset-0 bg-black bg-opacity-80 hidden flex items-center justify-center p-4">
        <div class="bg-white rounded-lg shadow-lg w-full max-w-lg">
            <div class="p-4 border-b">
                <h2 class="text-xl font-bold text-center">Create Post</h2>
            </div>
            <form class="p-4">
                <div class="flex items-center space-x-3 mb-4">
                    <input type="text" placeholder="title" class="border p-2 rounded-lg flex-1">
                </div>
                <div class="flex items-center space-x-3 mb-4">
                    <input type="text" placeholder="Tags" class="border p-2 rounded-lg flex-1">
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
                <div class="mb-4">
                    <select class="w-full p-2 border rounded-lg">
                        <option value="public">🌎 Public</option>
                        <option value="friends">👥 Friends</option>
                        <option value="private">🔒 Only me</option>
                    </select>
                </div>
                <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                    Post
                </button>
            </form>
            <button id="close" type="" class="w-full bg-gray-200 text-white py-2 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                    close
                </button>
        </div>
    </div>
</body>
<script>
    let form = document.getElementById("formAddPost");
    let affiche = document.querySelectorAll(".buttonAfficheForm");
    let close = document.getElementById("close");
    affiche.forEach(e => {
    e.addEventListener('click', _ => {
        form.classList.remove('hidden');
    })    
    });
    close.addEventListener('click', _ => {
        form.classList.add("hidden");
    });
</script>
</html>
