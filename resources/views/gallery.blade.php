<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bianic Hotel - Gallery</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
  <script src="https://cdn.tailwindcss.com"></script>
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
  <header id="header" class="top-0 w-full bg-green shadow-md">
    <div class="container mx-auto flex items-center justify-between p-4">
      <a href="{{ route('home') }}" class="text-2xl font-bold text-gray-900">
        Hôtel <span class="text-blue-600">Bianic</span>
      </a>
      <nav id="navbar" class="hidden md:flex space-x-6">
        <a href="index.html" class="hover:text-blue-500">Home</a>
        <a href="about.html" class="hover:text-blue-500">Chambre</a>
        <div class="relative group">
          <a href="#" class="text-blue-500 flex items-center">Gallery <i class="bi bi-chevron-down ml-1"></i></a>
          <ul class="absolute hidden group-hover:block bg-white shadow-md mt-2 w-40">
            <li><a href="gallery.html" class="block px-4 py-2 hover:bg-gray-200">Chambres</a></li>
            <li><a href="gallery.html" class="block px-4 py-2 hover:bg-gray-200">Détente</a></li>
            <li><a href="gallery.html" class="block px-4 py-2 hover:bg-gray-200">Piscine</a></li>
            <li><a href="gallery.html" class="block px-4 py-2 hover:bg-gray-200">Vidéos</a></li>
          </ul>
        </div>
        <a href="services.html" class="hover:text-blue-500">Services</a>
        <a href="contact.html" class="hover:text-blue-500">Contact</a>
      </nav>
      <div class="hidden md:flex space-x-4">
        <a href="#" class="text-gray-600 hover:text-blue-500"><i class="bi bi-twitter"></i></a>
        <a href="#" class="text-gray-600 hover:text-blue-500"><i class="bi bi-facebook"></i></a>
        <a href="#" class="text-gray-600 hover:text-blue-500"><i class="bi bi-instagram"></i></a>
        <a href="#" class="text-gray-600 hover:text-blue-500"><i class="bi bi-linkedin"></i></a>
      </div>
      <button class="md:hidden mobile-nav-toggle text-2xl">
        <i class="bi bi-list"></i>
      </button>
    </div>
  </header>

<main class="mt-5 px-4">
    <!-- Section Galerie -->
    <section class="text-center my-2">
        <h2 class="text-4xl font-extrabold text-gray-800">Notre Galerie</h2>
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

  <!-- Footer -->
  <footer class="bg-white py-4 text-center mt-10 shadow-md">
    <p class="text-gray-600">&copy; 2025 Bianic Hotel. Tous droits réservés.</p>
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

</body>
</html>
