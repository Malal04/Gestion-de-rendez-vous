<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fromulaire de rendez-vous</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Poppins:wght@700;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="../phpcss/Rendez.css">

</head>

<body>

    <div class="connecter">

        <form action="vous.php" method="post">

            <h3>Ajouter un patient</h3>

            <label for="">Nom</label>
            <input type="text" name="nom" placeholder="Nom" required>

            <label for="">Pronom</label>
            <input type="text" name="prenom" placeholder="Prenom" required>

            <label for="">Date de naissance</label>
            <input type="date" name="date_naissance" required>

            <label for="">Adrresse</label>
            <input type="text" name="adresse" placeholder="Adresse" required>

            <label for="">Telephone</label>
            <input type="number" name="telephoe" placeholder="Telephone" required>

            <label for="">Adresse e-mail</label>
            <input type="email" name="adresse" placeholder="Adresse e-mail" required>

            <input type="submit" name="button" value="Ajouter un patient" class="button">

            <div class="cla">

                <p>
                    <a href="patient.php">Retour</a>
                </p>

            </div>

        </form>

    </div>

</body>

</html>