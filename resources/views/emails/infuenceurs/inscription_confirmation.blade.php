<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation d'inscription</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
        }

        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 30px;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h1 {
            color: #4CAF50;
            font-size: 24px;
            text-align: center;
            margin-bottom: 20px;
        }

        p {
            font-size: 16px;
            line-height: 1.5;
        }

        .highlight {
            color: #4CAF50;
            font-weight: bold;
        }

        .code-section {
            margin: 20px 0;
            padding: 15px;
            background-color: #f9f9f9;
            border: 1px dashed #ccc;
            border-radius: 5px;
            text-align: center;
        }

        .code-section span {
            font-size: 18px;
            font-weight: bold;
            color: #333;
        }

        .footer {
            text-align: center;
            margin-top: 30px;
            font-size: 14px;
            color: #777;
        }

        .footer a {
            color: #4CAF50;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Bonjour {{ $user->prenom }} {{ $user->nom }}</h1>
        <p>Nous avons bien reçu votre inscription à <span class="highlight">Influence Shop</span>.</p>
        <p>Nous vous remercions pour l'intérêt que vous portez à notre plateforme. Veuillez patienter pendant que nous examinons votre candidature pour une potentielle promotion.</p>

        <p>Pour confirmer votre inscription, utilisez le code d'influenceur ci-dessous :</p>

        <!-- Code d'influenceur -->
        <div class="code-section">
            <span>{{ $user->codeinfluenceur }}</span>
        </div>

        <p>Rendez-vous sur notre site pour entrer ce code et confirmer votre inscription.</p>

        <p>Cordialement,<br> L'équipe <span class="highlight">Influence Shop</span></p>

        <div class="footer">
            <p>Si vous avez des questions, contactez-nous à <a href="mailto:support@influenceshop.com">support@influenceshop.com</a></p>
        </div>
    </div>
</body>
</html>
