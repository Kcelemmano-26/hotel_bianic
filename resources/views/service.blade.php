<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BIANIC HOTELS</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-4">
        <!-- Header -->
        <header class="text-center my-8">
            <h1 class="text-5xl font-extrabold text-blue-700">BIANIC HOTELS</h1>
            <p class="text-gray-600 mt-4 text-lg">"Un séjour inoubliable dans un cadre luxueux et raffiné."</p>
        </header>
        
        <!-- Hero Section (Carousel) -->
        <section class="relative bg-white shadow-lg rounded-lg overflow-hidden">
            <div class="relative w-full h-[700px]">
                <div class="absolute inset-0 flex items-center justify-start text-white p-8 bg-black bg-opacity-50 transition-opacity duration-500" id="carousel-text">
                    <div>
                        <h2 class="text-3xl font-bold" id="carousel-title">Appartement Supérieur</h2>
                        <p class="mt-2 text-lg" id="carousel-description">Chambres luxueuses dès 99€ la nuit avec Wifi gratuit.</p>
                        <button class="mt-4 bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg text-lg shadow-lg">RÉSERVEZ MAINTENANT</button>
                    </div>
                </div>
                <img src="https://storage.googleapis.com/a1aa/image/HdhXjVCSDGoY6Z6kMJOWTO0sS3RL0T13Rye8-G5SnUg.jpg" class="w-full h-[500px] object-cover" id="carousel-image" alt="Image de l'hôtel">
            </div>
        </section>
        
        <script>
            const images = [
                {
                    src: "https://storage.googleapis.com/a1aa/image/HdhXjVCSDGoY6Z6kMJOWTO0sS3RL0T13Rye8-G5SnUg.jpg",
                    title: "Suite présidentielle",
                    description: "Chambres luxueuses dès 99€ la nuit avec Wifi gratuit."
                },
                {
                    src: "https://storage.googleapis.com/a1aa/image/XLu7tEDYW4TmP6IdRJ4LkJoz6OhbjKwsyTxM4vpwlmw.jpg",
                    title: "Restaurant Raffiné",
                    description: "Savourez une cuisine gastronomique dans une ambiance élégante."
                },
                {
                    src: "https://storage.googleapis.com/a1aa/image/example3.jpg",
                    title: "Espace Bien-être",
                    description: "Détendez-vous dans notre spa exclusif avec soins personnalisés."
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
            <h2 class="text-3xl font-bold text-blue-700">Nos Avantages</h2>
            <div class="flex flex-wrap justify-center mt-8 gap-8">
                <div class="w-64 text-center">
                    <i class="fas fa-shuttle-van text-5xl text-blue-700"></i>
                    <p class="mt-3 text-gray-700 text-lg">Service de navette gratuit</p>
                </div>
                <div class="w-64 text-center">
                    <i class="fas fa-utensils text-5xl text-blue-700"></i>
                    <p class="mt-3 text-gray-700 text-lg">Restaurant gastronomique</p>
                </div>
                <div class="w-64 text-center">
                    <i class="fas fa-parking text-5xl text-blue-700"></i>
                    <p class="mt-3 text-gray-700 text-lg">Parking sécurisé</p>
                </div>
                <div class="w-64 text-center">
                    <i class="fas fa-spa text-5xl text-blue-700"></i>
                    <p class="mt-3 text-gray-700 text-lg">Espace bien-être</p>
                </div>
            </div>
        </section>
        
        <!-- Restaurant Section -->
        <section class="relative bg-white shadow-lg rounded-lg overflow-hidden">
            <img src="https://storage.googleapis.com/a1aa/image/XLu7tEDYW4TmP6IdRJ4LkJoz6OhbjKwsyTxM4vpwlmw.jpg" alt="Restaurant" class="w-full h-[500px] object-cover">
            <div class="absolute inset-0 bg-black bg-opacity-50 flex flex-col justify-start text-left text-white p-8">
                <h2 class="text-3xl font-bold">Restaurant</h2>
                <p class="mt-4 text-lg">Découvrez une cuisine raffinée préparée par nos chefs étoilés.</p>
                <button class="mt-4 bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg text-lg shadow-lg">Voir notre carte</button>
            </div>
        </section>
    </div>
</body>
</html>
