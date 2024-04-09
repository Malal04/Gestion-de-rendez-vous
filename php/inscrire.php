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
    <link rel="stylesheet" href="../phpcss/inscrure.css">

</head>

<body>


    <div class="connecter">

        <form action="sinscrire.php" method="post">

            <h3>Nouveau sur Dams?</h3>

            <label for="username">Nom</label>
            <input type="text" name="username" placeholder="Nom" required>

            <label for="email">Adresse e-mail</label>
            <input type="email" name="email" placeholder="Adresse e-mail" required>

            <label for="password">Mot de passe</label>
            <input type="password" name="password" placeholder="Mot de passe" required>

            <label for="role">Rôle</label>
            <select name="role" required>
                <option value="patient">Patient</option>
                <option value="autre">Autre</option>
            </select>

            <input type="submit" name="button" value="S'INSCRIRE" class="button">

            <div class="cla">
                <p>
                    <a href="debut.php">Retour</a>
                </p>
            </div>

        </form>

    </div>

</body>

</html>