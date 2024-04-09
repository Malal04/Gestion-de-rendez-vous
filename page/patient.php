<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vos Rendez-vous</title>
    <link rel="stylesheet" href="../phpcss/admin.css">
</head>

<body>

    <header class="header">
        <div class="container">
            <div class="main">
                <h1>Vos Rendez-vous</h1>

                <form action="" method="GET">
                    <input type="text" placeholder="Rechercher..." name="search" class="search-input">
                    <button type="submit" class="search-button">Rechercher</button>
                </form>
            </div>
        </div>
    </header>

    <div class="table-wrapper">
        <table>
            <thead>
                <tr>
                    <th>ID Rendez-vous</th>
                    <th>Nom Patient</th>
                    <th>Prénom Patient</th>
                    <th>Nom Service</th>
                    <th>Description Service</th>
                    <th>Date Rendez-vous</th>
                    <th>Heure Rendez-vous</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                <?php
                include('connexion.php');

                $patient_id = 1;

                if(isset($_GET['search'])) {
                    $search_query = $_GET['search'];

                    $sql = "SELECT rendez_vous.id AS id_rendezvous,
                            patient.nom AS nom_patient, patient.prenom AS prenom_patient,
                            service.nom_service, service.NomDR AS description_service,
                            rendez_vous.date_rendez_vous, rendez_vous.heure_rendez_vous,
                            rendez_vous.status
                            FROM rendez_vous
                            INNER JOIN patient ON rendez_vous.patient_id = patient.id
                            INNER JOIN service ON rendez_vous.service_id = service.id
                            WHERE rendez_vous.patient_id = '$patient_id'
                            AND (patient.nom LIKE '%$search_query%'
                            OR patient.prenom LIKE '%$search_query%'
                            OR service.nom_service LIKE '%$search_query%'
                            OR rendez_vous.date_rendez_vous LIKE '%$search_query%'
                            OR rendez_vous.status LIKE '%$search_query%')";

                } else {

                    $sql = "SELECT rendez_vous.id AS id_rendezvous,
                            patient.nom AS nom_patient, patient.prenom AS prenom_patient,
                            service.nom_service, service.NomDR AS description_service,
                            rendez_vous.date_rendez_vous, rendez_vous.heure_rendez_vous,
                            rendez_vous.status
                            FROM rendez_vous
                            INNER JOIN patient ON rendez_vous.patient_id = patient.id
                            INNER JOIN service ON rendez_vous.service_id = service.id
                            WHERE rendez_vous.patient_id = '$patient_id'";
                }

                $resultat = mysqli_query($conn, $sql);

                if (mysqli_num_rows($resultat) > 0) {
                    while ($result = mysqli_fetch_assoc($resultat)) {
                        echo '<tr>';
                        echo "<td>".$result['id_rendezvous']."</td>";
                        echo "<td>".$result['nom_patient']."</td>";
                        echo "<td>".$result['prenom_patient']."</td>";
                        echo "<td>".$result['nom_service']."</td>";
                        echo "<td>".$result['description_service']."</td>";
                        echo "<td>".$result['date_rendez_vous']."</td>";
                        echo "<td>".$result['heure_rendez_vous']."</td>";
                        echo "<td>".$result['status']."</td>";
                        echo "<td><a href=\"modifier_rendezvous.php?id=".$result['id_rendezvous']."\">Modifier</a> |
                            <a href=\"supprimer_rendezvous.php?id=".$result['id_rendezvous']."\">Supprimer</a></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='9'>Aucun rendez-vous trouvé pour vous.</td></tr>";
                }

                ?>
            </tbody>
        </table>
        <div class="btn-group">
            <a href="#">Ajouter un Rendez-vous</a>
        </div>
    </div>

</body>

</html>