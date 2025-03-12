<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nos Chambres - Hôtel Bianic</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">

</head>
<body class="bg-gray-100">


    <!-- Header -->
    <header class="bg-white shadow-md py-4">
        <div class="container mx-auto flex justify-between items-center px-6">
            <!-- Logo -->
            <a href="{{ route('home') }}" class="text-2xl font-bold text-gray-900">
                <img src="{{ asset('images/logo.jpeg') }}" alt="Hôtel Bianic" class="h-12">
            </a>

            <!-- Menu de navigation (Desktop) -->
            <nav class="hidden md:flex space-x-6">
            <a href="{{ route('home') }}" class="py-2 text-black hover:text-blue-600">Accueil</a>

            <a href="{{ route('chambre') }}" class="py-2 text-black hover:text-blue-600">Chambres</a>
                <a href="{{ route('galleryImages') }}" class="py-2 text-black hover:text-blue-600">Galleries</a>
                <a href="{{ route('service') }}" class="py-2 text-black hover:text-blue-600">Services</a>
                <a href="{{ route('contact') }}" class="py-2 text-black hover:text-blue-600">Contact</a>
                <a href="{{ route('reservation') }}" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Réserver</a>
            </nav>

            <!-- Menu burger pour mobile -->
            <div id="burger-icon" class="md:hidden text-2xl cursor-pointer transition-transform duration-300" onclick="toggleMenu()">☰</div>
        </div>
    </header>

    <!-- Overlay (Fond semi-transparent pour le menu mobile) -->
    <div id="overlay" class="fixed inset-0 bg-black bg-opacity-50 hidden transition-opacity duration-300 z-40" onclick="toggleMenu()"></div>

    <!-- Menu mobile (Latéral droit avec animation) -->
    <div id="mobile-menu"
        class="fixed top-0 right-0 h-full w-80 bg-white shadow-lg rounded-l-lg transform translate-x-full transition-transform ease-out duration-300 opacity-0 z-50">
        <button class="absolute top-4 right-6 text-2xl" onclick="toggleMenu()">✖</button>
        <nav class="flex flex-col mt-16 space-y-6 px-6">
            <a href="{{ route('home') }}" class="text-gray-700 hover:text-blue-600 text-lg">Accueil</a>
            <a href="{{ route('chambre') }}" class="text-gray-700 hover:text-blue-600 text-lg">Chambres</a>
            <a href="{{ route('galleryImages') }}" class="py-2 text-gray-700 hover:text-blue-600">Galleries</a>
            <a href="{{ route('service') }}" class="text-gray-700 hover:text-blue-600 text-lg">Services</a>
            <a href="{{ route('contact') }}" class="text-gray-700 hover:text-blue-600 text-lg">Contact</a>
            <a href="{{ route('reservation') }}" class="px-6 py-3 bg-blue-600 text-white rounded-md hover:bg-blue-700 text-center">Réserver</a>
        </nav>
    </div><br><br><br>

