<?php
require_once('../blogclasses/post.classes.php');
require_once('../blogclasses/search.php');
$affichePost = new Blog();
$result = $affichePost->affichePost();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facebook Clone Design</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/htmx.org@2.0.4"></script>
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
                    <a href="../pages/menu.php" class="text-sm text-white hover:text-zinc-300">FLEET</a>
                    <a href="#experience" class="text-sm text-white hover:text-zinc-300">EXPERIENCE</a>
                    <a href="#contact" class="text-sm text-white hover:text-zinc-300">CONTACT</a>
                    <?php
                        if (isset($_SESSION["admin"]) && $_SESSION["admin"] === true) {
                            echo '<div class="flex items-center gap-6">
                            <div class="relative group">
                                    <a href="../pages/clientdashboard.php" class="flex items-center gap-2 hover:text-zinc-300 transition-all">
                                        <img src="https://cdn.pixabay.com/photo/2017/06/13/12/53/profile-2398782_1280.png" alt="Profile" class="w-10 h-10 rounded-full ">
                                    </a>
                                    <div class="absolute right-0 w-48 py-2 mt-2 bg-zinc-900 rounded-lg shadow-xl opacity-0 group-hover:opacity-100 transition-all">
                                        <a href="../pages/clientdashboard.php" class="block px-4 py-2 text-sm hover:bg-zinc-800">Profile Settings</a>
                                        <a href="../pages/clientdashboard.php" class="block px-4 py-2 text-sm hover:bg-zinc-800">Dashboard</a>
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
                                    <a href="../pages/admindashboard.php" class="flex items-center gap-2 hover:text-zinc-300 transition-all">
                                        <img src="https://cdn.pixabay.com/photo/2017/06/13/12/53/profile-2398782_1280.png" alt="Profile" class="w-10 h-10 rounded-full ">
                                    </a>
                                    <div class="absolute right-0 w-48 py-2 mt-2 bg-zinc-900 rounded-lg shadow-xl opacity-0 group-hover:opacity-100 transition-all">
                                        <a href="../pages/admindashboard.php" class="block px-4 py-2 text-sm hover:bg-zinc-800">Profile Settings</a>
                                        <a href="../pages/admindashboard.php" class="block px-4 py-2 text-sm hover:bg-zinc-800">Dashboard</a>
                                        <hr class="my-2 border-zinc-700">
                                        <form method="POST" action="classes/user.php">
                                        <button type="submit" name="log_out" class="block px-4 w-full text-start py-2 text-sm text-red-400 hover:bg-zinc-800">Logout</button>
                                        </form>
                                    </div>
                                </div>
                            </div>';
                        }else {
                            echo '<button class="px-8 py-4 bg-white text-black text-sm hover:bg-zinc-100">
                                <a href="../pages/login.php">Logni NOW</a>
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

                <div class="bg-[#242526] rounded-lg shadow mb-4">
                    <div class="p-4">
                        <div class="flex items-center space-x-2">
                            <input type="search"
                            hx-post="../blogclasses/search.php"
                            hx-trigger="keyup changed"
                            hx-swap="innerHTML"
                            hx-target="#idContainer" name="rechercheByName" placeholder="Find The Post That You Want " class="bg-[#3A3B3C] rounded-full py-2 px-4 text-gray-200 placeholder-gray-400 w-full">
                        </div>
                        <div class="border-t border-[#3A3B3C] mt-4 pt-4">
                            <div class="flex justify-between">
                                <button class="buttonAfficheForm flex items-center space-x-2 hover:bg-[#3A3B3C] px-6 py-2 rounded-lg">
                                    <i class="fas fa-video text-red-500"></i>
                                    <span class="text-gray-300"><a href="create_blog.php">video</a></span>
                                </button>
                                <button class="buttonAfficheForm flex items-center space-x-2 hover:bg-[#3A3B3C] px-6 py-2 rounded-lg">
                                    <i class="fas fa-images text-green-500"></i>
                                    <span class="text-gray-300"><a href="create_blog.php">Photo</a></span>
                                </button>
                                <button class="buttonAfficheForm flex items-center space-x-2 hover:bg-[#3A3B3C] px-6 py-2 rounded-lg">
                                    <i class="fas fa-smile text-yellow-500"></i>
                                    <span class="text-gray-300"><a href="create_blog.php">Feeling/activity</a></span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="idContainer" class="space-y-4">
                    <?php
                    foreach ($result as $result) {
                    if ($result["statu"] === 'approved') {
                    ?>
                    <div class="bg-[#242526] rounded-lg shadow">
                        <div class="p-4">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-2">

                                    <img src="/api/placeholder/40/40" alt="Profile" class="w-10 h-10 rounded-full">
                                    <div>
                                        <p class="text-gray-200 font-semibold"><?php echo $result["client_name"]?></p>
                                        <p class="text-gray-400 text-sm"><?php echo $result["created_at"]?></p>
                                    </div>
                                </div>
                                <button class="text-gray-400 hover:bg-[#3A3B3C] p-2 rounded-full">
                                    <i class="fas fa-ellipsis-h"></i>
                                </button>
                            </div>
                            <p class="text-gray-200 mt-4"><?php echo $result["article_title"]?></p>
                            <img src="<?php echo $result["image"]?>" alt="Post" class="w-full h-[400px] object-cover rounded-lg mt-4">
                            
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
                    <?php
                    }
                }
                    ?>
                </div>
                <div class="flex gap-2 p-4 justify-center">
                    <div class="flex gap-2 p-4 justify-center">
                        <?php
                        $getNumberOfPages = new SearchFilter();
                        $getResultOfThePages = $getNumberOfPages->pageNumber();

                        for ($i = 0; $i < $getResultOfThePages; $i++) { 
                            echo '
                            <form hx-post="../blogclasses/search.php" 
                                  hx-trigger="submit"
                                  hx-swap="innerHTML"
                                  hx-target="#idContainer">
                                <input type="hidden" name="number" value="'. $i .'">
                                <button type="submit" class="pagination-button w-10 h-10 flex items-center justify-center rounded-full bg-gradient-to-r from-[#FF6B6B] to-[#4ECDC4] text-white">'. ($i + 1) .'</button>
                            </form>';
                        }
                        ?>
                    </div>
                </div>
            </div>

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
</body>
</html>
