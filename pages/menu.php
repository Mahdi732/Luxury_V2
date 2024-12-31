<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drive & Loc - Notre Collection</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <style>
        @keyframes shimmer {
            0% { background-position: -1000px 0; }
            100% { background-position: 1000px 0; }
        }
        
        .animate-shimmer {
            animation: shimmer 2s infinite linear;
            background: linear-gradient(to right, transparent 0%, rgba(255,255,255,0.1) 50%, transparent 100%);
            background-size: 1000px 100%;
        }
        
        .card-hover-effect {
            transition: transform 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .card-hover-effect:hover {
            transform: translateY(-10px) scale(1.02);
        }

        .glass-effect {
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.05);
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

        .parallax-bg {
            transform-style: preserve-3d;
            transform: perspective(1000px);
        }
    </style>
</head>
<body class="bg-black min-h-screen">
    <!-- Navigation -->
    <nav class="fixed w-full z-50 glass-effect">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex justify-between items-center py-4">
                <a href="#" class="gradient-border">
                    <div class="px-4 py-2 bg-black rounded-xl">
                        <span class="text-2xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-[#FF6B6B] to-[#4ECDC4]">
                            D&L
                        </span>
                    </div>
                </a>
                
                <div class="hidden md:flex space-x-8 items-center">
                    <a href="index.php" class="text-gray-300 hover:text-white transition-colors duration-300">Accueil</a>
                    <a href="#" class="text-white font-medium">Collection</a>
                    <a href="#" class="text-gray-300 hover:text-white transition-colors duration-300">Services</a>
                    <div class="gradient-border">
                        <button class="px-6 py-2 bg-black rounded-xl text-white hover:bg-gray-900 transition-colors duration-300">
                            Réserver
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <div class="relative pt-32 pb-16">
        <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top,rgba(255,107,107,0.15),transparent_50%)]"></div>
        <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_bottom,rgba(78,205,196,0.15),transparent_50%)]"></div>
        
        <div class="relative max-w-7xl mx-auto px-6">
            <div class="text-center space-y-6 max-w-3xl mx-auto">
                <h1 class="text-5xl md:text-6xl font-bold text-white">
                    Notre Collection
                    <span class="block text-transparent bg-clip-text bg-gradient-to-r from-[#FF6B6B] to-[#4ECDC4]">
                        d'Exception
                    </span>
                </h1>
                <p class="text-xl text-gray-300">
                    Découvrez notre sélection exclusive de véhicules de prestige pour une expérience de conduite inoubliable.
                </p>
            </div>
        </div>
    </div>

    <div class="relative mb-16">
        <div class="max-w-7xl mx-auto px-6">
            <div class="gradient-border">
                <div class="bg-black/80 rounded-xl p-6">
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                        <div class="space-y-2">
                            <label class="text-gray-400 text-sm">Catégorie</label>
                            <select class="w-full bg-black/50 border border-gray-800 rounded-xl p-3 text-white focus:border-[#FF6B6B] focus:ring-[#FF6B6B] transition-all duration-300">
                                <option value="">Toutes les catégories</option>
                                <option value="sports">Voitures de sport</option>
                                <option value="luxury">Berlines de luxe</option>
                                <option value="suv">SUV Premium</option>
                                <option value="electric">Véhicules électriques</option>
                            </select>
                        </div>
                        <div class="space-y-2">
                            <label class="text-gray-400 text-sm">Marque</label>
                            <select class="w-full bg-black/50 border border-gray-800 rounded-xl p-3 text-white focus:border-[#4ECDC4] focus:ring-[#4ECDC4] transition-all duration-300">
                                <option value="">Toutes les marques</option>
                                <option value="ferrari">Ferrari</option>
                                <option value="rolls">Rolls-Royce</option>
                                <option value="tesla">Tesla</option>
                                <option value="porsche">Porsche</option>
                            </select>
                        </div>
                        <div class="space-y-2">
                            <label class="text-gray-400 text-sm">Prix maximum</label>
                            <select class="w-full bg-black/50 border border-gray-800 rounded-xl p-3 text-white focus:border-[#FF6B6B] focus:ring-[#FF6B6B] transition-all duration-300">
                                <option value="">Tous les prix</option>
                                <option value="1000">Jusqu'à 1000€/jour</option>
                                <option value="2000">Jusqu'à 2000€/jour</option>
                                <option value="3000">Jusqu'à 3000€/jour</option>
                                <option value="max">3000€+ /jour</option>
                            </select>
                        </div>
                        <div class="space-y-2">
                            <label class="text-gray-400 text-sm">Trier par</label>
                            <select class="w-full bg-black/50 border border-gray-800 rounded-xl p-3 text-white focus:border-[#4ECDC4] focus:ring-[#4ECDC4] transition-all duration-300">
                                <option value="popular">Popularité</option>
                                <option value="price-asc">Prix croissant</option>
                                <option value="price-desc">Prix décroissant</option>
                                <option value="new">Nouveautés</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="relative">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="card-hover-effect">
                    <div class="gradient-border">
                        <div class="bg-black rounded-xl overflow-hidden">
                            <div class="relative">
                                <img 
                                    src="/api/placeholder/600/400" 
                                    alt="Ferrari SF90 Stradale" 
                                    class="w-full h-64 object-cover"
                                >
                                <div class="absolute top-4 right-4">
                                    <span class="px-3 py-1 bg-[#FF6B6B]/20 text-[#FF6B6B] rounded-full text-sm backdrop-blur-xl">
                                        Supercar
                                    </span>
                                </div>
                            </div>
                            <div class="p-6 space-y-4">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <h3 class="text-xl font-bold text-white">Ferrari SF90 Stradale</h3>
                                        <p class="text-gray-400">1000 CV - Hybride</p>
                                    </div>
                                    <div class="flex items-center space-x-1">
                                        <svg class="w-5 h-5 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                        </svg>
                                        <span class="text-white font-medium">4.9</span>
                                    </div>
                                </div>
                                <div class="flex justify-between items-center">
                                    <div>
                                        <span class="text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-[#FF6B6B] to-[#4ECDC4]">2500€</span>
                                        <span class="text-gray-400">/jour</span>
                                    </div>
                                    <button class="px-6 py-2 bg-gradient-to-r from-[#FF6B6B] to-[#4ECDC4] rounded-full text-white font-medium hover:opacity-90 transition-opacity duration-300">
                                        Réserver
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-hover-effect">
                    <div class="gradient-border">
                        <div class="bg-black rounded-xl overflow-hidden">
                            <div class="relative">
                                <img 
                                    src="/api/placeholder/600/400" 
                                    alt="Lamborghini Huracán" 
                                    class="w-full h-64 object-cover"
                                >
                                <div class="absolute top-4 right-4">
                                    <span class="px-3 py-1 bg-[#4ECDC4]/20 text-[#4ECDC4] rounded-full text-sm backdrop-blur-xl">
                                        Sport
                                    </span>
                                </div>
                            </div>
                            <div class="p-6 space-y-4">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <h3 class="text-xl font-bold text-white">Lamborghini Huracán</h3>
                                        <p class="text-gray-400">640 CV - V10</p>
                                    </div>
                                    <div class="flex items-center space-x-1">
                                        <svg class="w-5 h-5 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                        </svg>
                                        <span class="text-white font-medium">4.8</span>
                                    </div>
                                </div>
                                <div class="flex justify-between items-center">
                                    <div>
                                        <span class="text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-[#FF6B6B] to-[#4ECDC4]">2200€</span>
                                        <span class="text-gray-400">/jour</span>
                                    </div>
                                    <button class="px-6 py-2 bg-gradient-to-r from-[#FF6B6B] to-[#4ECDC4] rounded-full text-white font-medium hover:opacity-90 transition-opacity duration-300">Réserver
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-hover-effect">
                    <div class="gradient-border">
                        <div class="bg-black rounded-xl overflow-hidden">
                            <div class="relative">
                                <img 
                                    src="/api/placeholder/600/400" 
                                    alt="Porsche 911 GT3" 
                                    class="w-full h-64 object-cover"
                                >
                                <div class="absolute top-4 right-4">
                                    <span class="px-3 py-1 bg-[#FF6B6B]/20 text-[#FF6B6B] rounded-full text-sm backdrop-blur-xl">
                                        Sport
                                    </span>
                                </div>
                            </div>
                            <div class="p-6 space-y-4">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <h3 class="text-xl font-bold text-white">Porsche 911 GT3</h3>
                                        <p class="text-gray-400">510 CV - Flat-6</p>
                                    </div>
                                    <div class="flex items-center space-x-1">
                                        <svg class="w-5 h-5 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                                        <span class="text-white font-medium">4.9</span>
                                    </div>
                                </div>
                                <div class="flex justify-between items-center">
                                    <div>
                                        <span class="text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-[#FF6B6B] to-[#4ECDC4]">1800€</span>
                                        <span class="text-gray-400">/jour</span>
                                    </div>
                                    <button class="px-6 py-2 bg-gradient-to-r from-[#FF6B6B] to-[#4ECDC4] rounded-full text-white font-medium hover:opacity-90 transition-opacity duration-300">
                                        Réserver
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-hover-effect">
                    <div class="gradient-border">
                        <div class="bg-black rounded-xl overflow-hidden">
                            <div class="relative">
                                <img 
                                    src="/api/placeholder/600/400" 
                                    alt="Tesla Model S Plaid" 
                                    class="w-full h-64 object-cover"
                                >
                                <div class="absolute top-4 right-4">
                                    <span class="px-3 py-1 bg-[#4ECDC4]/20 text-[#4ECDC4] rounded-full text-sm backdrop-blur-xl">
                                        Électrique
                                    </span>
                                </div>
                            </div>
                            <div class="p-6 space-y-4">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <h3 class="text-xl font-bold text-white">Tesla Model S Plaid</h3>
                                        <p class="text-gray-400">1020 CV - 0-100 en 2.1s</p>
                                    </div>
                                    <div class="flex items-center space-x-1">
                                        <svg class="w-5 h-5 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                        </svg>
                                        <span class="text-white font-medium">4.7</span>
                                    </div>
                                </div>
                                <div class="flex justify-between items-center">
                                    <div>
                                        <span class="text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-[#FF6B6B] to-[#4ECDC4]">1200€</span>
                                        <span class="text-gray-400">/jour</span>
                                    </div>
                                    <button class="px-6 py-2 bg-gradient-to-r from-[#FF6B6B] to-[#4ECDC4] rounded-full text-white font-medium hover:opacity-90 transition-opacity duration-300">
                                        Réserver
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="mt-16 flex justify-center">
                <div class="inline-flex items-center gap-2">
                    <button class="w-10 h-10 flex items-center justify-center rounded-full border border-gray-800 text-gray-400 hover:border-[#FF6B6B] hover:text-white transition-colors duration-300">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                        </svg>
                    </button>
                    
                    <div class="flex gap-2">
                        <button class="w-10 h-10 flex items-center justify-center rounded-full bg-gradient-to-r from-[#FF6B6B] to-[#4ECDC4] text-white">1</button>
                        <button class="w-10 h-10 flex items-center justify-center rounded-full border border-gray-800 text-gray-400 hover:border-[#FF6B6B] hover:text-white transition-colors duration-300">2</button>
                        <button class="w-10 h-10 flex items-center justify-center rounded-full border border-gray-800 text-gray-400 hover:border-[#FF6B6B] hover:text-white transition-colors duration-300">3</button>
                        <span class="w-10 h-10 flex items-center justify-center text-gray-400">...</span>
                        <button class="w-10 h-10 flex items-center justify-center rounded-full border border-gray-800 text-gray-400 hover:border-[#FF6B6B] hover:text-white transition-colors duration-300">12</button>
                    </div>

                    <button class="w-10 h-10 flex items-center justify-center rounded-full border border-gray-800 text-gray-400 hover:border-[#FF6B6B] hover:text-white transition-colors duration-300">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-8 mb-16">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex justify-between items-center">
                <p class="text-gray-400">Affichage de <span class="text-white">12</span> sur <span class="text-white">144</span> véhicules</p>
                <div class="flex items-center gap-4">
                    <button class="text-gray-400 hover:text-white transition-colors duration-300">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                    </button>
                    <button class="text-white">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="relative py-16 bg-black/50">
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_30%_50%,rgba(255,107,107,0.1),transparent_50%)]"></div>
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                <div class="text-center">
                    <div class="text-4xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-[#FF6B6B] to-[#4ECDC4]">50+</div>
                    <div class="text-gray-400 mt-2">Véhicules de luxe</div>
                </div>
                <div class="text-center">
                    <div class="text-4xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-[#FF6B6B] to-[#4ECDC4]">98%</div>
                    <div class="text-gray-400 mt-2">Clients satisfaits</div>
                </div>
                <div class="text-center">
                    <div class="text-4xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-[#FF6B6B] to-[#4ECDC4]">24/7</div>
                    <div class="text-gray-400 mt-2">Support client</div>
                </div>
                <div class="text-center">
                    <div class="text-4xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-[#FF6B6B] to-[#4ECDC4]">5.0</div>
                    <div class="text-gray-400 mt-2">Note moyenne</div>
                </div>
            </div>
        </div>
    </div>

    <footer class="bg-black/80 py-16">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-12">
                <div class="space-y-4">
                    <div class="gradient-border inline-block">
                        <div class="px-4 py-2 bg-black rounded-xl">
                            <span class="text-2xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-[#FF6B6B] to-[#4ECDC4]">
                                D&L
                            </span>
                        </div>
                    </div>
                    <p class="text-gray-400">L'excellence automobile à votre service.</p>
                </div>
                
                <div>
                    <h4 class="text-white font-bold mb-4">Navigation</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors duration-300">Accueil</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors duration-300">Collection</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors duration-300">Services</a></li>
                    </ul>
                </div>
                
                <div>
                    <h4 class="text-white font-bold mb-4">Contact</h4>
                    <ul class="space-y-2">
                        <li class="text-gray-400">+33 1 23 45 67 89</li>
                        <li class="text-gray-400">contact@drive-loc.fr</li>
                        <li class="text-gray-400">75008 Paris, France</li>
                    </ul>
                </div>
                
                <div>
                    <h4 class="text-white font-bold mb-4">Suivez-nous</h4>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-white transition-colors duration-300">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.016-1.195 2.738-2.258 3.307-.832.215-1.737.332-2.679.332-.949 0-1.845-.116-2.677-.332-1.064-.569-1.837-1.731-2.258-3.307-.996-.119-1.945-.383-2.828-.775.774 1.241 1.872 2.259 3.193 2.956-1.321.697-2.419 1.715-3.193 2.956.883-.392 1.832-.656 2.828-.775.421 1.576 1.194 2.738 2.258 3.307.832.216 1.728.332 2.677.332.942 0 1.847-.116 2.679-.332 1.064-.569 1.837-1.731 2.258-3.307.996-.119 1.945-.383 2.828-.775-1.321-.697-2.419-1.715-3.193-2.956 1.321-.697 2.419-1.715 3.193-2.956z"/>
                            </svg>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition-colors duration-300">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                            </svg>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition-colors duration-300">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M22.675 0h-21.35c-.732 0-1.325.593-1.325 1.325v21.351c0 .731.593 1.324 1.325 1.324h11.495v-9.294h-3.128v-3.622h3.128v-2.671c0-3.1 1.893-4.788 4.659-4.788 1.325 0 2.463.099 2.795.143v3.24l-1.918.001c-1.504 0-1.795.715-1.795 1.763v2.313h3.587l-.467 3.622h-3.12v9.293h6.116c.73 0 1.323-.593 1.323-1.325v-21.35c0-.732-.593-1.325-1.325-1.325z"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="mt-12 pt-8 border-t border-gray-800">
                <p class="text-center text-gray-400">&copy; 2024 Drive & Loc. Tous droits réservés.</p>
            </div>
        </div>
    </footer>

    <script>
        window.addEventListener('DOMContentLoaded', () => {
            gsap.from('.card-hover-effect', {
                duration: 0.8,
                y: 50,
                opacity: 0,
                stagger: 0.2,
                ease: 'power3.out'
            });

            document.addEventListener('mousemove', (e) => {
                const moveX = (e.pageX - window.innerWidth/2) * 0.01;
                const moveY = (e.pageY - window.innerHeight/2) * 0.01;
                
                gsap.to('.parallax-bg', {
                    x: moveX,
                    y: moveY,
                    duration: 1,
                    ease: 'power2.out'
                });
            });

            const stats = document.querySelectorAll('.text-4xl');
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        gsap.to(entry.target, {
                            duration: 2,
                            opacity: 1,
                            y: 0,
                            ease: 'power3.out'
                        });
                    }
                });
            });

            stats.forEach(stat => {
                gsap.set(stat, { opacity: 0, y: 20 });
                observer.observe(stat);
            });
        });

        const filters = document.querySelectorAll('select');
        filters.forEach(filter => {
            filter.addEventListener('change', () => {
                gsap.to('.card-hover-effect', {
                    duration: 0.3,
                    opacity: 0,
                    y: 20,
                    stagger: 0.1,
                    ease: 'power2.in',
                    onComplete: () => {
                        gsap.to('.card-hover-effect', {
                            duration: 0.5,
                            opacity: 1,
                            y: 0,
                            stagger: 0.1,
                            ease: 'power2.out'
                        });
                    }
                });
            });
        });
    </script>
</body>
</html>