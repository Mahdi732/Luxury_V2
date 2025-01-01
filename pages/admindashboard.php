<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drive & Loc - Dashboard Client</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
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

        @keyframes pulse-border {
            0%, 100% { border-color: rgba(255, 107, 107, 0.5); }
            50% { border-color: rgba(78, 205, 196, 0.5); }
        }

        .pulse-border {
            animation: pulse-border 3s infinite;
        }

        .scrollbar-hidden::-webkit-scrollbar {
            display: none;
        }

        .car-card:hover .car-hover-content {
            opacity: 1;
            transform: translateY(0);
        }

        .car-hover-content {
            opacity: 0;
            transform: translateY(20px);
            transition: all 0.3s ease-in-out;
        }
    </style>
</head>
<body class="bg-black min-h-screen">
    <div class="fixed inset-0 z-0">
        <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top,rgba(255,107,107,0.1),transparent_50%)]"></div>
        <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_bottom,rgba(78,205,196,0.1),transparent_50%)]"></div>
    </div>

    <div class="relative z-10 flex min-h-screen">
        <aside class="w-64 glass border-r border-white/10">
            <div class="p-6 border-b border-white/10">
                <div class="flex items-center space-x-3">
                    <span class="text-2xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-[#FF6B6B] to-[#4ECDC4]">
                    <a href="../index.php">Luxury</a>
                    </span>
                </div>
            </div>

            <!-- Navigation -->
            <nav class="p-4 space-y-2">
                <a href="#" class="flex items-center space-x-3 p-3 rounded-xl bg-gradient-to-r from-[#FF6B6B] to-[#4ECDC4] text-white">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                    </svg>
                    <span>Tableau de bord</span>
                </a>
                <a href="#" class="flex items-center space-x-3 p-3 rounded-xl text-gray-400 hover:text-white transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                    </svg>
                    <span>Mes réservations</span>
                </a>
                <a href="#" class="flex items-center space-x-3 p-3 rounded-xl text-gray-400 hover:text-white transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                    </svg>
                    <span>Notre flotte</span>
                </a>
                <a href="#" class="flex items-center space-x-3 p-3 rounded-xl text-gray-400 hover:text-white transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <span>Historique</span>
                </a>
            </nav>

            <!-- User Profile -->
            <div class="absolute bottom-0 w-full p-4 border-t border-white/10">
                <div class="flex items-center space-x-3">
                    <img src="https://intranet.youcode.ma/storage/users/profile/1073-1728554626.jpg" alt="User" class="w-8 h-8 rounded-full">
                    <div>
                        <p class="text-sm font-medium text-white">John Doe</p>
                        <p class="text-xs text-gray-400">Client Premium</p>
                    </div>
                </div>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 overflow-auto scrollbar-hidden">
            <!-- Top Bar -->
            <header class="glass-light border-b border-white/10 sticky top-0 z-50">
                <div class="flex items-center justify-between p-4">
                    <h1 class="text-xl font-bold text-white">Tableau de bord</h1>
                    <div class="flex items-center space-x-4">
                        <button class="p-2 rounded-xl text-gray-400 hover:text-white transition-colors">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
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

            <!-- Dashboard Content -->
            <div class="p-6 space-y-6">
                <!-- Stats Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <div class="glass-light rounded-xl p-6 border border-white/10">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-400">Réservations actives</p>
                                <p class="text-2xl font-bold text-white mt-1">2</p>
                            </div>
                            <div class="w-12 h-12 rounded-xl bg-gradient-to-r from-[#FF6B6B] to-[#4ECDC4] flex items-center justify-center">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="glass-light rounded-xl p-6 border border-white/10">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-400">Points fidélité</p>
                                <p class="text-2xl font-bold text-white mt-1">1,250</p>
                            </div>
                            <div class="w-12 h-12 rounded-xl bg-gradient-to-r from-[#4ECDC4] to-[#FF6B6B] flex items-center justify-center">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="glass-light rounded-xl p-6 border border-white/10">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm text-gray-400">Kilomètres parcourus</p>
                                <p class="text-2xl font-bold text-white mt-1">3,427</p>
                            </div>
                            <div class="w-12 h-12 rounded-xl bg-gradient-to-r from-[#FF6B6B] to-[#4ECDC4] flex items-center justify-center">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="glass-light rounded-xl p-6 border border-white/10">
                        <div class="flex items-center justify-between">
                            <div>
                              <p class="text-sm text-gray-400">Véhicules loués</p>
                              <p class="text-2xl font-bold text-white mt-1">12</p>
                          </div>
                          <div class="w-12 h-12 rounded-xl bg-gradient-to-r from-[#4ECDC4] to-[#FF6B6B] flex items-center justify-center">
                              <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21l-7-5-7 5V5a2 2 0 012-2h10a2 2 0 012 2v16z"/>
                              </svg>
                          </div>
                      </div>
                  </div>
              </div>

              <!-- Current Rentals -->
              <div class="glass-light rounded-xl p-6 border border-white/10">
                  <h2 class="text-xl font-bold text-white mb-4">Locations en cours</h2>
                  <div class="overflow-x-auto">
                      <table class="w-full">
                          <thead>
                              <tr class="text-left">
                                  <th class="text-gray-400 font-medium pb-4">Véhicule</th>
                                  <th class="text-gray-400 font-medium pb-4">Date de début</th>
                                  <th class="text-gray-400 font-medium pb-4">Date de fin</th>
                                  <th class="text-gray-400 font-medium pb-4">Statut</th>
                                  <th class="text-gray-400 font-medium pb-4">Actions</th>
                              </tr>
                          </thead>
                          <tbody class="divide-y divide-white/10">
                              <tr class="text-white">
                                  <td class="py-4">
                                      <div class="flex items-center space-x-3">
                                          <img src="/api/placeholder/48/48" alt="Car" class="w-12 h-12 rounded-lg object-cover">
                                          <div>
                                              <p class="font-medium">Mercedes AMG GT</p>
                                              <p class="text-sm text-gray-400">Noir • AB-123-CD</p>
                                          </div>
                                      </div>
                                  </td>
                                  <td class="py-4">15 Dec 2024</td>
                                  <td class="py-4">22 Dec 2024</td>
                                  <td class="py-4">
                                      <span class="px-3 py-1 rounded-full text-sm font-medium bg-emerald-400/10 text-emerald-400">
                                          En cours
                                      </span>
                                  </td>
                                  <td class="py-4">
                                      <button class="px-4 py-2 rounded-lg text-sm font-medium bg-gradient-to-r from-[#FF6B6B] to-[#4ECDC4] text-white hover:opacity-90 transition-opacity">
                                          Détails
                                      </button>
                                  </td>
                              </tr>
                              <tr class="text-white">
                                  <td class="py-4">
                                      <div class="flex items-center space-x-3">
                                          <img src="/api/placeholder/48/48" alt="Car" class="w-12 h-12 rounded-lg object-cover">
                                          <div>
                                              <p class="font-medium">Porsche 911 GT3</p>
                                              <p class="text-sm text-gray-400">Blanc • EF-456-GH</p>
                                          </div>
                                      </div>
                                  </td>
                                  <td class="py-4">18 Dec 2024</td>
                                  <td class="py-4">25 Dec 2024</td>
                                  <td class="py-4">
                                      <span class="px-3 py-1 rounded-full text-sm font-medium bg-yellow-400/10 text-yellow-400">
                                          À venir
                                      </span>
                                  </td>
                                  <td class="py-4">
                                      <button class="px-4 py-2 rounded-lg text-sm font-medium bg-gradient-to-r from-[#FF6B6B] to-[#4ECDC4] text-white hover:opacity-90 transition-opacity">
                                          Détails
                                      </button>
                                  </td>
                              </tr>
                          </tbody>
                      </table>
                  </div>
              </div>

              <!-- Recommended Cars -->
              <div class="space-y-4">
                  <div class="flex items-center justify-between">
                      <h2 class="text-xl font-bold text-white">Véhicules recommandés</h2>
                      <a href="#" class="text-sm text-gray-400 hover:text-white transition-colors">Voir tout</a>
                  </div>
                  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                      <!-- Car Card 1 -->
                      <div class="glass-light rounded-xl overflow-hidden group relative">
                          <img src="/api/placeholder/400/240" alt="Car" class="w-full h-60 object-cover">
                          <div class="p-4">
                              <div class="flex justify-between items-start">
                                  <div>
                                      <h3 class="text-lg font-medium text-white">Lamborghini Huracán</h3>
                                      <p class="text-gray-400">À partir de 1500€/jour</p>
                                  </div>
                                  <div class="flex items-center space-x-1 text-yellow-400">
                                      <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                          <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                      </svg>
                                      <span class="text-white">4.9</span>
                                  </div>
                              </div>
                              <div class="mt-4 grid grid-cols-2 gap-4 text-sm text-gray-400">
                                  <div class="flex items-center space-x-2">
                                      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                      </svg>
                                      <span>3.2s 0-100</span>
                                  </div>
                                  <div class="flex items-center space-x-2">
                                      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                                      </svg>
                                      <span>640 CV</span>
                                  </div>
                              </div>
                              <button class="w-full mt-4 py-3 rounded-lg bg-gradient-to-r from-[#FF6B6B] to-[#4ECDC4] text-white font-medium hover:opacity-90 transition-all duration-300">
                                  Réserver maintenant
                              </button>
                          </div>
                      </div>

                      <!-- Car Card 2 -->
                      <div class="glass-light rounded-xl overflow-hidden group relative">
                          <img src="/api/placeholder/400/240" alt="Car" class="w-full h-60 object-cover">
                          <div class="p-4">
                              <div class="flex justify-between items-start">
                                  <div>
                                      <h3 class="text-lg font-medium text-white">Ferrari F8 Tributo</h3>
                                      <p class="text-gray-400">À partir de 1800€/jour</p>
                                  </div>
                                  <div class="flex items-center space-x-1 text-yellow-400">
                                      <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                          <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                      </svg>
                                      <span class="text-white">4.8</span>
                                  </div>
                              </div>
                              <div class="mt-4 grid grid-cols-2 gap-4 text-sm text-gray-400">
                                  <div class="flex items-center space-x-2">
                                      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                      </svg>
                                      <span>2.9s 0-100</span>
                                  </div>
                                  <div class="flex items-center space-x-2">
                                      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                                      </svg>
                                      <span>720 CV</span>
                                  </div>
                              </div>
                              <button class="w-full mt-4 py-3 rounded-lg bg-gradient-to-r from-[#FF6B6B] to-[#4ECDC4] text-white font-medium hover:opacity-90 transition-all duration-300">
                                  Réserver maintenant
                              </button>
                          </div>
                      </div>

                      <!-- Car Card 3 -->
                      <div class="glass-light rounded-xl overflow-hidden group relative">
                          <div class="absolute top-4 right-4 px-3 py-1 rounded-full text-sm font-medium bg-gradient-to-r from-[#FF6B6B] to-[#4ECDC4] text-white">
                              Nouveau
                          </div>
                          <img src="/api/placeholder/400/240" alt="Car" class="w-full h-60 object-cover">
                          <div class="p-4">
                              <div class="flex justify-between items-start">
                                  <div>
                                      <h3 class="text-lg font-medium text-white">McLaren 720S</h3>
                                      <p class="text-gray-400">À partir de 1600€/jour</p>
                                  </div>
                                  <div class="flex items-center space-x-1 text-yellow-400">
                                      <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                          <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                      </svg>
                                      <span class="text-white">5.0</span>
                                  </div>
                              </div>
                              <div class="mt-4 grid grid-cols-2 gap-4 text-sm text-gray-400">
                                  <div class="flex items-center space-x-2">
                                      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                      </svg>
                                      <span>2.8s 0-100</span>
                                  </div>
                                  <div class="flex items-center space-x-2">
                                      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                                      </svg>
                                      <span>710 CV</span>
                                  </div>
                              </div>
                              <button class="w-full mt-4 py-3 rounded-lg bg-gradient-to-r from-[#FF6B6B] to-[#4ECDC4] text-white font-medium hover:opacity-90 transition-all duration-300">
                                  Réserver maintenant
                              </button>
                          </div>
                      </div>
                  </div>
              </div>

              <!-- Recent Activity -->
              <div class="glass-light rounded-xl p-6 border border-white/10">
                  <h2 class="text-xl font-bold text-white mb-4">Activité récente</h2>
                  <div class="space-y-4">
                      <div class="flex items-center space-x-4">
                          <div class="w-10 h-10 rounded-full bg-emerald-400/10 flex items-center justify-center text-emerald-400">
                              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                              </svg>
                          </div>
                          <div class="flex-1">
                              <p class="text-white">Réservation confirmée</p>
                              <p class="text-sm text-gray-400">Mercedes AMG GT • 15-22 Dec 2024</p>
                          </div>
                          <span class="text-sm text-gray-400">Il y a 2h</span>
                      </div>
                      <div class="flex items-center space-x-4">
                          <div class="w-10 h-10 rounded-full bg-blue-400/10 flex items-center justify-center text-blue-400">
                              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                              </svg>
                          </div>
                          <div class="flex-1">
                              <p class="text-white">Points fidélité crédités</p>
                              <p class="text-sm text-gray-400">+250 points • Location Porsche 911</p>
                          </div>
                          <span class="text-sm text-gray-400">Hier</span>
                      </div>
                      <div class="flex items-center space-x-4">
                          <div class="w-10 h-10 rounded-full bg-yellow-400/10 flex items-center justify-center text-yellow-400">
                              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                              </svg>
                          </div>
                          <div class="flex-1">
                              <p class="text-white">Statut Premium débloqué</p>
                              <p class="text-sm text-gray-400">Félicitations ! Profitez de vos avantages</p>
                          </div>
                          <span class="text-sm text-gray-400">3 jours</span>
                      </div>
                  </div>
              </div>

              <!-- Upcoming Maintenance -->
              <div class="glass-light rounded-xl p-6 border border-white/10">
                  <h2 class="text-xl font-bold text-white mb-4">Entretien prévu</h2>
                  <div class="flex items-center justify-between p-4 bg-yellow-400/10 rounded-xl">
                      <div class="flex items-center space-x-4">
                          <div class="w-12 h-12 rounded-xl bg-yellow-400/20 flex items-center justify-center">
                              <svg class="w-6 h-6 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"/>
                              </svg>
                          </div>
                          <div>
                              <h3 class="text-white font-medium">Révision Mercedes AMG GT</h3>
                              <p class="text-sm text-gray-400">Prévue le 23 Décembre 2024</p>
                          </div>
                      </div>
                      <button class="px-4 py-2 rounded-lg text-sm font-medium bg-gradient-to-r from-[#FF6B6B] to-[#4ECDC4] text-white hover:opacity-90 transition-opacity">
                          Reprogrammer
                      </button>
                  </div>
              </div>
          </div>

          <!-- Quick Actions Floating Button -->
          <div class="fixed bottom-8 right-8">
              <button class="w-14 h-14 rounded-full bg-gradient-to-r from-[#FF6B6B] to-[#4ECDC4] text-white flex items-center justify-center hover:opacity-90 transition-opacity shadow-lg">
                  <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                  </svg>
              </button>
          </div>
      </main>
    </div>

    <script>
        // Add smooth scroll behavior
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });

        // Initialize GSAP animations
        gsap.from('.glass-light', {
            duration: 1,
            y: 20,
            opacity: 0,
            stagger: 0.2,
            ease: 'power3.out'
        });

        // Add hover effect to car cards
        document.querySelectorAll('.car-card').forEach(card => {
            card.addEventListener('mouseenter', () => {
                gsap.to(card.querySelector('.car-hover-content'), {
                    duration: 0.3,
                    opacity: 1,
                    y: 0
                });
            });

            card.addEventListener('mouseleave', () => {
                gsap.to(card.querySelector('.car-hover-content'), {
                    duration: 0.3,
                    opacity: 0,
                    y: 20
                });
            });
        });
    </script>
</body>
</html>