<!-- Container principal -->
<div class="grid grid-cols-1 md:grid-cols-[3fr_1fr] gap-6 max-w-full h-screen p-6">

    <!-- Section des chambres -->
    <div class="space-y-6">
        <!-- Appartement Premium -->
        <div class="flex overflow-hidden">
            <div class="w-1/2 relative">
                <div class="relative h-80 overflow-hidden group">
                    <img id="default-image" class="w-full h-80 object-cover" src="{{asset('images/chambres/presidentiel/salon.jpeg')}}" alt="Photo principale">
                    <div class="absolute bottom-2 right-2 bg-black bg-opacity-50 text-white text-xs px-2 py-1 rounded">+ Plus d'images</div>
                    <div class="swiper mySwiper hidden absolute top-0 left-0 w-full h-full group-hover:block">
                        <div class="swiper-wrapper">
                            @foreach ($images as $image)
                                <div class="swiper-slide">
                                    <img class="w-full h-80 object-cover" src="{{ asset($image) }}" alt="Photo">
                                </div>
                            @endforeach
                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
            <div class="p-6 w-1/2 flex flex-col justify-between">
                <div>
                    <h3 class="text-2xl font-semibold text-gray-900">Suite Premium</h3>
                    <div class="text-gray-600 text-sm mt-4">
                        <span>1 x Lits King size</span>
                    </div>
                    <p class="text-gray-600 text-sm mt-2">Offrant encore plus d’espace et de raffinement, avec une vue magnifique sur la mère et des équipements haut de gamme.</p>
                </div>
                <div>
                    <p class="text-gray-900 text-lg font-bold mt-4">100 000 CFA / nuit</p>
                    <p class="text-gray-600 text-sm">Petit déjeuner inclus</p>
                    <button class="bg-blue-600 text-white w-full py-2 rounded-lg mt-2">
                        <a href="{{ route('reservation') }}">Réserver maintenant</a>
                    </button>
                </div>
            </div>
        </div>

        <!-- Suite Confort -->
        <div class="flex overflow-hidden">
            <div class="w-1/2 relative">
                <div class="relative h-80 overflow-hidden group">
                    <img id="default-image" class="w-full h-80 object-cover" src="{{asset('images/chambres/standard/salon.jpeg')}}" alt="Photo principale">
                    <div class="absolute bottom-2 right-2 bg-black bg-opacity-50 text-white text-xs px-2 py-1 rounded">+ Plus d'images</div>
                    <div class="swiper mySwiper hidden absolute top-0 left-0 w-full h-full group-hover:block">
                        <div class="swiper-wrapper">
                            @foreach ($img as $image)
                                <div class="swiper-slide">
                                    <img class="w-full h-80 object-cover" src="{{ asset($image) }}" alt="Photo">
                                </div>
                            @endforeach
                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
            <div class="p-6 w-1/2 flex flex-col justify-between">
                <div>
                    <h3 class="text-2xl font-semibold text-gray-900">Suite Confort</h3>
                    <div class="text-gray-600 text-sm mt-4">
                        <span> 1x Lits King size</span>
                    </div>
                    <p class="text-gray-600 text-sm mt-2">Chambre moderne et élégante, parfaite pour un séjour confortable à la Résidence HABIA.</p>
                </div>
                <div>
                    <p class="text-gray-900 text-lg font-bold mt-4">75 000 CFA / nuit</p>
                    <p class="text-gray-600 text-sm">Petit déjeuner inclus</p>
                    <button class="bg-blue-600 text-white w-full py-2 rounded-lg mt-2">
                        <a href="{{ route('reservation') }}">Réserver maintenant</a>
                    </button>
                </div>
            </div>
        </div>

        <!-- Suite Familiale -->
        <div class="flex overflow-hidden">
            <div class="w-1/2 relative">
                <div class="relative h-80 overflow-hidden group">
                    <img id="default-image" class="w-full h-80 object-cover" src="{{asset('images/chambres/familliale/salon.jpeg')}}" alt="Photo principale">
                    <div class="absolute bottom-2 right-2 bg-black bg-opacity-50 text-white text-xs px-2 py-1 rounded">+ Plus d'images</div>
                    <div class="swiper mySwiper hidden absolute top-0 left-0 w-full h-full group-hover:block">
                        <div class="swiper-wrapper">
                            @foreach ($directo as $image)
                                <div class="swiper-slide">
                                    <img class="w-full h-80 object-cover" src="{{ asset($image) }}" alt="Photo">
                                </div>
                            @endforeach
                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
            <div class="p-6 w-1/2 flex flex-col justify-between">
                <div>
                    <h3 class="text-2xl font-semibold text-gray-900">Suite Familiale</h3>
                    <div class="text-gray-600 text-sm mt-4">
                        <span> 1x Lits King size</span> - 1 x  lit simple
                    </div>
                    <p class="text-gray-600 text-sm mt-2">Idéale pour les familles, cette suite spacieuse offre un confort optimal pour un séjour agréable.</p>
                </div>
                <div>
                    <p class="text-gray-900 text-lg font-bold mt-4">90 000 CFA / nuit</p>
                    <p class="text-gray-600 text-sm">Petit déjeuner inclus</p>
                    <button class="bg-blue-600 text-white w-full py-2 rounded-lg mt-2">
                        <a href="{{ route('reservation') }}">Réserver maintenant</a>
                    </button>
                </div>
            </div>
        </div>

    </div>

    <!-- Section météo -->
    <aside class="bg-white shadow-md rounded-lg p-6 h-36 flex flex-col justify-center items-center hidden md:block">
        <h2 class="text-xl font-bold text-gray-900 mb-2">Météo au Bénin</h2>
        <div id="weather" class="text-gray-700 text-center">
            <p>Chargement de la météo...</p>
        </div>
    </aside>
</div>

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<section class="py-10 px-6 invisible"> 
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non soluta et repudiandae eligendi debitis quia recusandae delectus, doloremque error quisquam iusto necessitatibus dolores eos alias sit nostrum mollitia laboriosam itaque?</p>
</section>

