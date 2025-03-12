<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hôtel Bianic</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <!-- <script async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD_FfiCqEIrpPY4VPL4sdWmJHtmc0PGz8Y&callback=initMap" async defer></script> -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"></script>
</head>

<body class="bg-gray-100">

    <!-- Header -->
<header class="bg-white shadow-md py-4 fixed w-full z-50">
    <div class="container mx-auto flex justify-between items-center px-6">
        <!-- Logo -->
        <!-- <a href="{{ route('home') }}" class="text-2xl font-bold text-gray-900">Hôtel <span class="text-blue-600">Bianic</span></a> -->
        <a href="{{ route('home') }}" class="text-2xl font-bold text-gray-900">
                <img src="{{ asset('images/logo.jpeg') }}" alt="Hôtel Bianic" class="h-12">
        </a>

        <!-- Menu de navigation (Desktop) -->
        <nav class="hidden md:flex space-x-6">
            <a href="{{ route('home') }}" class="py-2 text-gray-700 hover:text-blue-600">Accueil</a>
            <a href="{{ route('chambre') }}" class="py-2 text-gray-700 hover:text-blue-600">Chambres</a>
            <a href="{{ route('galleryImages') }}" class="py-2 text-gray-700 hover:text-blue-600">Galleries</a>
            <a href="{{ route('service') }}" class="py-2 text-gray-700 hover:text-blue-600">Services</a>
            <a href="{{ route('contact') }}" class="py-2 text-gray-700 hover:text-blue-600">Contact</a>
            <a href="{{ route('reservation') }}" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Réserver</a>
        </nav>

        <!-- Menu burger pour mobile -->
        <div id="burger-icon" class="md:hidden text-2xl cursor-pointer transition-transform duration-300" onclick="toggleMenu()">☰</div>
    </div>
</header>

<!-- Overlay (Fond semi-transparent) -->
<div id="overlay" class="fixed inset-0 bg-black bg-opacity-50 hidden transition-opacity duration-300 z-40" onclick="toggleMenu()"></div>

<!-- Menu mobile (Latéral droit avec animation) -->
<div id="mobile-menu"
    class="fixed top-0 right-0 h-full w-80 bg-white shadow-lg rounded-l-lg transform translate-x-full transition-transform ease-out duration-300 opacity-0 z-50">
    <button class="absolute top-4 right-6 text-2xl" onclick="toggleMenu()">✖</button>
    <nav class="flex flex-col mt-16 space-y-6 px-6">
        <a href="{{ route('home') }}" class="text-gray-700 hover:text-blue-600 text-lg">Accueil</a>
        <a href="{{ route('chambre') }}" class="text-gray-700 hover:text-blue-600 text-lg">Chambres</a>
        <a href="{{ route('galleryImages') }}" class="text-gray-700 hover:text-blue-600 text-lg">Galleries</a>

        <a href="#" class="text-gray-700 hover:text-blue-600 text-lg">Services</a>
        <a href="{{ route('contact') }}" class="text-gray-700 hover:text-blue-600 text-lg">Contact</a>
        <a href="{{ route('reservation') }}" class="px-6 py-3 bg-blue-600 text-white rounded-md hover:bg-blue-700 text-center">Réserver</a>
    </nav>
</div>


<!-- Bannière -->
<div class="relative w-full h-[600px]">
    <!-- Carrousel en arrière-plan -->
    <div class="swiper mySwiper absolute inset-0 w-full h-full z-0">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <img class="w-full h-full object-cover" src="{{ asset('images/accueil/accueil_1.jpeg') }}" alt="Photo 1">
            </div>
            <div class="swiper-slide">
                <img class="w-full h-full object-cover" src="{{ asset('images/accueil/accueil_2.jpeg') }}" alt="Photo 2">
            </div>
            <div class="swiper-slide">
                <img class="w-full h-full object-cover" src="{{ asset('images/accueil/accueil_3.jpeg') }}" alt="Photo 3">
            </div>
        </div>
        <!-- Pagination -->
        <div class="swiper-pagination"></div>
    </div>

    <!-- Overlay pour lisibilité du texte -->
    <div class="absolute inset-0 bg-black bg-opacity-50 z-10"></div>

    <!-- Texte centré au premier plan -->
    <div class="absolute inset-0 flex flex-col items-center justify-center text-center text-white z-20 p-6 md:p-10">
        <a href="#" class="text-xl md:text-2xl font-light tracking-wide block">Residence HABIA by</a>
        <h1 class="text-4xl md:text-5xl font-extrabold uppercase tracking-wider">BIANIC HOTELS</h1>
        <p class="text-lg md:text-xl mt-2 font-medium">Suite Luxueuse • Restaurant • Piscine</p>
    </div>
</div>


