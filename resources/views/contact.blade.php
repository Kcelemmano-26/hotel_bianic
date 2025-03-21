<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact | Hôtel Bianic</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">

</head>

<body>
    <!-- Header -->
    <header class="bg-white shadow-md py-4 fixed w-full z-50">
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
    </div><br>

    <!-- Section Contact -->
    <div class="max-w-5xl mx-auto px-8 py-20 mt-6">
        <h1 class="text-3xl font-bold text-blue-700 mb-6 text-center">Contactez-nous</h1>

        @if(session('success'))
            <div class="bg-blue-500 text-white p-4 rounded-md text-center mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Formulaire de Contact -->
            <form action="{{ route('submitContact') }}" method="POST" class="space-y-4">
            @csrf
                <div>
                    <label class="block text-gray-700 font-bold">Nom Complet <span class="text-red-500">*</span></label>
                    <input type="text" name="name" class="w-full border p-3 rounded-lg" required>
                </div>
                <div>
                    <label class="block text-gray-700 font-bold">Email <span class="text-red-500">*</span></label>
                    <input type="email" name="email" class="w-full border p-3 rounded-lg" required>
                </div>
                <div>
                    <label class="block text-gray-700 font-bold">Sujet <span class="text-red-500">*</span></label>
                    <input type="text" name="subject" class="w-full border p-3 rounded-lg" required>
                </div>
                <div>
                    <label class="block text-gray-700 font-bold">Message <span class="text-red-500">*</span></label>
                    <textarea name="message" rows="5" class="w-full border p-3 rounded-lg" required></textarea>
                </div>
                <div>
                    <button type="submit" class="w-full bg-blue-600 text-white p-3 rounded-lg font-bold hover:bg-blue-700">
                        Envoyer le message
                    </button>
                </div>
            </form>

            <!-- Informations de Contact -->
            <div class="space-y-4">
                <div>
                    <h2 class="text-xl font-bold text-blue-700">Nos coordonnées</h2>
                    <p class="text-gray-600">Nous sommes à votre disposition pour toute question et suggestion.</p>
                </div>
                <div>
                    <h3 class="text-lg font-bold text-blue-700">Adresse</h3>
                    <p class="text-gray-600">Ewecodji, Grand-Popo, République du Bénin​</p>
                </div>
                <div>
                    <h3 class="text-lg font-bold text-blue-700">Téléphone</h3>
                    <p class="text-gray-600">(+229) 01 59 79 79 08</p>
                </div>
                <div>
                    <h3 class="text-lg font-bold text-blue-700">Email</h3>
                    <p class="text-gray-600">contact@bianichotels.com</p>
                </div>
                <!-- Carte Google Maps -->
                <div class="w-full">
                    <div id="map" style="height: 400px; width: 100%;"></div>
                </div>
            </div>
        </div>
    </div>
<!-- Pied de page -->
<footer class="bg-[#8b7aa2] py-2 text-white">
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

    <!-- Intégration FontAwesome pour les icônes -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script>
        setTimeout(() => {
            const alertBox = document.querySelector('.bg-blue-500');
            if (alertBox) {
                alertBox.style.transition = 'opacity 0.5s';
                alertBox.style.opacity = '0';
                setTimeout(() => alertBox.remove(), 500);
            }
        }, 4000);
    </script>

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

    <script>
        var map = L.map('map').setView([6.2721625, 1.7893594], 15);
            
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; OpenStreetMap contributors'
            }).addTo(map);

            var marker = L.marker([6.2721625, 1.7893594]).addTo(map)
                .bindPopup('<a href="https://www.google.com/maps?q=6.2721625,1.7893594" target="_blank">Voir sur Google Maps</a>')
                .openPopup();
            
        </script>

</body>

</html>
