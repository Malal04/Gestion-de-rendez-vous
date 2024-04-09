<?php
include('connexion.php');

if(isset($_POST['ajouter_service'])) {
    $nom_service = $_POST['nom_service'];
    $description = $_POST['Medecin'];

    $sql_insert = "INSERT INTO service (nom_service, NomDR) VALUES ('$nom_service', '$description')";

    if(mysqli_query($conn, $sql_insert)) {
        echo "Le service a été ajouté avec succès.";
        header("Location: ../tableau/service.php");
    } else {
        echo "Erreur lors de l'ajout du service : " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Service</title>
    <link rel="stylesheet" href="../phpcss/serv.css">
</head>

<body>
    <div class="retour">
        <p><a href="../tableau/service.php">Retour</a></p>
    </div>
    <div class="container">

        <form action="" method="POST">
            <h1>Ajouter un Service</h1>
            <label for="nom_service">Nom du Service :</label>
            <input type="text" id="nom_service" name="nom_service" required>

            <label for="description">Non du Medecin :</label>
            <input type="text" id="nom" name="Medecin" required>

            <button type="submit" name="ajouter_service">Ajouter le Service</button>
        </form>
    </div>

</body>

</html>