<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact | Hôtel Bianic</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD_FfiCqEIrpPY4VPL4sdWmJHtmc0PGz8Y&callback=initMap" async defer></script>

</head>

<body>
    <!-- Header -->
    <header class="bg-white shadow-md py-4">
        <div class="container mx-auto flex justify-between items-center px-6">
            <a href="{{ route('home') }}" class="text-2xl font-bold text-gray-900">Hôtel <span class="text-blue-600">Bianic</span></a>

            <nav class="hidden md:flex space-x-6">
                <a href="{{ route('home') }}" class="py-2 text-gray-700 hover:text-blue-600">Accueil</a>
                <a href="{{ route('chambre') }}" class="py-2 text-gray-700 hover:text-blue-600">Chambres</a>
                <a href="{{ route('contact') }}" class="py-2 text-blue-600 font-bold">Contact</a>
                <a href="{{ route('reservation') }}" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Réserver</a>
            </nav>

            <div class="md:hidden text-2xl cursor-pointer">☰</div>
        </div>
    </header>

    <!-- Section Contact -->
    <div class="max-w-5xl mx-auto p-8 bg-white shadow-lg rounded-lg mt-6">
        <h1 class="text-3xl font-bold text-gray-900 mb-6 text-center">Contactez-nous</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Formulaire de Contact -->
            <form action="/contact" method="POST" class="space-y-4">
                <div>
                    <label class="block text-gray-700 font-bold">Nom Complet <span class="text-red-500">*</span></label>
                    <input type="text" name="nom" class="w-full border p-3 rounded-lg" required>
                </div>
                <div>
                    <label class="block text-gray-700 font-bold">Email <span class="text-red-500">*</span></label>
                    <input type="email" name="email" class="w-full border p-3 rounded-lg" required>
                </div>
                <div>
                    <label class="block text-gray-700 font-bold">Sujet <span class="text-red-500">*</span></label>
                    <input type="text" name="sujet" class="w-full border p-3 rounded-lg" required>
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
                    <h2 class="text-xl font-bold text-gray-900">Nos coordonnées</h2>
                    <p class="text-gray-600">Nous sommes à votre disposition pour toute question.</p>
                </div>
                <div>
                    <h3 class="text-lg font-bold text-gray-700">Adresse</h3>
                    <p class="text-gray-600">Ewecodji, Grand-Popo, République du Bénin​</p>
                </div>
                <div>
                    <h3 class="text-lg font-bold text-gray-700">Téléphone</h3>
                    <p class="text-gray-600">(+229) 01 59 79 79 08</p>
                </div>
                <div>
                    <h3 class="text-lg font-bold text-gray-700">Email</h3>
                    <p class="text-gray-600">contact@bianichotels.com</p>
                </div>
                <!-- Carte Google Maps -->
                <div class="w-full">
                    <div id="map" style="height: 400px; width: 100%;"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white text-center py-4 mt-6">
        <p>&copy; 2025 Hôtel Bianic. Tous droits réservés.</p>
    </footer>
    <script>
        function initMap() {
            // Coordonnées de l'hôtel (latitude, longitude)
            var hotelLocation = { lat: 6.2721625, lng: 1.7893594 };

            // Création de la carte
            var map = new google.maps.Map(document.getElementById("map"), {
                zoom: 15, // Zoom (ajuste selon ton besoin)
                center: hotelLocation,
            });

            // Ajout d'un marqueur pour l'hôtel
            var marker = new google.maps.Marker({
                position: hotelLocation,
                map: map,
                title: "Hôtel Bianic"
            });
        }
        </script>

</body>

</html>
