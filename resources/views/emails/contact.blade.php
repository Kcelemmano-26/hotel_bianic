<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nouveau message de contact</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            text-align: center;
        }
        .text {
        color: blue;
        font-size: 2rem;
        }
        .title {
            color: #333;
        }
        .info {
            text-align: left;
            margin: 10px 0;
            color: #555;
        }
        .separator {
            border: none;
            height: 1px;
            background: #ddd;
            margin: 20px 0;
        }
        .message {
            background: #f9f9f9;
            padding: 15px;
            border-radius: 5px;
            text-align: left;
            color: #333;
        }
        .footer {
            margin-top: 20px;
            font-size: 0.9em;
            color: #777;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="logo-container">
            <span class="text">
                Bianic - Hôtel
            </span>        
        </div>
        <h1 class="title">Nouveau message de contact</h1>
        <p class="info"><strong>Nom :</strong> {{ $data['name'] }}</p>
        <p class="info"><strong>Email :</strong> {{ $data['email'] }}</p>
        <hr class="separator"/>
        <p class="info"><strong>Sujet :</strong> {{ $data['subject'] }}</p>
        <p class="message">{{ $data['message'] }}</p>
        <footer class="footer">
            Bianic - Hôtel, Ewecodji, Grand Popo, Bénin.
        </footer>
    </div>
</body>
</html>pour