<?php
include('connexion.php');

if(isset($_GET['id'])) {
    $id_service = $_GET['id'];

    $sql_service = "SELECT * FROM service WHERE id = $id_service";
    $result_service = mysqli_query($conn, $sql_service);

    if(mysqli_num_rows($result_service) == 1) {
        $row_service = mysqli_fetch_assoc($result_service);

        if(isset($_POST['modifier_service'])) {
            $nom_service = $_POST['nom_service'];
            $description = $_POST['Medecin'];

            $sql_update_service = "UPDATE service SET nom_service = '$nom_service', NomDR = '$description' WHERE id = $id_service";

            if(mysqli_query($conn, $sql_update_service)) {
                echo "Le service a été mis à jour avec succès.";
                header("Location: ../tableau/service.php");
            } else {
                echo "Erreur lors de la mise à jour du service : " . mysqli_error($conn);
            }
        }
    } else {
        echo "Service non trouvé.";
    }
} else {
    echo "ID du service non spécifié.";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un Service</title>
    <link rel="stylesheet" href="../phpcss/serv.css">
</head>

<body>
    <div class="retour">
        <p><a href="../tableau/service.php">Retour</a></p>
    </div>
    <div class="container">

        <form action="" method="POST">
            <h1>Modifier un Service</h1>
            <label for="nom_service">Nom du Service :</label>
            <input type="text" id="nom_service" name="nom_service" value="<?php echo $row_service['nom_service']; ?>"
                required>

            <label for="description">Médecin :</label>
            <input type="text" id="description" name="Medecin" value="<?php echo $row_service['NomDR']; ?>" required>

            <button type="submit" name="modifier_service">Modifier le Service</button>
        </form>
    </div>

</body>

</html>