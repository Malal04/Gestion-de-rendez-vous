<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Rendez-vous</title>
    <link rel="stylesheet" href="../phpcss/rendezta.css">
</head>

<body>

    <header class="header">
        <div class="container">
            <div class="main">
                <h1>Liste des Rendez-vous</h1>
                <div class="group">
                    <div class="btn-group">
                        <a href="../php/Deconnexion.php">Déconnexion</a>
                    </div>
                    <div class="btn-group">
                        <a href="admin.php">Retour</a>
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
                    <th>ID</th>
                    <th>Nom Patient</th>
                    <th>Prénom Patient</th>
                    <th>Date Rendez-vous</th>
                    <th>Heure Rendez-vous</th>
                    <th>Nom Service</th>
                    <th>Médecin</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                <?php
                include('connexion.php');

                if(isset($_GET['search'])) {
                    $search_query = $_GET['search'];

                    $sql = "SELECT rendez_vous.id, patient.nom, patient.prenom,
                            rendez_vous.date_rendez_vous, rendez_vous.heure_rendez_vous,
                            service.nom_service, service.NomDR, rendez_vous.status
                            FROM rendez_vous
                            INNER JOIN patient ON rendez_vous.patient_id = patient.id
                            INNER JOIN service ON rendez_vous.service_id = service.id
                            WHERE patient.nom LIKE '%$search_query%'
                            OR patient.prenom LIKE '%$search_query%'
                            OR rendez_vous.date_rendez_vous LIKE '%$search_query%'
                            OR service.nom_service LIKE '%$search_query%'
                            OR rendez_vous.status LIKE '%$search_query%'";

                } else {

                    $sql = "SELECT rendez_vous.id, patient.nom, patient.prenom,
                            rendez_vous.date_rendez_vous, rendez_vous.heure_rendez_vous,
                            service.nom_service, service.NomDR, rendez_vous.status
                            FROM rendez_vous
                            INNER JOIN patient ON rendez_vous.patient_id = patient.id
                            INNER JOIN service ON rendez_vous.service_id = service.id";
                }

                $resultat = mysqli_query($conn, $sql);

                if (mysqli_num_rows($resultat) > 0) {
                    while ($result = mysqli_fetch_assoc($resultat)) {
                        echo '<tr>';
                        echo "<td>".$result['id']."</td>";
                        echo "<td>".$result['nom']."</td>";
                        echo "<td>".$result['prenom']."</td>";
                        echo "<td>".$result['date_rendez_vous']."</td>";
                        echo "<td>".$result['heure_rendez_vous']."</td>";
                        echo "<td>".$result['nom_service']."</td>";
                        echo "<td>".$result['NomDR']."</td>";
                        echo "<td>".$result['status']."</td>";
                        echo "<td><a href=\"../SPMD/modadmin.php?id=".$result['id']."\"onClick=\"return confirm('Etes vous sur ?')\">Modifier</a> |
                            <a href=\"../SPMD/supadmin.php?id=".$result['id']."\"onClick=\"return confirm('Etes vous sur ?')\">Supprimer</a></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='9'>Aucun rendez-vous trouvé.</td></tr>";
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