<?php
include('connexion.php');

$search_query = "";

if(isset($_GET['search'])) {
    $search_query = $_GET['search'];
}

$sql = "SELECT * FROM service WHERE nom_service LIKE '%$search_query%'";
$resultat = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Services</title>
    <link rel="stylesheet" href="../phpcss/ser.css">
</head>

<body>

    <h1>Liste des Services</h1>

    <div class="group">
        <div class="btn-group">
            <a href="../php/Deconnexion.php">Déconnexion</a>
        </div>
        <div class="btn-group">
            <a href="admin.php">Retour</a>
        </div>
    </div>

    <form action="" method="GET">
        <input type="text" name="search" placeholder="Rechercher par nom de service"
            value="<?php echo $search_query; ?>">
        <button type="submit">Rechercher</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom du Service</th>
                <th>Médecin</th>
                <th>Action</th>
        </thead>
        <tbody>
            <?php
            if (mysqli_num_rows($resultat) > 0) {
                while ($row = mysqli_fetch_assoc($resultat)) {
                    echo "<tr>";
                    echo "<td>".$row['id']."</td>";
                    echo "<td>".$row['nom_service']."</td>";
                    echo "<td>".$row['NomDR']."</td>";
                     echo "<td><a href=\"../SPMD/modservice.php?id=".$row['id']."\"onClick=\"return confirm('Etes vous sur ?')\">Modifier</a> |
                            <a href=\"../SPMD/supservice.php?id=".$row['id']."\"onClick=\"return confirm('Etes vous sur ?')\">Supprimer</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='3'>Aucun service trouvé.</td></tr>";
            }
            ?>
        </tbody>
    </table>
    <div class="btn-group">
        <a href="../php/service.php">Ajouter un Service</a>
    </div>
</body>

</html>