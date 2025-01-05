<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DRIVE & LOC - Luxury Redefined</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
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
<body class="bg-zinc-950 text-white">
    <!-- Navigation -->
    <nav class="fixed w-full z-50 h-[8rem] bg-zinc-950/90 backdrop-blur-lg">
        <div class="max-w-screen-2xl mx-auto px-8">
            <div class="flex justify-between items-center h-28">
                <a href="#" class="text-xl syncopate">Luxury</a>
                <div class="hidden lg:flex items-center gap-16">
                    <a href="pages/menu.php" class="text-sm hover:text-zinc-300">FLEET</a>
                    <a href="#experience" class="text-sm hover:text-zinc-300">EXPERIENCE</a>
                    <a href="#contact" class="text-sm hover:text-zinc-300">CONTACT</a>
                    <?php
                        if (isset($_SESSION["admin"]) && $_SESSION["admin"] === true) {
                            echo '<div class="flex items-center gap-6">
                            <div class="relative group">
                                    <a href="pages/clientdashboard.php" class="flex items-center gap-2 hover:text-zinc-300 transition-all">
                                        <img src="https://cdn.pixabay.com/photo/2017/06/13/12/53/profile-2398782_1280.png" alt="Profile" class="w-10 h-10 rounded-full ">
                                    </a>
                                    <div class="absolute right-0 w-48 py-2 mt-2 bg-zinc-900 rounded-lg shadow-xl opacity-0 group-hover:opacity-100 transition-all">
                                        <a href="pages/clientdashboard.php" class="block px-4 py-2 text-sm hover:bg-zinc-800">Profile Settings</a>
                                        <a href="pages/clientdashboard.php" class="block px-4 py-2 text-sm hover:bg-zinc-800">Dashboard</a>
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
                                    <a href="pages/admindashboard.php" class="flex items-center gap-2 hover:text-zinc-300 transition-all">
                                        <img src="https://cdn.pixabay.com/photo/2017/06/13/12/53/profile-2398782_1280.png" alt="Profile" class="w-10 h-10 rounded-full ">
                                    </a>
                                    <div class="absolute right-0 w-48 py-2 mt-2 bg-zinc-900 rounded-lg shadow-xl opacity-0 group-hover:opacity-100 transition-all">
                                        <a href="pages/admindashboard.php" class="block px-4 py-2 text-sm hover:bg-zinc-800">Profile Settings</a>
                                        <a href="pages/admindashboard.php" class="block px-4 py-2 text-sm hover:bg-zinc-800">Dashboard</a>
                                        <hr class="my-2 border-zinc-700">
                                        <form method="POST" action="classes/user.php">
                                        <button type="submit" name="log_out" class="block px-4 w-full text-start py-2 text-sm text-red-400 hover:bg-zinc-800">Logout</button>
                                        </form>
                                    </div>
                                </div>
                            </div>';
                        }else {
                            echo '<button class="px-8 py-4 bg-white text-black text-sm hover:bg-zinc-100">
                                <a href="pages/login.php">Logni NOW</a>
                              </button>';
                        }
                    
                    ?>
                    
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="min-h-screen grid grid-cols-1 lg:grid-cols-2">
        <!-- Left Content -->
        <div class="flex items-center px-8 lg:px-16 pt-28 lg:pt-0">
            <div class="space-y-8">
                <span class="text-sm tracking-widest text-zinc-400">LUXURY CAR RENTAL</span>
                <h1 class="text-6xl lg:text-7xl xl:text-8xl syncopate font-bold leading-none">
                    BEYOND<br>LIMITS
                </h1>
                <p class="text-lg text-zinc-300 max-w-md">
                    Experience automotive excellence through our curated collection of premium vehicles.
                </p>
            </div>
        </div>
        <!-- Right Image -->
        <div class="relative h-[60vh] lg:h-screen">
            <img src="img/home.png" alt="Luxury vehicle" 
                 class="absolute  w-full h-[30rem] md:mt-[8rem] object-cover">
        </div>
    </section>

    <!-- Featured Cars Grid -->
    <section id="fleet" class="py-32 px-8">
        <div class="max-w-screen-2xl mx-auto">
            <!-- Section Header -->
            <div class="flex flex-col lg:flex-row justify-between items-start lg:items-end mb-24">
                <h2 class="text-4xl syncopate mb-8 lg:mb-0">FEATURED<br>COLLECTION</h2>
                <p class="text-zinc-400 max-w-md">Discover our handpicked selection of the world's finest automobiles.</p>
            </div>
            
            <!-- Cars Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Car Card 1 -->
                <article class="space-y-6">
                    <div class="aspect-[4/5] overflow-hidden bg-zinc-900">
                        <img src="img/rolls-royce-phantom.webp" alt="Luxury car" 
                             class="w-full h-full object-cover">
                    </div>
                    <div class="space-y-2">
                        <h3 class="syncopate text-xl">ROLLS-ROYCE PHANTOM</h3>
                        <p class="text-zinc-400">From €2,500 per day</p>
                    </div>
                </article>

                <!-- Car Card 2 -->
                <article class="space-y-6">
                    <div class="aspect-[4/5] overflow-hidden bg-zinc-900">
                        <img src="https://prodhq.s3.amazonaws.com/img/content/gp1/models/2023/toyota/gr_supra_white_front_grill_1080x1080.png" alt="Luxury car" 
                             class="w-full h-full object-cover">
                    </div>
                    <div class="space-y-2">
                        <h3 class="syncopate text-xl">BENTLEY CONTINENTAL GT</h3>
                        <p class="text-zinc-400">From €1,800 per day</p>
                    </div>
                </article>

                <!-- Car Card 3 -->
                <article class="space-y-6">
                    <div class="aspect-[4/5] overflow-hidden bg-zinc-900">
                        <img src="https://wallpapercave.com/wp/wp11615577.jpg" alt="Luxury car" 
                             class="w-full h-full object-cover">
                    </div>
                    <div class="space-y-2">
                        <h3 class="syncopate text-xl">MERCEDES-MAYBACH S680</h3>
                        <p class="text-zinc-400">From €2,000 per day</p>
                    </div>
                </article>
            </div>
        </div>
    </section>

    <!-- Experience Section -->
    <section id="experience" class="py-32 bg-white text-black">
        <div class="max-w-screen-2xl mx-auto px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-24">
                <!-- Left Image -->
                <div class="relative aspect-square">
                    <img src="https://d.newsweek.com/en/full/2258444/cats-road-rage-incident-goes-viral.jpg" alt="Luxury experience" 
                         class="w-full h-full object-cover">
                </div>
                <!-- Right Content -->
                <div class="flex flex-col justify-center space-y-8">
                    <span class="text-sm tracking-widest text-zinc-600">OUR SERVICE</span>
                    <h2 class="text-4xl syncopate">EXCEPTIONAL<br>EXPERIENCE</h2>
                    <div class="space-y-12">
                        <div class="space-y-4">
                            <h3 class="text-xl font-medium">24/7 Concierge</h3>
                            <p class="text-zinc-600">Personal assistance available round the clock for all your needs.</p>
                        </div>
                        <div class="space-y-4">
                            <h3 class="text-xl font-medium">Door-to-Door Delivery</h3>
                            <p class="text-zinc-600">Seamless delivery and pickup at your preferred location.</p>
                        </div>
                        <div class="space-y-4">
                            <h3 class="text-xl font-medium">Chauffeur Service</h3>
                            <p class="text-zinc-600">Professional drivers trained to provide ultimate comfort.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-32">
        <div class="max-w-screen-2xl mx-auto px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-24">
                <!-- Left Content -->
                <div class="space-y-8">
                    <span class="text-sm tracking-widest text-zinc-400">GET IN TOUCH</span>
                    <h2 class="text-4xl syncopate">START YOUR<br>JOURNEY</h2>
                    <div class="space-y-6 text-zinc-400">
                        <p><i class="fas fa-phone mr-4"></i> +33 1 23 45 67 89</p>
                        <p><i class="fas fa-envelope mr-4"></i> contact@drivenloc.fr</p>
                        <p><i class="fas fa-map-marker-alt mr-4"></i> 75008 Paris, France</p>
                    </div>
                </div>
                <!-- Right Form -->
                <form class="space-y-12">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <input type="text" placeholder="Name" 
                               class="bg-transparent border-b border-zinc-800 py-4 focus:outline-none focus:border-white">
                        <input type="email" placeholder="Email" 
                               class="bg-transparent border-b border-zinc-800 py-4 focus:outline-none focus:border-white">
                    </div>
                    <textarea placeholder="Message" rows="4"
                              class="w-full bg-transparent border-b border-zinc-800 py-4 focus:outline-none focus:border-white"></textarea>
                    <button class="w-full md:w-auto px-12 py-6 bg-white text-black hover:bg-zinc-100">
                        SEND MESSAGE
                    </button>
                </form>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="py-16 border-t border-zinc-900">
        <div class="max-w-screen-2xl mx-auto px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-12">
                <div class="space-y-6">
                    <h3 class="syncopate text-lg">Luxury</h3>
                    <p class="text-zinc-400">Redefining luxury car rental experiences.</p>
                </div>
                <div class="space-y-6">
                    <h4 class="text-sm font-medium">Navigation</h4>
                    <ul class="space-y-4 text-zinc-400">
                        <li><a href="#fleet" class="hover:text-white">Fleet</a></li>
                        <li><a href="#experience" class="hover:text-white">Experience</a></li>
                        <li><a href="#contact" class="hover:text-white">Contact</a></li>
                    </ul>
                </div>
                <div class="space-y-6">
                    <h4 class="text-sm font-medium">Follow Us</h4>
                    <div class="flex space-x-6 text-zinc-400">
                        <a href="#" class="hover:text-white"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="hover:text-white"><i class="fab fa-facebook"></i></a>
                        <a href="#" class="hover:text-white"><i class="fab fa-linkedin"></i></a>
                    </div>
                </div>
                <div class="space-y-6">
                    <h4 class="text-sm font-medium">Newsletter</h4>
                    <div class="flex">
                        <input type="email" placeholder="Your email" 
                               class="bg-transparent border-b border-zinc-800 py-2 flex-grow focus:outline-none focus:border-white">
                        <button class="ml-4 px-6 py-2 bg-white text-black hover:bg-zinc-100">
                            <i class="fas fa-arrow-right"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>