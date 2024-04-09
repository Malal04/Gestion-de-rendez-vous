<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
        include('connexion.php');

        if (isset($_POST['button'])) {
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $date_naissance = $_POST['date_naissance'];
            $adresse = $_POST['adresse'];
            $telephone = $_POST['telephone'];
            $email = $_POST['email'];

            $sql = "INSERT INTO patient (nom, prenom, datenaissance, adresse, telephone, email)
                    VALUES ('$nom', '$prenom', '$date_naissance', '$adresse', '$telephone', '$email')";

            if (mysqli_query($conn, $sql)) {
                 header("Location: ");
            } else {
                echo "Erreur lors de l'ajout du patient : " . mysqli_error($conn);
            }
        }
    ?>

</body>

</html>