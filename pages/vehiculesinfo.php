<?php
require_once("../classes/menu.php");
if(isset($_POST['id_info'])){
    $car_id = $_POST['id_info'];
    $menu = new Menu();
    $result = $menu->showVehiculeInfo($car_id);
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vehicle Information - Drive & Loc</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Syncopate:wght@400;700&family=Commissioner:wght@200;300;400;500&display=swap');
        
        body {
            font-family: 'Commissioner', sans-serif;
        }
        
        .syncopate {
            font-family: 'Syncopate', sans-serif;
        }

        .gradient-border {
            position: relative;
            border-radius: 0.75rem;
            padding: 1px;
            background: linear-gradient(60deg, #FF6B6B, #4ECDC4, #FF6B6B);
            background-size: 200% 200%;
            animation: borderGradient 4s linear infinite;
        }

        @keyframes borderGradient {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
    </style>
</head>
<body class="bg-black/95 min-h-screen">
    <div class="max-w-4xl mx-auto px-4 py-16">
        <div class="gradient-border">
            <div class="bg-black rounded-xl p-8">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    
                    <div class="space-y-4">
                        <div class="gradient-border">
                            <img src="<?php echo $result["image_url"] ?>" 
                                 alt="" 
                                 class="w-full h-64 object-cover rounded-xl">
                        </div>
                    </div>

                    <!-- Vehicle Info Section -->
                    <div class="space-y-6">
                        <div>
                            <h1 class="text-3xl font-bold text-white mb-2">
                            <?php echo $result["model"] ?>
                            </h1>
                            <span class="px-3 py-1 bg-[#FF6B6B]/20 text-[#FF6B6B] rounded-full text-sm">
                            <?php echo $result["Marque"] ?>
                            </span>
                        </div>

                        <div class="space-y-4">
                            <div class="flex justify-between py-3 border-b border-gray-800">
                                <span class="text-gray-400">Total Prix</span>
                                <span class="text-xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-[#FF6B6B] to-[#4ECDC4]">
                                <?php echo $result["price"] * 12?>  €
                                </span>
                            </div>
                            <div class="flex justify-between py-3 border-b border-gray-800">
                                <span class="text-gray-400">month Prix</span>
                                <span class="text-xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-[#FF6B6B] to-[#4ECDC4]">
                                <?php echo $result["price"] ?>  €
                                </span>
                            </div>
                            <div class="flex justify-between py-3 border-b border-gray-800">
                                <span class="text-gray-400">Catégorie</span>
                                <span class="text-white"><?php echo $result["category_name"] ?></span>
                            </div>

                            <div class="flex justify-between py-3 border-b border-gray-800">
                                <span class="text-gray-400">availability</span>
                                <span class="text-white"><?php echo $result["availability"] ?></span>
                            </div>
                        </div>

                        <div class="space-y-4">
                            <h3 class="text-xl font-bold text-white">Description</h3>
                            <p class="text-gray-400">
                            <?php echo $result["description"] ?>
                            </p>
                        </div>

                        <div class="flex gap-4">
                            <button class="flex-1 px-6 py-3 bg-gradient-to-r from-[#FF6B6B] to-[#4ECDC4] rounded-full text-white font-medium hover:opacity-90 transition-opacity duration-300">
                                Réserver maintenant
                            </button>
                            <button onclick="window.history.back()" class="px-6 py-3 border border-gray-800 rounded-full text-white hover:border-[#FF6B6B] transition-colors duration-300">
                                Retour
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>