<?php
session_start();
if (!isset($_SESSION['patient_connecte'])) {
    header("Location: ../php/patient.php");
    exit();
}

include('connexion.php');

$patient_id = $_SESSION['patient'];

if(isset($_POST['ajouter_rendezvous'])) {
    $service_id = $_POST['service'];
    $date_rendezvous = $_POST['date_rendezvous'];
    $heure_rendezvous = $_POST['heure_rendezvous'];
    $status = 'planifie';

    $sql_insert_rendezvous = "INSERT INTO rendez_vous (patient, service_id, date_rendez_vous, heure_rendez_vous, status)
                              VALUES ($patient_id, $service_id, '$date_rendezvous', '$heure_rendezvous', '$status')";

    if(mysqli_query($conn, $sql_insert_rendezvous)) {
        echo "Le rendez-vous a été ajouté avec succès.";
        header("Location: ../page/patientd.php");
    } else {
        echo "Erreur lors de l'ajout du rendez-vous : " . mysqli_error($conn);
    }
}

$sql_services = "SELECT * FROM service";
$result_services = mysqli_query($conn, $sql_services);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Rendez-vous</title>
    <link rel="stylesheet" href="../phpcss/malal.css">
</head>

<body>

    <div class="container">
        <h1>Ajouter un Rendez-vous</h1>

        <form action="" method="POST">
            <div class="form-group">
                <label for="service">Choisir un Service :</label>
                <select name="service" id="service" required>
                    <option value="" selected disabled>Choisir un service</option>
                    <?php
                    while ($row_service = mysqli_fetch_assoc($result_services)) {
                        echo "<option value='" . $row_service['id'] . "'>" . $row_service['nom_service'] . "</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label for="date_rendezvous">Date du Rendez-vous :</label>
                <input type="date" id="date_rendezvous" name="date_rendezvous" required>
            </div>

            <div class="form-group">
                <label for="heure_rendezvous">Heure du Rendez-vous :</label>
                <input type="time" id="heure_rendezvous" name="heure_rendezvous" required>
            </div>

            <button type="submit" name="ajouter_rendezvous">Ajouter le Rendez-vous</button>
        </form>

        <div class="btn-group">
            <a href="../page/patientd.php">Retour à la Liste des Rendez-vous</a>
        </div>
        <div class="logout">
            <a href="../php/dex.php">Se Déconnecter</a>
        </div>
    </div>

</body>

</html>