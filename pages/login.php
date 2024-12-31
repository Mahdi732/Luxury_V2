<?php
require_once "../classes/user.php";
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DRIVE & LOC - Login Experience</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
    <style>
        @keyframes gradientFlow {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        
        .gradient-text {
            background: linear-gradient(to right, #ffffff, #666666, #ffffff);
            background-size: 200% auto;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            animation: gradientFlow 8s linear infinite;
        }

        .input-glow:focus {
            box-shadow: 0 0 20px rgba(255,255,255,0.1);
            transition: all 0.3s ease;
        }

        .hover-glow:hover {
            box-shadow: 0 0 30px rgba(255,255,255,0.2);
            transition: all 0.3s ease;
        }

        .hidden {
            display: none;
        }
    </style>
</head>
<body class="bg-[#0A0A0A] text-white min-h-screen flex items-center justify-center overflow-hidden">
    <!-- Background Canvas for 3D Effects -->
    <div class="fixed inset-0" id="canvas-container"></div>
    
    <!-- Overlay Gradient -->
    <div class="fixed inset-0 bg-gradient-to-br from-black/80 via-transparent to-black/80"></div>

    <!-- Main Content -->
    <div class="relative z-10 w-full max-w-screen-xl mx-auto px-6 flex min-h-screen items-center">
        <div class="w-full grid grid-cols-2 gap-24">
            <!-- Left Side - Branding -->
            <div class="space-y-12">
                <div class="space-y-6">
                    <h1 class="text-xs tracking-[0.3em] mt-[1rem] text-white/50">DRIVE & LOC</h1>
                    <div class="h-[1px] w-12 bg-white/20"></div>
                </div>
                
                <!-- Login Title -->
                <div id="loginTitle" class="space-y-8">
                    <h2 class="text-8xl font-extralight leading-none gradient-text">
                        VOTRE<br/>
                        EXPÉRIENCE<br/>
                        COMMENCE
                    </h2>
                    <p class="text-lg text-white/60 max-w-md">
                        Accédez à notre collection exclusive de véhicules et services premium.
                    </p>
                </div>

                <!-- Signup Title -->
                <div id="signupTitle" class="space-y-8 hidden">
                    <h2 class="text-8xl font-extralight leading-none gradient-text">
                        CRÉEZ<br/>
                        VOTRE<br/>
                        COMPTE
                    </h2>
                    <p class="text-lg text-white/60 max-w-md">
                        Rejoignez notre communauté exclusive et accédez à des services premium.
                    </p>
                </div>

                <div class="flex items-center space-x-8">
                    <div class="h-[1px] w-12 bg-white/20"></div>
                    <span id="stepIndicator" class="text-xs tracking-[0.3em] text-white/50">01 / LOGIN</span>
                </div>
            </div>

            <!-- Right Side - Forms Container -->
            <div class="relative">
                <div class="absolute -inset-0.5 bg-gradient-to-r from-white/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 blur"></div>
                <div class="relative bg-black/40 backdrop-blur-2xl p-12 border border-white/10">
                    <!-- Login Form -->
                    <form method="POST" action="../classes/user.php" id="loginForm" class="space-y-12">
                        <div class="space-y-6">
                            <label class="block text-xs tracking-[0.3em] text-white/50">EMAIL</label>
                            <input 
                                name="email_log"
                                type="email" 
                                class="w-full bg-transparent border-b border-white/20 py-4 text-lg focus:outline-none focus:border-white transition-all duration-500 input-glow"
                                placeholder="votre@email.com"
                            >
                        </div>

                        <div class="space-y-6">
                            <label class="block text-xs tracking-[0.3em] text-white/50">MOT DE PASSE</label>
                            <input 
                                name="password_log"
                                type="password" 
                                class="w-full bg-transparent border-b border-white/20 py-4 text-lg focus:outline-none focus:border-white transition-all duration-500 input-glow"
                                placeholder="••••••••"
                            >
                        </div>

                        <div class="flex justify-between items-center">
                            <label class="flex items-center space-x-3 group cursor-pointer">
                                <div class="w-5 h-5 border border-white/20 flex items-center justify-center group-hover:border-white/40 transition-colors">
                                    <div class="w-3 h-3 bg-white/0 group-hover:bg-white/10 transition-colors"></div>
                                </div>
                                <span class="text-sm text-white/60">Rester connecté</span>
                            </label>
                            <a href="#" class="text-sm text-white/60 hover:text-white transition-colors">Mot de passe oublié?</a>
                        </div>

                        <button class="w-full py-4 border border-white/20 text-sm tracking-[0.3em] hover:bg-white hover:text-black transition-all duration-500 hover-glow group">
                            <span class="group-hover:tracking-[0.4em] transition-all duration-500">CONNEXION</span>
                        </button>

                        <div class="space-y-6">
                            <div class="flex items-center space-x-4">
                                <div class="h-[1px] flex-grow bg-white/20"></div>
                                <span class="text-xs tracking-[0.3em] text-white/50">OU</span>
                                <div class="h-[1px] flex-grow bg-white/20"></div>
                            </div>
                            
                            <div class="grid grid-cols-2 gap-4">
                                <button class="py-4 border border-white/20 text-sm hover:bg-white/5 transition-all duration-500 hover-glow">
                                    GOOGLE
                                </button>
                                <button class="py-4 border border-white/20 text-sm hover:bg-white/5 transition-all duration-500 hover-glow">
                                    APPLE
                                </button>
                            </div>
                        </div>

                        <div class="mt-12 text-center">
                            <span class="text-white/60">Pas encore de compte? </span>
                            <a href="#" id="showSignup" class="text-white hover:text-white/60 transition-colors">Créer un compte</a>
                        </div>
                    </form>

                    <form method="POST" action="../classes/user.php" id="signupForm" class="space-y-8 hidden">
                        <div class="grid grid-cols-2 gap-6">
                            <div class="space-y-4">
                                <label class="block text-xs tracking-[0.3em] text-white/50">PRÉNOM</label>
                                <input 
                                    name="first_name"
                                    type="text" 
                                    class="w-full bg-transparent border-b border-white/20 py-4 text-lg focus:outline-none focus:border-white transition-all duration-500 input-glow"
                                >
                            </div>
                            <div class="space-y-4">
                                <label class="block text-xs tracking-[0.3em] text-white/50">NOM</label>
                                <input 
                                    name="last_name"
                                    type="text" 
                                    class="w-full bg-transparent border-b border-white/20 py-4 text-lg focus:outline-none focus:border-white transition-all duration-500 input-glow"
                                >
                            </div>
                        </div>

                        <div class="space-y-4">
                            <label class="block text-xs tracking-[0.3em] text-white/50">EMAIL</label>
                            <input 
                                name="email_sig"
                                type="email" 
                                class="w-full bg-transparent border-b border-white/20 py-4 text-lg focus:outline-none focus:border-white transition-all duration-500 input-glow"
                            >
                        </div>

                        <div class="space-y-6">
                            <div class="space-y-4">
                                <label class="block text-xs tracking-[0.3em] text-white/50">MOT DE PASSE</label>
                                <input 
                                    type="password" 
                                    class="w-full bg-transparent border-b border-white/20 py-4 text-lg focus:outline-none focus:border-white transition-all duration-500 input-glow"
                                >
                            </div>
                            <div class="space-y-4">
                                <label class="block text-xs tracking-[0.3em] text-white/50">CONFIRMER LE MOT DE PASSE</label>
                                <input 
                                    name="password_sig"
                                    type="password" 
                                    class="w-full bg-transparent border-b border-white/20 py-4 text-lg focus:outline-none focus:border-white transition-all duration-500 input-glow"
                                >
                            </div>
                        </div>

                        <div class="flex items-start space-x-3 group cursor-pointer">
                            <div class="w-5 h-5 border border-white/20 flex items-center justify-center group-hover:border-white/40 transition-colors mt-1">
                                <input type="checkbox" class="hidden">
                                <div class="w-3 h-3 bg-white/0 group-hover:bg-white/10 transition-colors"></div>
                            </div>
                            <span class="text-sm text-white/60">J'accepte les conditions générales d'utilisation et la politique de confidentialité</span>
                        </div>

                        <button type="submit" class="w-full py-4 border border-white/20 text-sm tracking-[0.3em] hover:bg-white hover:text-black transition-all duration-500 hover-glow group">
                            <span class="group-hover:tracking-[0.4em] transition-all duration-500">CRÉER MON COMPTE</span>
                        </button>

                        <div class="text-center">
                            <span class="text-white/60">Déjà membre? </span>
                            <a href="#" id="showLogin" class="text-white hover:text-white/60 transition-colors">Se connecter</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Initialize Three.js scene
        const scene = new THREE.Scene();
        const camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
        const renderer = new THREE.WebGLRenderer({ antialias: true, alpha: true });
        renderer.setSize(window.innerWidth, window.innerHeight);
        document.getElementById('canvas-container').appendChild(renderer.domElement);

        // Create particles
        const particlesGeometry = new THREE.BufferGeometry();
        const particlesCount = 5000;
        const posArray = new Float32Array(particlesCount * 3);

        for(let i = 0; i < particlesCount * 3; i++) {
            posArray[i] = (Math.random() - 0.5) * 5;
        }

        particlesGeometry.setAttribute('position', new THREE.BufferAttribute(posArray, 3));

        const particlesMaterial = new THREE.PointsMaterial({
            size: 0.005,
            color: 0xffffff,
            transparent: true,
            opacity: 0.4
        });

        const particlesMesh = new THREE.Points(particlesGeometry, particlesMaterial);
        scene.add(particlesMesh);

        camera.position.z = 3;

        // Mouse movement effect
        let mouseX = 0;
        let mouseY = 0;

        document.addEventListener('mousemove', (event) => {
            mouseX = event.clientX / window.innerWidth - 0.5;
            mouseY = event.clientY / window.innerHeight - 0.5;
        });

        // Animation loop
        function animate() {
            requestAnimationFrame(animate);
            
            particlesMesh.rotation.y += 0.001;
            particlesMesh.rotation.x += 0.001;

            particlesMesh.rotation.y += mouseX * 0.1;
            particlesMesh.rotation.x += mouseY * 0.1;

            renderer.render(scene, camera);
        }

        animate();

        // Form switching logic
        document.getElementById('showSignup').addEventListener('click', (e) => {
            e.preventDefault();
            document.getElementById('loginForm').classList.add('hidden');
            document.getElementById('signupForm').classList.remove('hidden');
            document.getElementById('loginTitle').classList.add('hidden');
            document.getElementById('signupTitle').classList.remove('hidden');
            document.getElementById('stepIndicator').textContent = '02 / INSCRIPTION';
        });

        document.getElementById('showLogin').addEventListener('click', (e) => {
            e.preventDefault();
            document.getElementById('signupForm').classList.add('hidden');
            document.getElementById('loginForm').classList.remove('hidden');
            document.getElementById('signupTitle').classList.add('hidden');
            document.getElementById('loginTitle').classList.remove('hidden');
            document.getElementById('stepIndicator').textContent = '01 / LOGIN';
        });
    </script>
</body>
</html>