<!-- Pied de page -->
<footer class="bg-[#8b7aa2] py-5 text-white">
    <div class="container mx-auto px-6">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Informations sur l'hôtel -->
            <div>
                <h2 class="text-2xl font-bold mb-4">Habia Residence par <span class="italic">Bianic Hotels</span></h2>
                <p class="text-lg mb-2">Ewecodji, Grand Popo, Bénin</p>
                <p class="text-lg mb-2">+229 0159797908</p>
                <p class="text-lg"><a href="mailto:contact@bianichotels.com" class="hover:underline">contact@bianichotels.com</a></p>
            </div>

            <!-- Offres -->
            <div>
                <h2 class="text-2xl font-bold mb-2">Nos Offres</h2>
                <ul class="space-y-1 text-lg">
                    <li><a href="#salon-luxueux" class="hover:underline">Salon luxueux</a></li>
                    <li><a href="#chambres-luxueuses" class="hover:underline">Chambres luxueuses</a></li>
                    <li><a href="#piscine" class="hover:underline">Piscine</a></li>
                    <li><a href="#restaurant" class="hover:underline">Restaurant</a></li>
                    <li><a href="#chambres-familiales" class="hover:underline">Chambres familiales</a></li>
                    <li><a href="#plage-privee" class="hover:underline">Plage Privée (bientôt)</a></li>
                </ul>
            </div>

            <!-- Réseaux sociaux -->
            <div class="text-center md:text-left">
                <h2 class="text-2xl font-bold mb-2">Suivez-nous</h2>
                <div class="flex justify-center md:justify-start space-x-6">
                    <a href="https://www.facebook.com/profile.php?id=61553316564448" target="_blank" class="text-blue-600 hover:text-blue-800 text-3xl">
                        <i class="fab fa-facebook"></i>
                    </a>
                    <a href="https://www.instagram.com/habia_residence?igsh=eG0yZGx6MXhucXp3" target="_blank" class="text-pink-600 hover:text-pink-800 text-3xl">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="https://www.tiktok.com/@bianichotels?_t=8r0kOCDomyZ&_r=1" target="_blank" class="text-black hover:text-gray-800 text-3xl">
                        <i class="fab fa-tiktok"></i>
                    </a>
                    <a href="https://wa.me/2290159797908" target="_blank" class="text-green-600 hover:text-green-800 text-3xl">
                        <i class="fab fa-whatsapp"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Copyright Section -->
    <div class="py-2 mt-5 text-center text-white">
        <p class="text-lg">&copy; 2025 Bianic Hotels. Tous droits réservés.</p>
    </div>
</footer>

<script>
        function toggleMenu() {
        const menu = document.getElementById("mobile-menu");
        const overlay = document.getElementById("overlay");
        const burgerIcon = document.getElementById("burger-icon");

        // Toggle du menu (slide-in et fondu)
        menu.classList.toggle("translate-x-full");
        menu.classList.toggle("opacity-0");

        // Affichage du fond semi-transparent
        overlay.classList.toggle("hidden");

        // Animation de l’icône burger (rotation)
        burgerIcon.classList.toggle("rotate-90");
    }

</script>
<!-- Script météo avec icônes -->
<script>
    async function fetchWeather() {
        try {
            const response = await fetch('https://api.open-meteo.com/v1/forecast?latitude=6.5&longitude=2.6&current_weather=true&timezone=Africa/Porto-Novo');
            const data = await response.json();
            const weather = data.current_weather;

            // Correspondance météo -> icônes
            const weatherIcons = {
                0: "☀️", // Soleil
                1: "🌤️", // Peu nuageux
                2: "⛅", // Partiellement nuageux
                3: "☁️", // Nuageux
                45: "🌫️", // Brouillard
                48: "🌫️", // Brouillard givrant
                51: "🌦️", // Bruine légère
                53: "🌧️", // Bruine modérée
                55: "🌧️", // Bruine forte
                61: "🌦️", // Pluie légère
                63: "🌧️", // Pluie modérée
                65: "🌧️", // Pluie forte
                80: "🌦️", // Averses légères
                81: "🌧️", // Averses modérées
                82: "⛈️", // Averses fortes
                95: "⛈️", // Orages légers
                96: "⛈️", // Orages avec grêle légère
                99: "⛈️", // Orages avec grêle forte
            };

            // Sélection de l'icône météo
            const weatherIcon = weatherIcons[weather.weathercode] || "❓";

            // Affichage dans le DOM
            document.getElementById("weather").innerHTML = `
                <p class="text-3xl">${weatherIcon}</p>
                <p><strong>${weather.temperature}°C</strong></p>
                <p>Vent : ${weather.windspeed} km/h</p>
            `;
        } catch (error) {
            document.getElementById("weather").innerHTML = "<p>Impossible de récupérer la météo.</p>";
        }
    }

    fetchWeather();

    document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".group").forEach(container => {
        let swiperInstance = null;
        const slider = container.querySelector(".mySwiper");
        const defaultImage = container.querySelector("#default-image");

        container.addEventListener("mouseenter", function () {
            slider.classList.remove("hidden"); // Afficher le slider
            defaultImage.style.display = "none"; // Cacher l'image principale

            if (!swiperInstance) {
                swiperInstance = new Swiper(slider, {
                    loop: true,
                    navigation: {
                        nextEl: container.querySelector(".swiper-button-next"),
                        prevEl: container.querySelector(".swiper-button-prev"),
                    },
                    pagination: {
                        el: container.querySelector(".swiper-pagination"),
                        clickable: true,
                    },
                });
            }
        });

        container.addEventListener("mouseleave", function () {
            slider.classList.add("hidden"); // Cacher le slider
            defaultImage.style.display = "block"; // Afficher l'image principale
        });
    });
});

</script>


    </body>
    </html>
