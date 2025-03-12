<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bianic Hotel - Gallery</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
  <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
  <style>
    /* Pour éviter un écart par défaut entre les colonnes */
    .no-gap {
      column-gap: 0;
    }
    /* Pour éviter qu'une image se divise entre deux colonnes */
    .break-inside {
      break-inside: avoid;
      -webkit-column-break-inside: avoid;
      -moz-column-break-inside: avoid;
    }
  </style>
</head>
<body class="bg-gray-100">
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
    </div><br><br><br>

<main class="mt-5 px-4">
    <!-- Section Galerie -->
    <section class="text-center my-2">
        <h2 class="text-4xl font-extrabold text-blue-700">Notre Galerie</h2>
        <p class="text-gray-600 mt-2 max-w-2xl mx-auto">
            Découvrez nos magnifiques paysages et installations.
        </p>
    </section>

    <!-- Galerie pour ordinateur (visible uniquement sur grand écran) -->
    <div class="hidden md:block container mx-auto py-10">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-1">
            @foreach ($galleryImages as $image)
                <div class="relative group overflow-hidden shadow-md">
                    <img src="{{ $image }}" class="w-full h-64 object-cover transition-transform duration-300 ease-in-out group-hover:scale-110" alt="Gallery Image">
                    <div class="absolute inset-0 bg-black bg-opacity-50 flex justify-center items-center opacity-0 group-hover:opacity-100 transition duration-300">
                        <a href="{{ $image }}" class="text-white text-xl font-bold">Voir</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div> 
    
        <!-- Albums pour mobile (visible uniquement sur écran mobile) -->
        <div id="albums-container" class="block md:hidden container mx-auto py-5">
            <div id="albums-grid" class="grid grid-cols-3 gap-1"> <!-- Ajout de grid-cols-2 -->
                @foreach ($albums as $album => $images)
                    @if (count($images) > 0)
                    <div class="text-center album-item">
                      <div class="relative cursor-pointer" onclick="showAlbum('{{ $album }}')">
                          <!-- Image principale avec overlay -->
                          <div class="relative">
                              <img src="{{ $images[0] }}" class="w-full h-64 object-cover rounded-lg shadow-md transition duration-300 ease-in-out hover:opacity-75" alt="Gallery Image">
                              <div class="absolute inset-0 bg-black bg-opacity-50 rounded-lg"></div>
                          </div>

                          <!-- Titre en bas, en dehors de l'image -->
                          <h3 class="mt-2 text-xl font-bold text-gray-900">{{ ucfirst($album) }}</h3>
                      </div>
                    </div>
                    @endif
                @endforeach
            </div>
        </div>

        <!-- Conteneur des images d'un album (caché par défaut) -->
        <div id="album-content" class="hidden mt-6">
        <button onclick="hideAlbum()" class="mb-4 flex items-center text-gray-700 hover:text-red-500">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-8 h-8">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"></path>
            </svg>
        </button>
            <h2 id="album-title" class="text-2xl font-bold text-gray-800 mb-4"></h2>
            <div id="album-images" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4"></div>
        </div>
    </div>
</main>

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


  <script>
    function showAlbum(albumName) {
        // Cacher la grille des albums
        document.getElementById("albums-grid").classList.add("hidden");

        // Récupérer l'album sélectionné
        var albumContent = document.getElementById("album-content");
        var albumImagesContainer = document.getElementById("album-images");
        var albumTitle = document.getElementById("album-title");

        // Vider les images précédentes
        albumImagesContainer.innerHTML = "";

        // Modifier le titre de l'album
        albumTitle.textContent = albumName.charAt(0).toUpperCase() + albumName.slice(1);

        // Ajouter dynamiquement les images de l'album sélectionné
        var albums = @json($albums);
        if (albums[albumName]) {
            albums[albumName].forEach((image) => {
                let imgDiv = document.createElement("div");
                imgDiv.className = "relative group overflow-hidden shadow-md rounded-lg";
                imgDiv.innerHTML = `
                    <img src="${image}" class="w-full h-64 object-cover transition-transform duration-300 ease-in-out group-hover:scale-110" alt="Gallery Image">
                    <div class="absolute inset-0 bg-black bg-opacity-50 flex justify-center items-center opacity-0 group-hover:opacity-100 transition duration-300">
                        <a href="${image}" class="text-white text-xl font-bold">Voir</a>
                    </div>
                `;
                albumImagesContainer.appendChild(imgDiv);
            });
        }

        // Afficher le contenu de l'album
        albumContent.classList.remove("hidden");
    }

    function hideAlbum() {
        // Réafficher la grille des albums
        document.getElementById("albums-grid").classList.remove("hidden");

        // Cacher le contenu de l'album
        document.getElementById("album-content").classList.add("hidden");
    }
</script>
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
