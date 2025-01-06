<?php
require_once('../classes/admin.php');
require_once("../classes/menu.php");
require_once("../connection/connect.php");
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
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap');
        
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: linear-gradient(to bottom, #0f172a, #1e293b);
        }

        .glass-effect {
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.05);
        }

        .image-container {
            position: relative;
            overflow: hidden;
            border-radius: 1rem;
        }

        .image-container::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 1rem;
        }

        .gradient-text {
            background: linear-gradient(135deg, #60a5fa, #c084fc);
            -webkit-background-clip: text;
            color: transparent;
        }
    </style>
</head>
<body class="min-h-screen text-gray-100">
    <div class="max-w-6xl mx-auto px-4 py-12">
        <div class="glass-effect rounded-2xl p-8 shadow-xl">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                <div class="space-y-6">
                    <div class="image-container h-[400px]">
                        <img src="<?php echo $result["image_url"] ?>" 
                             alt="<?php echo $result["model"] ?>" 
                             class="w-full h-full object-cover">
                    </div>
                    
                    <div class="grid grid-cols-2 gap-4">
                        <div class="glass-effect rounded-xl p-4">
                            <p class="text-sm text-gray-400">Catégorie</p>
                            <p class="text-lg font-semibold mt-1"><?php echo $result["category_name"] ?></p>
                        </div>
                        <div class="glass-effect rounded-xl p-4">
                            <p class="text-sm text-gray-400">Disponibilité</p>
                            <p class="text-lg font-semibold mt-1"><?php echo $result["availability"] ?></p>
                        </div>
                    </div>
                </div>

                <div class="space-y-8">
                    <div>
                        <div class="flex items-center gap-4 mb-4">
                            <span class="px-3 py-1 bg-blue-500/10 text-blue-400 rounded-full text-sm font-medium">
                                <?php echo $result["Marque"] ?>
                            </span>
                            <span class="px-3 py-1 bg-purple-500/10 text-purple-400 rounded-full text-sm font-medium">
                                Premium
                            </span>
                        </div>
                        <h1 class="text-4xl font-bold gradient-text mb-2">
                            <?php echo $result["model"] ?>
                        </h1>
                    </div>

                    <div class="glass-effect rounded-xl p-6 space-y-4">
                        <div class="flex justify-between items-center">
                            <span class="text-gray-400">Prix mensuel</span>
                            <span class="text-2xl font-bold gradient-text">
                                <?php echo $result["price"] ?> €
                            </span>
                        </div>
                        <div class="flex justify-between items-center pt-4 border-t border-gray-700">
                            <span class="text-gray-400">Prix annuel total</span>
                            <span class="text-2xl font-bold gradient-text">
                                <?php echo $result["price"] * 12?> €
                            </span>
                        </div>
                    </div>

                    <div class="space-y-4">
                        <h3 class="text-xl font-semibold">Description</h3>
                        <p class="text-gray-400 leading-relaxed">
                            <?php echo $result["description"] ?>
                        </p>
                    </div>

                    <div class="flex gap-4 pt-4">                        
                        
                        <?php if ($_SESSION["admin"] == true) { ?>
                        <button class="flex-1 px-6 py-4 bg-gradient-to-r from-blue-500 to-purple-500 rounded-xl text-white font-semibold hover:opacity-90 transition-all duration-300 transform hover:scale-[1.02]">
                            Réserver maintenant
                        </button>
                        <form action="../classes/admin.php" method="POST">
                            <input type="hidden" class="text-black" name="delete_car" value="<?php echo $result["vehicle_id"] ?>">
                        <button type="submit" class=" bg-red-600 px-6 py-7 glass-effect rounded-xl font-semibold hover:bg-white/5 transition-all duration-300">
                            Delete
                        </button>
                        </form>
                        <button id="openModalBtnA" class=" px-6 py-4 bg-green-600 glass-effect rounded-xl font-semibold hover:bg-white/5 transition-all duration-300">
                            Edits
                        </button>
                        
                        <button onclick="window.history.back()" class="px-6 py-4 glass-effect rounded-xl font-semibold hover:bg-white/5 transition-all duration-300">
                            Retour
                        </button>
                        
                        <?php }else { ?>
                            <button onclick="openReservationModal()" class="flex-1 px-6 py-4 bg-gradient-to-r from-blue-500 to-purple-500 rounded-xl text-white font-semibold hover:opacity-90 transition-all duration-300 transform hover:scale-[1.02]">
                            Réserver maintenant
                        </button>
                        <button onclick="window.history.back()" class="px-6 py-4 glass-effect rounded-xl font-semibold hover:bg-white/5 transition-all duration-300">
                            Retour
                        </button>
                        <?php } ?>
                        <div id="reservationModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4">
        <div class="bg-white rounded-xl shadow-xl max-w-md w-full">
            <form method="POST" action="../classes/client.php" class="p-6">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-xl font-semibold text-gray-900">Réserver ce véhicule</h2>
                    <button type="button" onclick="closeReservationModal()" class="text-gray-400 hover:text-gray-500">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>

                <div class="bg-gray-50 rounded-lg p-4 mb-6">
                    <p class="text-sm text-gray-500">Véhicule sélectionné:</p>
                    <p class="font-medium text-gray-900"><?php echo $result['model']; ?></p>
                    <p class="text-sm text-gray-500 mt-2">Prix par jour:</p>
                    <p class="font-medium text-gray-900"><?php echo $result['price']; ?> €</p>
                </div>
                <div>
                    <p class="block text-sm font-medium text-gray-700 mb-1">vehicle Image</p>
                    <div class="w-full h-48 bg-gray-200 rounded-lg overflow-hidden mb-4">
                        <img 
                            src="<?php echo $result["image_url"] ?>" 
                            alt="Vehicle preview" 
                            class="w-full h-full object-cover"
                        />
                    </div>
                </div>

                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            Date de début
                        </label>
                        <input 
                            type="date" 
                            name="start_date" 
                            class="w-full p-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            required
                        />
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            Date de fin
                        </label>
                        <input 
                            type="date" 
                            name="end_date" 
                            class="w-full p-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            required
                        />
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            Lieu de prise en charge
                        </label>
                        
                        <input 
                            type="text" 
                            name="pickup_location" 
                            class="w-full p-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            required
                        />
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            location to retuen
                        </label>
                        
                        <input 
                            type="text" 
                            name="dropoff_location" 
                            class="w-full p-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            required
                        />
                    </div>
                    <input type="hidden" class="text-black" name="idResrvationClient" value="<?php echo $_SESSION["user_id"] ?>">
                    <input type="hidden" class="text-black" name="idResrvationVehicule" value="<?php echo $result["vehicle_id"] ?>">
                </div>
                <div class="flex justify-end space-x-3 mt-6 pt-6 border-t">
                    <button 
                        type="button"
                        onclick="closeReservationModal()"
                        class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors"
                    >
                        Annuler
                    </button>
                    <button 
                        type="submit"
                        class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition-colors"
                    >
                        Confirmer la réservation
                    </button>
                </div>
            </form>
        </div>
    </div>
                        <div id="edit_model" class="fixed inset-0 bg-black bg-opacity-50 flex z-50 items-center justify-center hidden overflow-y-auto py-6">
    <div class="bg-white rounded-lg p-6 w-full max-w-xl mx-4 my-auto">
        <h2 class="text-xl font-bold mb-6 text-black">Edits Vehicles</h2>
        <form method="POST" action="../classes/admin.php" id="createVehicleForm" class="max-h-[80vh] overflow-y-auto pr-2">
            <div id="vehicleContainer">
                <div class="vehicleEntry border p-6 mb-6 rounded-lg bg-gray-50 shadow-sm">
                    <div class="mb-4">
                        <label for="model" class="block text-sm font-medium text-gray-700 mb-1">Model</label>
                        <input type="text" name="editedvehiclesmodel" value="<?php echo $result["model"] ?>" class="mt-1 text-black p-2.5 border border-gray-300 rounded-md w-full focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required />
                    </div>
                    <div>
                        <p class="block text-sm font-medium text-gray-700 mb-1">Current Image</p>
                            <div class="w-full h-48 bg-gray-200 rounded-lg overflow-hidden mb-4">
                                <img 
                                    src="<?php echo $result["image_url"] ?>" 
                                    alt="Vehicle preview" 
                                    class="w-full h-full object-cover"
                                />
                            </div>
                    </div>
                    <div class="mb-4">
                        <label for="" class="block text-sm font-medium text-gray-700 mb-1">Image</label>
                        <input type="text" name="editedvehiclesimage" value="<?php echo $result["image_url"] ?>" class="text-black mt-1 p-2.5 border border-gray-300 rounded-md w-full focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required />
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="mb-4">
                            <label for="price" class="block text-sm font-medium text-gray-700 mb-1">Price</label>
                            <input type="number" name="editedvehiclesprice" value="<?php echo $result["price"] ?>" class="text-black mt-1 p-2.5 border border-gray-300 rounded-md w-full focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required />
                        </div>
                        <div class="mb-4">
                            <label for="" class="block text-sm font-medium text-gray-700 mb-1">Availability</label>
                            <input type="number" name="editedvehiclesavailability" value="<?php echo $result["availability"] ?>" class="text-black mt-1 p-2.5 border border-gray-300 rounded-md w-full focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required />
                        </div>
                    </div>
                    <div class="mb-4">
                        <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                        <textarea name="editedvehiclesdescription" value="<?php echo $result["description"] ?>" class="text-black mt-1 p-2.5 border border-gray-300 rounded-md w-full h-24 resize-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required></textarea>
                    </div>
                    <div class="mb-4">
                        <label for="model" class="block text-sm font-medium text-gray-700 mb-1">Mark</label>
                        <input type="text" name="editedvehiclesmarque" value="<?php echo $result["Marque"] ?>" class="text-black mt-1 p-2.5 border border-gray-300 rounded-md w-full focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required />
                    </div>
                    <input type="hidden" name="idEdeted" value="<?php echo $result["vehicle_id"] ?>" />
                    <div class="mb-4">
                        <label for="category" class="block text-sm font-medium text-gray-700 mb-1">Category</label>
                        <select name="editedvehiclescategory" class="text-black mt-1 p-2.5 border border-gray-300 rounded-md w-full focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            <?php 
                            $getcategorie = new Admin();
                            $result = $getcategorie->getCategories();
                            if ($result) {
                                foreach($result as $get){
                                    echo '<option value="'. $get["category_id"] .'">' . $get["name"] . '</option>';
                                }
                            }else {
                                echo "there's no categories for now";
                            }
                            ?>
                        </select>
                    </div>
                    
                </div>
            </div>
            <div class="flex justify-end space-x-3">
                <button type="button" id="closeModalBtn" class="px-6 py-2.5 bg-gray-100 text-gray-700 rounded-md hover:bg-gray-200 transition-colors font-medium">Cancel</button>
                <button type="submit" class="px-6 py-2.5 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition-colors font-medium">Save</button>
            </div>
        </form>
    </div>
            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function openReservationModal() {
            document.getElementById('reservationModal').classList.remove('hidden');
        }

        function closeReservationModal() {
            document.getElementById('reservationModal').classList.add('hidden');
        }
        const openModalBtn = document.getElementById('openModalBtnA');
    const createModal = document.getElementById('edit_model');
    const closeModalBtn = document.getElementById('closeModalBtn');


    openModalBtn.addEventListener('click', () => {
    console.log("Modal button clicked!");
    createModal.classList.remove('hidden');
});

    closeModalBtn.addEventListener('click', () => {
        createModal.classList.add('hidden');
    });
    </script>
</body>
</html>