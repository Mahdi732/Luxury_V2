<?php
require_once('../blogclasses/themes.php');
require_once('../blogclasses/post.classes.php');
$getTheResultOfThems = new Theme();
$result = $getTheResultOfThems->getAllThemes();
?>
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
<body class="bg-[#18191A]">
<nav class=" w-full z-50 bg-zinc-950/90 backdrop-blur-lg">
        <div class="max-w-screen-2xl mx-auto px-8">
            <div class="flex justify-between items-center h-28">
                <a href="../index.php" class="text-xl text-white syncopate">Luxury</a>
                <div class="hidden lg:flex items-center gap-16">
                    <a href="../pages/menu.php" class="text-sm text-white hover:text-zinc-300">FLEET</a>
                    <a href="#experience" class="text-sm text-white hover:text-zinc-300">EXPERIENCE</a>
                    <a href="post.php" class="text-sm text-white hover:text-zinc-300">POST</a>
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
                                <a href="login.php">Logni NOW</a>
                              </button>';
                        }
                    
                    ?>
                    
                </div>
            </div>
        </div>
    </nav>
    <div class="min-h-screen flex items-center justify-center p-4">
        <div class="bg-white rounded-lg shadow-lg w-full max-w-lg">
            <div class="p-4 border-b">
                <h2 class="text-xl font-bold text-center">Create Post</h2>
            </div>

            <form class="p-4" action="../blogclasses/post.classes.php" method="POST" enctype="multipart/form-data">
            <div class="flex flex-col space-y-2 mb-4">
                <input 
                    type="search" 
                    placeholder="Your title" 
                    name="name" 
                    class="border border-gray-300 p-3 rounded-lg w-full focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

                <div class="flex items-center space-x-3 mb-4">
                <input type="text" name="addTags" id="addTags" placeholder="Search and add tags" class="border p-2 rounded-lg flex-1" >
                <div class="flex flex-col space-y-2">
                <input 
                    type="search" 
                    placeholder="Insert Title" 
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
                    placeholder="What's on your mind?"
                    name="content"></textarea>

                <div class="border rounded-lg p-4 mb-4">
                    <h3 class="font-semibold mb-3">Add picture your post</h3>
                    <div class="flex space-x-4">
                    <div class="flex items-center justify-center w-full">
                        <label class="w-full h-32 border-2 border-dashed border-accent rounded-lg flex flex-col items-center justify-center cursor-pointer hover:bg-deep-blue transition-colors">
                            <svg class="w-8 h-8 text-accent mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                            </svg>
                            <span class="text-sm text-accent">Choose one</span>
                            <input type="file" name="image" accept="image/*" class="hidden">
                        </label>
                    </div>
                    </div>
                </div>

                <!-- Privacy Setting -->
                <div class="mb-4">
                    <select name="theme" class="w-full p-2 border rounded-lg">
                        <?php
                        foreach ($result as $results) {
                        ?>
                        <option value="<?php echo $results["theme_id"] ?>" class="text-black"><?php echo $results["name"] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
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