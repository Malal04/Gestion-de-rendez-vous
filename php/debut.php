<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de Connexion</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Poppins:wght@700;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="../phpcss/debut.css">

</head>

<body>

    <div class="connecter">

        <div class="cla">

            <p>
                <a href="../index.html">Retour</a>
            </p>

        </div>

        <form action="seconnecter.php" method="post">

            <h3>J'ai déjà un compte Dams</h3>

            <label for="email">Adresse e-mail</label>
            <input type="email" name="email" placeholder="Adresse e-mail" required>

            <label for="pass">Mot de passe</label>
            <input type="password" name="password" placeholder="Mot de passe" required>

            <input type="submit" name="login" value="SE CONNECTER" class="button">

            <p>
                <a href="#">MOT DE PASSE OUBLIE?</a>
            </p>

        </form>

        <div class="form">

            <h3>Nouveau sur Dams</h3>

            <h5>
                <a href="inscrire.php">S'INSCRIRE</a>
            </h5>

        </div>

    </div>

</body>

</html>