<!-- Formulaire de recherche -->
<div class="mx-auto p-6 max-w-screen-xl hidden md:block">
    <h1 class="text-3xl font-semibold text-gray-800 mb-6">Nos hébergements</h1>
    <div class="bg-white rounded-lg shadow-lg p-6 flex flex-wrap items-center gap-4">
      
      <!-- Arrivée -->
      <div class="flex flex-col w-full md:w-auto">
        <label class="text-gray-700 font-medium mb-1">Arrivée</label>
        <input type="date" id="arrivalDate" class="border border-gray-300 rounded-lg p-2 w-48 focus:ring-2 focus:ring-blue-500">
      </div>
      
      <!-- Départ -->
      <div class="flex flex-col w-full md:w-auto">
        <label class="text-gray-700 font-medium mb-1">Départ</label>
        <input type="date" id="departureDate" class="border border-gray-300 rounded-lg p-2 w-48 focus:ring-2 focus:ring-blue-500">
      </div>
      
      <!-- Adultes -->
      <div class="flex flex-col w-full md:w-auto">
        <label class="text-gray-700 font-medium mb-1">Adultes</label>
        <input type="number" id="adultsCount" class="border border-gray-300 rounded-lg p-2 w-20 focus:ring-2 focus:ring-blue-500" min="1" value="1">
      </div>
      
      <!-- Enfants -->
      <div class="flex flex-col w-full md:w-auto">
        <label class="text-gray-700 font-medium mb-1">Enfants</label>
        <input type="number" id="childrenCount" class="border border-gray-300 rounded-lg p-2 w-20 focus:ring-2 focus:ring-blue-500" min="0" value="0" onchange="generateChildAgeFields()">
      </div>
      
      <!-- Conteneur des âges des enfants -->
      <div id="childAgeContainer" class="flex flex-wrap items-center gap-4"></div>
      
      <!-- Bouton de recherche -->
      <div class="flex flex-col w-full md:w-auto mt-4 md:mt-0">
        <label class="invisible text-gray-700 font-medium mb-1">Save</label>
        <button id="searchButton" class="bg-blue-600 text-white rounded-lg px-6 py-2 w-full md:w-auto hover:bg-blue-700 focus:ring-2 focus:ring-blue-500">
          Voir les tarifs
        </button>
      </div>
      
    </div>
  </div>

  <!-- Section des résultats (initialement cachée) -->
  <div id="resultsSection" class="max-w-7xl mx-auto mt-10 hidden">
    <div class="flex justify-center space-x-8 mb-4">
      <!-- Onglets de navigation (facultatif) -->
      <a class="text-gray-900 font-medium border-b-2 border-teal-500 pb-2" href="#">Suite Premium</a>
      <a class="text-gray-900 font-medium border-b-2 border-teal-500 pb-2" href="#">Suite Confort</a>
      <a class="text-gray-900 font-medium border-b-2 border-teal-500 pb-2" href="#">Suite Familiale</a>
    </div>
    <div id="cardsContainer" class="space-y-6">
      <!-- Les blocs d'hébergements seront injectés ici -->
    </div>
  </div>
</div>


        <!-- Aperçu des services -->
        <section class="py-10 px-6">
            <h2 class="text-3xl font-bold mb-6">Services de qualité</h2>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="bg-white shadow-md p-6">
                    <img src="{{asset('images/accueil/jardin.jpeg')}}" alt="">
                    <h3 class="text-xl font-semibold">Jardin</h3>
                    <p class="text-gray-600 mt-2">Profitez d'un jardin bien décoré pour vos moments de partage avec vos
                        proches dans un cadre intime, le tout avec une vue imprenable sur le ciel étoilé.</p>
                </div>
                <div class="bg-white shadow-md p-6">
                    <img src="{{asset('images/accueil/detente.jpg')}}" alt="">
                    <h3 class="text-xl font-semibold">Détente</h3>
                    <p class="text-gray-600 mt-2">Nous mettons à votre disposition une piscine pour la natation ou vos
                        événements à bord d'une piscine splendide.</p>
                </div>
                <div class="bg-white shadow-md p-6">
                <img src="{{asset('images/accueil/service_culunaire.jpeg')}}" alt="">
                    <h3 class="text-xl font-semibold">Service culinaire</h3>
                    <p class="text-gray-600 mt-2">Profitez d'un cadre exceptionnel, inspirant et accueillant, avec à
                        votre disposition l'un des meilleurs chefs cuisiniers pour une expérience culinaire inoubliable.
                    </p>
                </div>
            </div>
        </section>

        <!-- Section Localisation -->
        <section class="py-10 px-6 bg-gray-100">
            <h2 class="text-3xl font-bold mb-6 text-gray-900">Localisation</h2>
            <strong>Bianic Hotels</strong>
            <h6>Ewecodji, Grand Popo</h6>
            <p>Bénin</p>

            <div class="bg-white shadow-lg overflow-hidden">
                <!-- Google Maps -->
                <!-- <div id="map" style="height: 400px; width: 100%;" class="w-full h-96"></div> -->
                <div id="map" style="height: 400px; width: 100%;"></div>
            </div>
        </section>

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
            // Fonction pour gérer le menu burger sur mobile
            function toggleMenu() {
                let menu = document.querySelector('nav');
                menu.classList.toggle('hidden');
            }
        </script>


