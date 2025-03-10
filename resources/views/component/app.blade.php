<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hôtel Luxe</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <header class="header">
        <div class="container">
            <!-- Logo -->
            <a href="{{ route('home') }}" class="logo">Hôtel <span>Bianic</span></a>

            <!-- Menu de navigation -->
            <nav class="nav">
                <ul>
                    <li><a href="{{ route('home') }}">Accueil</a></li>
                    <li><a href="#">Chambres</a></li>
                    <li><a href="#">Services</a></li>
                    <li><a href="#">Contact</a></li>
                    <li><a href="#" class="btn">Réserver</a></li>
                </ul>
            </nav>
            <!-- Menu burger pour mobile -->
            <div class="burger" onclick="toggleMenu()">
                ☰
            </div>
        </div>
        <hr>

    </header>

    <main>
        @yield('content')
    </main>
</body>
</html>
