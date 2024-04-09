<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Patients, Services et Rendez-vous</title>
    <link rel="stylesheet" href="../phpcss/admin.css">
</head>

<body>

    <header class="header">
        <div class="container">
            <div class="main">
                <h1>Liste des Patients, Services et Rendez-vous</h1>
                <div class="group">
                    <div class="btn">
                        <a href="usurs.php">Liste des Utilateurs</a>
                    </div>
                    <div class="btn">
                        <a href="patient.php">Liste des Patients</a>
                    </div>
                    <div class="btn">
                        <a href="rendez.php">Liste des Rendez-vous</a>
                    </div>
                    <div class="btn">
                        <a href="service.php">Liste des service</a>
                    </div>
                    <div class="btn">
                        <a href="../php/Deconnexion.php">Déconnexion</a>
                    </div>
                </div>
                <div class="search-container">
                    <form action="" method="GET">
                        <input type="text" placeholder="Rechercher..." name="search" class="search-input">
                        <button type="submit" class="search-button">Rechercher</button>
                    </form>
                </div>

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
                    <th>Date Naissance</th>
                    <th>Adresse Patient</th>
                    <th>Téléphone Patient</th>
                    <th>Email Patient</th>
                    <th>Nom Service</th>
                    <th>Médecin</th>
                    <th>Date Rendez-vous</th>
                    <th>Heure Rendez-vous</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                <?php
                include('connexion.php');

                if(isset($_GET['search'])) {
                    $search_query = $_GET['search'];

                    $sql = "SELECT rendez_vous.id AS id_rendezvous,
                            patient.id AS id_patient, patient.nom AS nom_patient, patient.prenom AS prenom_patient,
                            patient.datenaissance, patient.adresse, patient.telephone, patient.email,
                            service.nom_service, service.NomDR,
                            rendez_vous.date_rendez_vous, rendez_vous.heure_rendez_vous, rendez_vous.status
                            FROM rendez_vous
                            INNER JOIN patient ON rendez_vous.patient_id = patient.id
                            INNER JOIN service ON rendez_vous.service_id = service.id
                            WHERE patient.nom LIKE '%$search_query%'
                            OR patient.prenom LIKE '%$search_query%'
                            OR rendez_vous.date_rendez_vous LIKE '%$search_query%'
                            OR service.nom_service LIKE '%$search_query%'
                            OR rendez_vous.status LIKE '%$search_query%'";

                } else {

                    $sql = "SELECT rendez_vous.id AS id_rendezvous,
                            patient.id AS id_patient, patient.nom AS nom_patient, patient.prenom AS prenom_patient,
                            patient.datenaissance, patient.adresse, patient.telephone, patient.email,
                            service.nom_service, service.NomDR,
                            rendez_vous.date_rendez_vous, rendez_vous.heure_rendez_vous, rendez_vous.status
                            FROM rendez_vous
                            INNER JOIN patient ON rendez_vous.patient_id = patient.id
                            INNER JOIN service ON rendez_vous.service_id = service.id";
                }

                $resultat = mysqli_query($conn, $sql);

                if (mysqli_num_rows($resultat) > 0) {
                    while ($result = mysqli_fetch_assoc($resultat)) {
                        echo '<tr>';
                        echo "<td>".$result['id_rendezvous']."</td>";
                        echo "<td>".$result['nom_patient']."</td>";
                        echo "<td>".$result['prenom_patient']."</td>";
                        echo "<td>".$result['datenaissance']."</td>";
                        echo "<td>".$result['adresse']."</td>";
                        echo "<td>".$result['telephone']."</td>";
                        echo "<td>".$result['email']."</td>";
                        echo "<td>".$result['nom_service']."</td>";
                        echo "<td>".$result['NomDR']."</td>";
                        echo "<td>".$result['date_rendez_vous']."</td>";
                        echo "<td>".$result['heure_rendez_vous']."</td>";
                        echo "<td>".$result['status']."</td>";
                        echo "<td><a href=\"../SPMD/modadmin.php?id=".$result['id_rendezvous']."\"onClick=\"return confirm('Etes vous sur ?')\">Modifier</a> |
                            <a href=\"../SPMD/supadmin.php?id=".$result['id_rendezvous']."\"onClick=\"return confirm('Etes vous sur ?')\">Supprimer</a></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='13'>Aucun rendez-vous trouvé.</td></tr>";
                }

                ?>
            </tbody>
        </table>
        <div class="btn-group">
            <a href="fin.php">Ajouter un Rendez-vous</a>
        </div>
    </div>

</body>

</html>