<script>
    // function initMap() {
    //     var hotelLocation = { lat: 6.2721625, lng: 1.7893594 };

    //     var map = new google.maps.Map(document.getElementById("map"), {
    //         zoom: 15,
    //         center: hotelLocation,
    //     });

    //     var marker = new google.maps.Marker({
    //         position: hotelLocation,
    //         map: map,
    //         title: "Hôtel Bianic"
    //     });
    // }
    var map = L.map('map').setView([6.2721625, 1.7893594], 15);
        
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; OpenStreetMap contributors'
        }).addTo(map);

        var marker = L.marker([6.2721625, 1.7893594]).addTo(map)
            .bindPopup('<a href="https://www.google.com/maps?q=6.2721625,1.7893594" target="_blank">Voir sur Google Maps</a>')
            .openPopup();
</script>

<script>
    // Génération dynamique des sélections d'âge pour les enfants
    function generateChildAgeFields() {
      const childrenCount = document.getElementById('childrenCount').value;
      const container = document.getElementById('childAgeContainer');
      container.innerHTML = ''; // Réinitialiser
      
      if (childrenCount > 0) {
        for (let i = 0; i < childrenCount; i++) {
          const childDiv = document.createElement('div');
          childDiv.classList.add('flex', 'flex-col', 'w-auto');
          
          const label = document.createElement('label');
          label.classList.add('text-gray-700', 'font-medium', 'mb-1');
          label.textContent = `Âge enfant ${i + 1}`;
          
          const select = document.createElement('select');
          select.classList.add('border', 'border-gray-300', 'rounded-lg', 'p-2', 'w-24', 'focus:ring-2', 'focus:ring-blue-500');
          for (let age = 0; age <= 17; age++) {
            const option = document.createElement('option');
            option.value = age;
            option.textContent = `${age} ans`;
            select.appendChild(option);
          }
          
          childDiv.appendChild(label);
          childDiv.appendChild(select);
          container.appendChild(childDiv);
        }
      }
    }

    // Templates HTML pour chaque hébergement
    const suitePremiumTemplate = `
      <div class="flex overflow-hidden">
          <div class="w-1/2 relative">
              <div class="relative h-80 overflow-hidden group">
                  <img id="default-image" class="w-full h-80 object-cover" src="{{ asset('images/chambres/presidentiel/salon.jpeg') }}" alt="Photo principale">
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
                  <p class="text-gray-600 text-sm mt-2">Offrant encore plus d’espace et de raffinement, avec une vue magnifique sur la mer et des équipements haut de gamme.</p>
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
    `;

    const suiteConfortTemplate = `
      <div class="flex overflow-hidden">
          <div class="w-1/2 relative">
              <div class="relative h-80 overflow-hidden group">
                  <img id="default-image" class="w-full h-80 object-cover" src="{{ asset('images/chambres/standard/salon.jpeg') }}" alt="Photo principale">
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
                      <span>1 x Lits King size</span>
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
    `;

    const suiteFamilialeTemplate = `
      <div class="flex overflow-hidden">
          <div class="w-1/2 relative">
              <div class="relative h-80 overflow-hidden group">
                  <img id="default-image" class="w-full h-80 object-cover" src="{{ asset('images/chambres/standard/salon.jpeg') }}" alt="Photo principale">
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
                      <span>1 x Lits King size</span> - 1 x lit simple
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
    `;

    // Fonction de recherche : à l'appel, on récupère (éventuellement) les valeurs du formulaire, puis on affiche les résultats
    function searchRooms() {
      // Vous pouvez ici récupérer et traiter les valeurs du formulaire (dates, nombre d'adultes/enfants, etc.)
      const arrivalDate = document.getElementById('arrivalDate').value;
      const departureDate = document.getElementById('departureDate').value;
      const adults = document.getElementById('adultsCount').value;
      const children = document.getElementById('childrenCount').value;
      
      // Pour cet exemple, nous affichons simplement l'ensemble des hébergements
      document.getElementById('resultsSection').classList.remove('hidden');
      document.getElementById('cardsContainer').innerHTML = suitePremiumTemplate + suiteConfortTemplate + suiteFamilialeTemplate;
    }

    // Lancer la recherche lors du clic sur "Voir les tarifs"
    document.getElementById('searchButton').addEventListener('click', searchRooms);
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
    // Initialisation du Swiper carrousel
    document.addEventListener("DOMContentLoaded", function () {
        new Swiper(".mySwiper", {
            loop: true,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
        });
    });
</script>
</body>

</html>
