<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réservation de Chambre</title>
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

    <div class=" mx-auto p-8 rounded-lg mt-6">
        <h1 class="text-3xl font-bold text-gray-900 mb-6 text-center">Réservation</h1>
        @if(session('success'))
            <div class="bg-blue-500 text-white p-4 rounded-md text-center mb-4">
                {{ session('success') }}
            </div>
        @endif


        <form action="{{ route('reservation.store') }}" method="POST">
        @csrf

            <div class="space-y-4">
                <div>
                    <label class="block text-gray-700 font-bold">Nom Complet <span class="text-red-500">*</span></label>
                    <input type="text" name="nom" class="w-full border p-3 rounded-lg" required>
                    <p class="text-gray-500 text-sm">Veuillez entrer votre nom complet.</p>
                </div>
                <div>
                    <label class="block text-gray-700 font-bold">Email <span class="text-red-500">*</span></label>
                    <input type="email" name="email" class="w-full border p-3 rounded-lg" required>
                    <p class="text-gray-500 text-sm">Votre adresse email pour confirmation.</p>
                </div>
                <div>
                    <label class="block text-gray-700 font-bold">Téléphone <span class="text-red-500">*</span></label>
                    <input type="tel" name="telephone" class="w-full border p-3 rounded-lg" required>
                    <p class="text-gray-500 text-sm">Un numéro valide pour vous contacter.</p>
                </div>
                <div>
                    <label class="block text-gray-700 font-bold">Type de Chambre <span class="text-red-500">*</span></label>
                    <select name="chambre" class="w-full border p-3 rounded-lg" required>
                        <option value="">Sélectionner...</option>
                        <option value="standard">Chambre Standard</option>
                        <option value="luxe">Suite Luxe</option>
                    </select>
                    <p class="text-gray-500 text-sm">Choisissez votre type de chambre.</p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-gray-700 font-bold">Date d'Arrivée <span class="text-red-500">*</span></label>
                        <input type="date" name="arrivee" class="w-full border p-3 rounded-lg" required>
                        <p class="text-gray-500 text-sm">Sélectionnez votre date d'arrivée.</p>
                    </div>
                    <div>
                        <label class="block text-gray-700 font-bold">Date de Départ <span class="text-red-500">*</span></label>
                        <input type="date" name="depart" class="w-full border p-3 rounded-lg" required>
                        <p class="text-gray-500 text-sm">Sélectionnez votre date de départ.</p>
                    </div>
                </div>
                <div>
                    <label class="block text-gray-700 font-bold">Nombre de Personnes <span class="text-red-500">*</span></label>
                    <input type="number" name="personnes" class="w-full border p-3 rounded-lg" min="1" required>
                    <p class="text-gray-500 text-sm">Indiquez le nombre de personnes.</p>
                </div>
                <div>
                    <label class="block text-gray-700 font-bold">Nombre d'Enfants</label>
                    <input type="number" name="nombre_enfants" class="w-full border p-3 rounded-lg" min="0" value="0">
                    <p class="text-gray-500 text-sm">Indiquez le nombre d'enfants (facultatif).</p>
                </div>
                <div>
                    <label class="block text-gray-700 font-bold">Message</label>
                    <textarea name="message" rows="4" class="w-full border p-3 rounded-lg" placeholder="Ajoutez une note spéciale..."></textarea>
                    <p class="text-gray-500 text-sm">Optionnel : Ajoutez une demande particulière.</p>
                </div>
            </div>

            <div class="mt-6">
                <button type="submit" class="w-full bg-blue-600 text-white p-3 rounded-lg font-bold hover:bg-blue-700">Réserver Maintenant</button>
            </div>
        </form><br>
        <label for=""><span class="text-red-500">* = Champ obligatoire</span></label>
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
</body>

</html>
