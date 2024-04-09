<?php
include('connexion.php');

if(isset($_GET['id'])) {
    $id_rendezvous = $_GET['id'];

    $sql_info_rendezvous = "SELECT * FROM rendez_vous WHERE id = $id_rendezvous";
    $result_info_rendezvous = mysqli_query($conn, $sql_info_rendezvous);

    if(mysqli_num_rows($result_info_rendezvous) == 1) {
        $row_rendezvous = mysqli_fetch_assoc($result_info_rendezvous);

        if(isset($_POST['modifier_rendezvous'])) {
            $nouvelle_date = $_POST['nouvelle_date'];
            $nouvelle_heure = $_POST['nouvelle_heure'];
            $nouveau_status = $_POST['nouveau_status'];

            $sql_update_rendezvous = "UPDATE rendez_vous SET date_rendez_vous = '$nouvelle_date',
                heure_rendez_vous = '$nouvelle_heure', status = '$nouveau_status' WHERE id = $id_rendezvous";

            if(mysqli_query($conn, $sql_update_rendezvous)) {
                echo "Rendez-vous mis à jour avec succès.";

                header("Location: ../tableau/admin.php");
            } else {
                echo "Erreur lors de la mise à jour du rendez-vous: " . mysqli_error($conn);
            }
        }
    } else {
        echo "Rendez-vous non trouvé.";
    }
} else {
    echo "ID du rendez-vous non spécifié.";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Rendez-vous</title>
    <link rel="stylesheet" href="modadmin.css">
</head>

<body>
    <div class="retour">
        <p><a href="../tableau/admin.php">Retour</a></p>
    </div>
    <div class="container">

        <h1>Modifier Rendez-vous</h1>

        <form action="" method="POST">
            <label for="nouvelle_date">Nouvelle Date :</label>
            <input type="date" id="nouvelle_date" name="nouvelle_date"
                value="<?php echo $row_rendezvous['date_rendez_vous']; ?>" required>

            <label for="nouvelle_heure">Nouvelle Heure:</label>
            <input type="Time" id="nouvelle_heure" name="nouvelle_heure"
                value="<?php echo $row_rendezvous['heure_rendez_vous']; ?>" required>

            <label for="nouveau_status">Nouveau Status :</label>
            <select name="nouveau_status" id="nouveau_status" required>
                <option value="planifie" <?php if($row_rendezvous['status'] == 'planifie') echo 'selected'; ?>>Planifié
                </option>
                <option value="en_cours" <?php if($row_rendezvous['status'] == 'en_cours') echo 'selected'; ?>>En Cours
                </option>
                <option value="termine" <?php if($row_rendezvous['status'] == 'termine') echo 'selected'; ?>>Terminé
                </option>
                <option value="annule" <?php if($row_rendezvous['status'] == 'annule') echo 'selected'; ?>>Annulé
                </option>
            </select>

            <button type="submit" name="modifier_rendezvous">Modifier</button>
        </form>

    </div>

</body>

</html>