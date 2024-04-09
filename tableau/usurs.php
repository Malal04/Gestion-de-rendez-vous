<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Utilisateurs</title>
    <link rel="stylesheet" href="../phpcss/header.css">
    <link rel="stylesheet" href="../phpcss/admin.css">
</head>

<body>

    <header class="header">
        <div class="container">
            <div class="main">
                <h1>Liste des Utilisateurs</h1>
                <div class="btn-group">
                    <a href="admin.php">Retour</a>
                </div>
                <div class="btn-group">
                    <a href="../php/Deconnexion.php">Déconnexion</a>
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
                    <th>Email</th>
                    <th>Mot de passe</th>
                    <th>Role</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                <?php
                include('connexion.php');

                if(isset($_GET['search'])) {
                    $search_query = $_GET['search'];

                    $sql = "SELECT id, nom_utilisateur, Email, motdepassse, role
                            FROM users
                            WHERE nom LIKE '%$search_query%'
                            OR Email LIKE '%$search_query%'";

                } else {

                    $sql = "SELECT id, nom_utilisateur, Email, motdepasse, role
                            FROM users";
                }

                $resultat = mysqli_query($conn, $sql);

                if (mysqli_num_rows($resultat) > 0) {
                    while ($result = mysqli_fetch_assoc($resultat)) {
                        echo '<tr>';
                        echo "<td>".$result['id']."</td>";
                        echo "<td>".$result['nom_utilisateur']."</td>";
                        echo "<td>".$result['Email']."</td>";
                        echo "<td>".$result['motdepasse']."</td>";
                        echo "<td>".$result['role']."</td>";
                        echo "<td><a href=\"../SPMD/modutili.php?id=".$result['id']."&type=".$result['role']."\"onClick=\"return confirm('Etes vous sur ?')\">Modifier</a> |
                            <a href=\"../SPMD/suputili.php?id=".$result['id']."&type=".$result['role']."\"onClick=\"return confirm('Etes vous sur ?')\">Supprimer</a></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>Aucun utilisateur trouvé.</td></tr>";
                }

                ?>
            </tbody>
        </table>
        <div class="btn-group">
            <a href="inscrire.php">Ajouter un Utilisateur</a>
        </div>
    </div>

</body>

</html>