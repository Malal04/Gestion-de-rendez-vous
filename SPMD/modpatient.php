<?php
include('connexion.php');

if(isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql_info_patient = "SELECT * FROM patient WHERE id = $id";
    $result_info_patient = mysqli_query($conn, $sql_info_patient);

    if(mysqli_num_rows($result_info_patient) == 1) {
        $row_patient = mysqli_fetch_assoc($result_info_patient);

        if(isset($_POST['modifier'])) {
            $id = $_POST['id'];
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $datenaissance = $_POST['datenaissance'];
            $adresse = $_POST['adresse'];
            $telephone = $_POST['telephone'];
            $email = $_POST['email'];

            $sql_update = "UPDATE patient SET nom = '$nom', prenom = '$prenom', datenaissance = '$datenaissance', adresse = '$adresse', telephone = '$telephone', email = '$email' WHERE id = $id";

            if(mysqli_query($conn, $sql_update)) {
                echo "Patient ID $id mis à jour avec succès.<br>";
                header("Location: ../tableau/patient.php");
                exit();
            } else {
                echo "Erreur lors de la mise à jour du patient ID $id : " . mysqli_error($conn) . "<br>";
            }
        }
    } else {
        echo "Patient non trouvé.";
    }
} else {
    echo "ID du patient non spécifié.";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Patient</title>
    <link rel="stylesheet" href="modutili.css">
</head>

<body>

    <div class="retour">
        <p>
            <a href="../tableau/patient.php">Retour</a>
        </p>
    </div>

    <div class="container">
        <h1>Modifier Patient</h1>
        <form method="POST">
            <input type="hidden" name="id" value="<?php echo $row_patient['id']; ?>">
            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="nom" value="<?php echo $row_patient['nom']; ?>" required>

            <label for="prenom">Prénom :</label>
            <input type="text" id="prenom" name="prenom" value="<?php echo $row_patient['prenom']; ?>" required>

            <label for="datenaissance">Date de Naissance :</label>
            <input type="date" id="datenaissance" name="datenaissance"
                value="<?php echo $row_patient['datenaissance']; ?>" required>

            <label for="adresse">Adresse :</label>
            <input type="text" id="adresse" name="adresse" value="<?php echo $row_patient['adresse']; ?>" required>

            <label for="telephone">Téléphone :</label>
            <input type="text" id="telephone" name="telephone" value="<?php echo $row_patient['telephone']; ?>"
                required>

            <label for="email">Email :</label>
            <input type="email" id="email" name="email" value="<?php echo $row_patient['email']; ?>" required>

            <button type="submit" name="modifier">Modifier</button>
        </form>
    </div>

</body>

</html>