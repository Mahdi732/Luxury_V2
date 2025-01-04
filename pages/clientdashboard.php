<?php
require_once('../classes/admin.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Luxury Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .glass {
            background: rgba(0, 0, 0, 0.7);
            backdrop-filter: blur(30px);
            -webkit-backdrop-filter: blur(30px);
        }
        .glass-light {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
        }
    </style>
</head>
<body class="bg-black min-h-screen">
    <!-- Background Gradients -->
    <div class="fixed inset-0 z-0">
        <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top,rgba(255,107,107,0.1),transparent_50%)]"></div>
        <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_bottom,rgba(78,205,196,0.1),transparent_50%)]"></div>
    </div>

    <div class="relative z-10 flex min-h-screen">
        <!-- Sidebar -->
        <aside class="w-64 glass border-r border-white/10">
            <!-- Logo -->
            <div class="p-6 border-b border-white/10">
                <div class="flex items-center space-x-3">
                    <span class="text-2xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-[#FF6B6B] to-[#4ECDC4]">
                       <a href="../index.php">LuxuryAdmin</a> 
                    </span>
                </div>
            </div>

            <!-- Navigation -->
            <nav class="p-4 space-y-2">
                <a href="#" class="flex items-center space-x-3 p-3 rounded-xl bg-gradient-to-r from-[#FF6B6B] to-[#4ECDC4] text-white">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                    </svg>
                    <span>Dashboard</span>
                </a>
                <a href="#" class="flex items-center space-x-3 p-3 rounded-xl text-gray-400 hover:text-white transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                    </svg>
                    <span>Users</span>
                </a>
                <a href="#" class="flex items-center space-x-3 p-3 rounded-xl text-gray-400 hover:text-white transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                    </svg>
                    <span>Bookings</span>
                </a>
                <button id="fleet" class="flex items-center w-full space-x-3 p-3 rounded-xl text-gray-400 hover:text-white transition-colors">
                 <a href="#" class="flex space-x-3">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                    </svg>
                    <span>Fleet</span>
                </a>   
                </button>
                
                <a href="#" class="flex items-center space-x-3 p-3 rounded-xl text-gray-400 hover:text-white transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <span>Finance</span>
                </a>
            </nav>

            <!-- User Profile -->
            <div class="absolute bottom-0 w-full p-4 border-t border-white/10">
                <div class="flex items-center space-x-3">
                    <img src="/api/placeholder/32/32" alt="Admin" class="w-8 h-8 rounded-full">
                    <div>
                        <p class="text-sm font-medium text-white">Admin User</p>
                        <p class="text-xs text-gray-400">admin@luxury.com</p>
                    </div>
                </div>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 overflow-auto">
            <!-- Top Bar -->
            <header class="glass-light border-b border-white/10 sticky top-0 z-50">
                <div class="flex items-center justify-between p-4">
                    <h1 class="text-xl font-bold text-white">Dashboard Overview</h1>
                        <div class="flex items-center space-x-4">
                        <button id="openModalBtn" class="p-2 bg-blue-500 text-white rounded-xl hover:bg-blue-600 transition-colors">
                               Create Vehicle
                           </button>
                             <button class="p-2 rounded-xl text-gray-400 hover:text-white transition-colors">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                                </svg>
                            </button>
                            <div class="relative group">
                            <button class="p-2 rounded-xl text-gray-400 hover:text-white transition-colors group">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                            </button>
                                <div class="absolute right-0 w-48 py-2 mt-2 bg-zinc-900 rounded-lg shadow-xl opacity-0 group-hover:opacity-100 transition-all">
                                    <a href="admindashboard.php" class="block px-4 py-2 text-white text-sm hover:bg-zinc-800">Profile Settings</a>
                                    <a href="admindashboard.php" class="block px-4 py-2 text-white text-sm hover:bg-zinc-800">Dashboard</a>
                                    <hr class="my-2 border-zinc-700">
                                    <form method="POST" action="classes/user.php">
                                    <button type="submit" name="log_out" class="block px-4 w-full text-start py-2 text-sm text-red-400 hover:bg-zinc-800">Logout</button>
                                    </form>
                                </div>
                        </div>
                    </div>
                </div>
            </header>

            <div id="createModal" class="fixed inset-0 bg-black bg-opacity-50 flex z-50 items-center justify-center hidden overflow-y-auto py-6">
    <div class="bg-white rounded-lg p-6 w-full max-w-xl mx-4 my-auto">
        <h2 class="text-xl font-bold mb-6">Create Vehicles</h2>
        <form method="POST" action="../classes/admin.php" id="createVehicleForm" class="max-h-[80vh] overflow-y-auto pr-2">
            <div id="vehicleContainer">
                <div class="vehicleEntry border p-6 mb-6 rounded-lg bg-gray-50 shadow-sm">
                    <div class="mb-4">
                        <label for="model" class="block text-sm font-medium text-gray-700 mb-1">Model</label>
                        <input type="text" name="vehicles[0][model]" class="mt-1 p-2.5 border border-gray-300 rounded-md w-full focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required />
                    </div>
                    <div class="mb-4">
                        <label for="" class="block text-sm font-medium text-gray-700 mb-1">Image</label>
                        <input type="text" name="vehicles[0][image]" class="mt-1 p-2.5 border border-gray-300 rounded-md w-full focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required />
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="mb-4">
                            <label for="price" class="block text-sm font-medium text-gray-700 mb-1">Price</label>
                            <input type="number" name="vehicles[0][price]" class="mt-1 p-2.5 border border-gray-300 rounded-md w-full focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required />
                        </div>
                        <div class="mb-4">
                            <label for="" class="block text-sm font-medium text-gray-700 mb-1">Availability</label>
                            <input type="number" name="vehicles[0][availability]" class="mt-1 p-2.5 border border-gray-300 rounded-md w-full focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required />
                        </div>
                    </div>
                    <div class="mb-4">
                        <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                        <textarea name="vehicles[0][description]" class="mt-1 p-2.5 border border-gray-300 rounded-md w-full h-24 resize-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required></textarea>
                    </div>
                    <div class="mb-4">
                        <label for="category" class="block text-sm font-medium text-gray-700 mb-1">Category</label>
                        <select name="vehicles[0][category]" class="mt-1 p-2.5 border border-gray-300 rounded-md w-full focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
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
                    <div class="mb-4">
                        <label for="model" class="block text-sm font-medium text-gray-700 mb-1">Mark</label>
                        <input type="text" name="vehicles[0][marque]" class="mt-1 p-2.5 border border-gray-300 rounded-md w-full focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required />
                    </div>
                </div>
            </div>
            <button type="button" id="addVehicleBtn" class="w-full px-4 py-2.5 bg-green-500 text-white rounded-md hover:bg-green-600 transition-colors mb-6 font-medium">
                Add Another Vehicle
            </button>
            <div class="flex justify-end space-x-3">
                <button type="button" id="closeModalBtn" class="px-6 py-2.5 bg-gray-100 text-gray-700 rounded-md hover:bg-gray-200 transition-colors font-medium">Cancel</button>
                <button type="submit" class="px-6 py-2.5 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition-colors font-medium">Save</button>
            </div>
        </form>
    </div>
