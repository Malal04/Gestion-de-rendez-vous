<?php
    session_start();
    if (!isset($_SESSION['patient_connecte'])) {
        header("Location: ../php/patient.php");
        exit();
    }

    include('connexion.php');

    $patient_id = $_SESSION['patient'];


    $sql_rendezvous = "SELECT rendez_vous.id, rendez_vous.date_rendez_vous,rendez_vous.heure_rendez_vous,
                        rendez_vous.status, service.nom_service,service.NomDR,
                        patient.nom AS nom_patient, patient.prenom AS prenom_patient
                        FROM rendez_vous
                        INNER JOIN service ON rendez_vous.service_id = service.id
                        INNER JOIN patient ON rendez_vous.patient_id = patient.id
                        WHERE rendez_vous.patient_id = $patient_id";

    $sql_count = "SELECT COUNT(*) AS total_rendezvous FROM rendez_vous WHERE patient = $patient_id";

    $resultat_rendezvous = mysqli_query($conn, $sql_rendezvous);
    $result_count = mysqli_query($conn, $sql_count);
    $row_count = mysqli_fetch_assoc($result_count);
    $total_rendezvous = $row_count['total_rendezvous'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste de Vos Rendez-vous</title>
    <link rel="stylesheet" href="../phpcss/malal.css">
</head>

<body>

    <div class="container">
        <h1>Vos Rendez-vous</h1>

        <div class="info">
            <p>Nombre total de rendez-vous: <?php echo $total_rendezvous; ?></p>
        </div>

        <div class="search-container">
            <form method="POST">
                <input type="text" name="search" placeholder="Rechercher par nom du service...">
                <button type="submit" name="submit">Rechercher</button>
            </form>
        </div>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom Patient</th>
                    <th>Prénom Patient</th>
                    <th>Nom Service</th>
                    <th>Medecin</th>
                    <th>Date Rendez-vous</th>
                    <th>Heure Rendez-vous</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (isset($_POST['submit'])) {
                    $search = $_POST['search'];
                    $sql_rendezvous .= " AND service.nom_service LIKE '%$search%'";
                }

                $resultat_rendezvous = mysqli_query($conn, $sql_rendezvous);

                if (mysqli_num_rows($resultat_rendezvous) > 0) {
                    while ($row_rendezvous = mysqli_fetch_assoc($resultat_rendezvous)) {
                        echo "<tr>";
                        echo "<td>".$row_rendezvous['id']."</td>";
                        echo "<td>".$row_rendezvous['nom_patient']."</td>";
                        echo "<td>".$row_rendezvous['prenom_patient']."</td>";
                        echo "<td>".$row_rendezvous['nom_service']."</td>";
                        echo "<td>".$row_rendezvous['NomDR']."</td>";
                        echo "<td>".$row_rendezvous['date_rendez_vous']."</td>";
                        echo "<td>".$row_rendezvous['heure_rendez_vous']."</td>";
                        echo "<td>".$row_rendezvous['status']."</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>Aucun rendez-vous trouvé.</td></tr>";
                }
                ?>
            </tbody>
        </table>
        <div class="btn-group">
            <a href="rendezpa.php">Ajouter un Rendez-vous</a>
        </div>
        <div class="btn-group">
            <a href="aide.php">Voir les Rendez-vous</a>
        </div>
        <div class="logout">
            <a href="../php/dex.php">Se Déconnecter</a>
        </div>
    </div>

</body>

</html>