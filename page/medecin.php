<?php
session_start();
if(!isset($_SESSION['medecin_connecte'])) {
    header("Location: ../php/header.php");
    exit();
}

include('connexion.php');

$medecin_id = $_SESSION['medecin_id'];

$sql_patients = "SELECT * FROM patient";

$resultat_patients = mysqli_query($conn, $sql_patients);


$sql_rendezvous = "SELECT rendez_vous.id, patient.nom AS nom_patient, patient.prenom AS prenom_patient,
                    rendez_vous.date_rendez_vous, rendez_vous.heure_rendez_vous, rendez_vous.status, service.nom_service
                    FROM rendez_vous
                    INNER JOIN patient ON rendez_vous.patient_id = patient.id
                    INNER JOIN service ON rendez_vous.service_id = service.id
                    WHERE rendez_vous.medecin_id = $medecin_id";

$resultat_rendezvous = mysqli_query($conn, $sql_rendezvous);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Patients et Rendez-vous</title>
    <link rel="stylesheet" href="../phpcss/malal.css">
</head>

<body>

    <div class="container">
        <h1>Liste des Patients et Rendez-vous</h1>

        <h2>Liste des Patients</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Date de Naissance</th>
                    <th>Adresse</th>
                    <th>Téléphone</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while($row_patient = mysqli_fetch_assoc($resultat_patients)) {
                    echo "<tr>";
                    echo "<td>".$row_patient['id']."</td>";
                    echo "<td>".$row_patient['nom']."</td>";
                    echo "<td>".$row_patient['prenom']."</td>";
                    echo "<td>".$row_patient['datenaissance']."</td>";
                    echo "<td>".$row_patient['adresse']."</td>";
                    echo "<td>".$row_patient['telephone']."</td>";
                    echo "<td>".$row_patient['email']."</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>

        <h2>Liste des Rendez-vous</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom Patient</th>
                    <th>Prénom Patient</th>
                    <th>Nom Service</th>
                    <th>Date Rendez-vous</th>
                    <th>Heure Rendez-vous</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while($row_rendezvous = mysqli_fetch_assoc($resultat_rendezvous)) {
                    echo "<tr>";
                    echo "<td>".$row_rendezvous['id']."</td>";
                    echo "<td>".$row_rendezvous['nom_patient']."</td>";
                    echo "<td>".$row_rendezvous['prenom_patient']."</td>";
                    echo "<td>".$row_rendezvous['nom_service']."</td>";
                    echo "<td>".$row_rendezvous['date_rendez_vous']."</td>";
                    echo "<td>".$row_rendezvous['heure_rendez_vous']."</td>";
                    echo "<td>".$row_rendezvous['status']."</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
        <div class="logout">
            <a href="Deconnexion.php">Se Déconnecter</a>
        </div>
    </div>

</body>

</html>