</div>


            <!-- Dashboard Content -->
            <div id="container_dash" class="p-6 space-y-6">
                <!-- Stats Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <!-- Total Revenue -->
                    <div class="glass-light rounded-xl p-6 border border-white/10">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-400">Total Revenue</p>
                                <p class="text-2xl font-bold text-white mt-1">€145,280</p>
                                <p class="text-sm text-emerald-400">+12.5% from last month</p>
                            </div>
                            <div class="w-12 h-12 rounded-xl bg-gradient-to-r from-[#FF6B6B] to-[#4ECDC4] flex items-center justify-center">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Active Bookings -->
                    <div class="glass-light rounded-xl p-6 border border-white/10">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-400">Active Bookings</p>
                                <p class="text-2xl font-bold text-white mt-1">24</p>
                                <p class="text-sm text-emerald-400">+3 from last week</p>
                            </div>
                            <div class="w-12 h-12 rounded-xl bg-gradient-to-r from-[#4ECDC4] to-[#FF6B6B] flex items-center justify-center">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Total Users -->
                    <div class="glass-light rounded-xl p-6 border border-white/10">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-400">Total Users</p>
                                <p class="text-2xl font-bold text-white mt-1">2,849</p>
                                <p class="text-sm text-emerald-400">+8.5% this month</p>
                            </div>
                            <div class="w-12 h-12 rounded-xl bg-gradient-to-r from-[#FF6B6B] to-[#4ECDC4] flex items-center justify-center">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Available Vehicles -->
                    <div class="glass-light rounded-xl p-6 border border-white/10">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-400">Available Vehicles</p>
                                <p class="text-2xl font-bold text-white mt-1">18</p>
                                <p class="text-sm text-emerald-400">75% of fleet</p>
                            </div>
                            <div class="w-12 h-12 rounded-xl bg-gradient-to-r from-[#4ECDC4] to-[#FF6B6B] flex items-center justify-center">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recent Bookings -->
                <div class="glass-light rounded-xl border border-white/10">
                    <div class="p-6 border-b border-white/10">
                        <h2 class="text-lg font-bold text-white">Recent Bookings</h2>
                    </div>
                    <div class="p-6">
                        <table class="w-full">
                            <thead>
                                <tr class="text-sm text-gray-400">
                                    <th class="text-left pb-4">Customer</th>
                                    <th class="text-left pb-4">Vehicle</th>
                                    <th class="text-left pb-4">Duration</th>
                                    <th class="text-left pb-4">Amount</th>
                                    <th class="text-left pb-4">Status</th>
                                </tr>
                            </thead>
                            <tbody class="text-sm">
                                <tr class="text-white">
                                    <td class="py-3">James Wilson</td>
                                    <td class="py-3">Rolls-Royce Ghost</td>
                                    <td class="py-3">3 days</td>
                                    <td class="py-3">€4,500</td>
                                    <td class="py-3"><span class="px-3 py-1 rounded-full text-xs bg-emerald-400/10 text-emerald-400">Active</span></td>
                                </tr>
                                <tr class="text-white">
                                    <td class="py-3">Sarah Chen</td>
                                    <td class="py-3">Bentley Continental GT</td>
                                    <td class="py-3">5 days</td>
                                    <td class="py-3">€6,200</td>
                                    <td class="py-3"><span class="px-3 py-1 rounded-full text-xs bg-blue-400/10 text-blue-400">Upcoming</span></td>
                                </tr>
                                <tr class="text-white">
                                    <td class="py-3">Michael Brown</td>
                                    <td class="py-3">Lamborghini Huracán</td>
                                    <td class="py-3">2 days</td>
                                    <td class="py-3">€3,800</td>
                                    <td class="py-3"><span class="px-3 py-1 rounded-full text-xs bg-gray-400/10 text-gray-400">Completed</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </main>
    </div>

    <script>
    const openModalBtn = document.getElementById('openModalBtn');
    const createModal = document.getElementById('createModal');
    const closeModalBtn = document.getElementById('closeModalBtn');

    openModalBtn.addEventListener('click', () => {
        createModal.classList.remove('hidden');
    });

    closeModalBtn.addEventListener('click', () => {
        createModal.classList.add('hidden');
    });
    document.getElementById('addVehicleBtn').addEventListener('click', () => {
    const vehicleContainer = document.getElementById('vehicleContainer');
    const vehicleEntries = document.querySelectorAll('.vehicleEntry');
    const newIndex = vehicleEntries.length;

    const newEntry = vehicleEntries[0].cloneNode(true);

    Array.from(newEntry.querySelectorAll('input, select, textarea')).forEach(input => {
        const name = input.getAttribute('name');
        if (name) {
            input.setAttribute('name', name.replace(/\[\d+\]/, `[${newIndex}]`));
            input.value = '';
        }
    });

    vehicleContainer.appendChild(newEntry);
});

</script>
<script src="../script/script.js"></script>
</body>
</html>