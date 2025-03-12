<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BIANIC HOTELS</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <script async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD_FfiCqEIrpPY4VPL4sdWmJHtmc0PGz8Y&callback=initMap" async defer></script>
</head>

<body class="bg-gray-100"> <!-- Ajout du padding-top pour compenser l'en-tête fixe -->

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
    </div><br><br><br><br><br>

    <!-- Contenu principal de la page -->
    <div class="container mx-auto px-4 py-8">
        <!-- Section Header -->
        <header class="text-center mb-12">
            <h1 class="text-6xl font-extrabold text-blue-700">BIANIC HOTELS</h1>
            <p class="text-xl mt-4 text-gray-500">" Bianic Hotels " vous accueille au cœur de Grand-Popo, au Bénin, pour une escapade au calme au sein d'une nature luxuriante. Nous proposons une gamme d'hébergements confortables, des chambres spacieuses aux suites élégantes, conçus pour vous offrir détente et bien-être. Notre restaurant et notre bar vous invitent à savourer de délicieuses saveurs, tandis que notre équipe attentive et chaleureuse veille à rendre votre séjour inoubliable"</p>
        </header>

        <!-- Hero Section (Carrousel) -->
        <section class="relative overflow-hidden rounded-lg shadow-lg">
            <div class="relative w-full h-[600px]">
                <div class="absolute inset-0 flex items-center justify-start text-white bg-black bg-opacity-40 p-6">
                    <div class="w-1/2">
                        <h2 class="text-4xl font-bold text-blue-700 mb-2" id="carousel-title">Appartement Luxe</h2>
                        <p class="text-lg mb-4" id="carousel-description">Séjournez dans nos appartements luxueux avec vue imprenable, climatisation, Wifi haut débit et services premium.</p>
                        <a href="#reservation" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-8 rounded-full">Réservez Maintenant</a>
                    </div>
                </div>
                <img src="{{ asset('images/services/generale-suite.jpg') }}" class="w-full h-full object-cover" id="carousel-image" alt="Image de l'hôtel">
            </div>
        </section>

        <script>
            const images = [
                {
                    src: "{{ asset('images/services/president.jpeg') }}",
                    title: "Suite Présidentielle",
                    description: "Un havre de paix avec des équipements haut de gamme, une vue spectaculaire et des services personnalisés."
                },
                {
                    src: "{{ asset('images/services/piscinee.jpg') }}",
                    title: "Piscine de Luxe",
                    description: "Profitez de notre piscine à débordement entourée d'un espace vert, accessible uniquement aux clients."
                },
                {
                    src: "{{ asset('images/services/familly.jpeg') }}",
                    title: "Suite Familiale",
                    description: "Une suite spacieuse et confortable, idéale pour les familles, avec des installations modernes et un service irréprochable."
                }
            ];

            let index = 0;
            function changeSlide() {
                index = (index + 1) % images.length;
                document.getElementById("carousel-image").src = images[index].src;
                document.getElementById("carousel-title").textContent = images[index].title;
                document.getElementById("carousel-description").textContent = images[index].description;
            }
            setInterval(changeSlide, 5000);
        </script>

        <!-- Avantages Section -->
        <section class="my-12 text-center">
            <h2 class="text-3xl font-bold text-blue-700 mb-8">Avantage de l'Hotels</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="flex flex-col items-center">
                    <i class="fas fa-shuttle-van text-4xl text-blue-700"></i>
                    <p class="mt-4 text-lg">Un service de navette privé est disponible sur demande pour vous faciliter les déplacements.</p>
                </div>
                <div class="flex flex-col items-center">
                    <i class="fas fa-utensils text-4xl text-blue-700"></i>
                    <p class="mt-4 text-lg">Dégustez des spécialités africaines et européennes dans notre restaurant.</p>
                </div>
                <div class="flex flex-col items-center">
                    <i class="fas fa-parking text-4xl text-blue-700"></i>
                    <p class="mt-4 text-lg">Parking sécurisé à l'intérieur et extérieur.</p>
                </div>
                <div class="flex flex-col items-center">
                    <i class="fas fa-spa text-4xl text-blue-700"></i>
                    <p class="mt-4 text-lg">Détendez-vous dans notre piscine rafraîchissante.</p>
                </div>
            </div>
        </section>

        <!-- Special Offers Section -->
        <section class="relative bg-cover bg-center text-white rounded-lg p-8 mb-12" style="background-image: url('{{ asset('images/services/restau.jpeg') }}');">
            <div class="absolute inset-0 bg-black bg-opacity-40"></div> <!-- L'overlay sombre pour améliorer la lisibilité -->
            <div class="relative z-10 flex flex-col items-start justify-center text-left w-full max-w-xl pl-8"> <!-- Décalage à gauche -->
                <h2 class="text-3xl font-bold mb-4">Restaurant</h2>
                <p class="text-lg mb-6">Partez à la découverte d'un voyage gustatif unique au cœur de l'Afrique. Notre restaurant vous propose une cuisine authentique et raffinée, élaborée à partir de produits frais et locaux cultivés dans notre jardin bio. Notre chef, passionné de saveurs africaines, revisite les classiques avec créativité et vous invite à un festival de goûts inoubliable.</p>
                <a href="https://menus.bianichotels.com/" class="bg-blue-700 text-white font-bold py-3 px-8 rounded-full hover:bg-blue-800">Réservez votre table</a>
            </div>
        </section>
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
            const alertBox = document.querySelector('.bg-green-500');
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
