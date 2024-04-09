<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Patients</title>
    <link rel="stylesheet" href="../phpcss/header.css">
    <link rel="stylesheet" href="../phpcss/admin.css">
</head>

<body>

    <header class="header">
        <div class="container">
            <div class="main">
                <h1>Liste des Patients</h1>
                <div class="btn-group">
                    <a href="admin.php">Retour</a>
                </div>
                <div class="btn-group">
                    <a href="../php/Deconnexion.php">Deconnexion</a>
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
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Date de Naissance</th>
                    <th>Adresse</th>
                    <th>Téléphone</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                <?php
                include('connexion.php');

                if(isset($_GET['search'])) {
                    $search_query = $_GET['search'];

                    $sql = "SELECT *
                            FROM patient
                            WHERE nom LIKE '%$search_query%'
                            OR prenom LIKE '%$search_query%'
                            OR email LIKE '%$search_query%'
                            OR telephone LIKE '%$search_query%'";

                } else {

                    $sql = "SELECT *
                            FROM patient";
                }

                $resultat = mysqli_query($conn, $sql);

                if (mysqli_num_rows($resultat) > 0) {
                    while ($result = mysqli_fetch_assoc($resultat)) {
                        echo '<tr>';
                        echo "<td>".$result['id']."</td>";
                        echo "<td>".$result['nom']."</td>";
                        echo "<td>".$result['prenom']."</td>";
                        echo "<td>".$result['datenaissance']."</td>";
                        echo "<td>".$result['adresse']."</td>";
                        echo "<td>".$result['telephone']."</td>";
                        echo "<td>".$result['email']."</td>";
                        echo "<td><a href=\"../SPMD/modpatient.php?id=".$result['id']."\"onClick=\"return confirm('Etes vous sur ?')\">Modifier</a> |
                            <a href=\"../SPMD/suppatient.php?id=".$result['id']."\"onClick=\"return confirm('Etes vous sur ?')\">Supprimer</a></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='8'>Aucun patient trouvé.</td></tr>";
                }

                ?>
            </tbody>
        </table>
        <div class="btn-group">
            <a href="Rendeza.php">Ajouter un Patient</a>
        </div>
    </div>

</body>

</html>