<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réservation de Chambre</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <!-- Header -->
    <header class="bg-white shadow-md py-4">
        <div class="container mx-auto flex justify-between items-center px-6">
            <a href="{{ route('home') }}" class="text-2xl font-bold text-gray-900">Hôtel <span class="text-blue-600">Bianic</span></a>

            <!-- Menu de navigation -->
            <nav class="hidden md:flex space-x-6">
                <a href="{{ route('home') }}" class="py-2 text-gray-700 hover:text-blue-600">Accueil</a>
                <a href="{{ route('chambre') }}" class="py-2 text-gray-700 hover:text-blue-600">Chambres</a>
                <a href="#" class="py-2 text-gray-700 hover:text-blue-600">Services</a>
                <a href="{{ route('contact') }}" class="py-2 text-gray-700 hover:text-blue-600">Contact</a>
                <a href="{{ route('reservation') }}" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Réserver</a>
            </nav>
            <div class="md:hidden text-2xl cursor-pointer" onclick="toggleMenu()">☰</div>
        </div>
    </header>

    <div class=" mx-auto p-8 rounded-lg mt-6">
        <h1 class="text-3xl font-bold text-gray-900 mb-6 text-center">Réservation</h1>

        <form action="/reservation" method="POST">
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

    <footer class="bg-gray-900 text-white text-center py-4 mt-6">
        <p>&copy; 2025 Hôtel Luxe. Tous droits réservés.</p>
    </footer>
</body>

</html>
