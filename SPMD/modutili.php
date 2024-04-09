<?php
include('connexion.php');

if(isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql_info_utilisateur = "SELECT * FROM users WHERE id = $id";
    $result_info_utilisateur = mysqli_query($conn, $sql_info_utilisateur);

    if(mysqli_num_rows($result_info_utilisateur) == 1) {
        $row_utilisateur = mysqli_fetch_assoc($result_info_utilisateur);

        if(isset($_POST['modifier'])) {
            $id = $_POST['id'];
            $nom_utilisateur = $_POST['nom_utilisateur'];
            $email = $_POST['email'];
            $motdepasse = $_POST['motdepasse'];
            $role = $_POST['role'];

            $sql_update = "UPDATE users SET nom_utilisateur = '$nom_utilisateur', Email = '$email', motdepasse = '$motdepasse', role = '$role' WHERE id = $id";

            if(mysqli_query($conn, $sql_update)) {
                echo "Utilisateur ID $id mis à jour avec succès.<br>";
                header("Location: ../tableau/usurs.php");
                exit();
            } else {
                echo "Erreur lors de la mise à jour de l'utilisateur ID $id : " . mysqli_error($conn) . "<br>";
            }
        }
    } else {
        echo "Utilisateur non trouvé.";
    }
} else {
    echo "ID de l'utilisateur non spécifié.";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Utilisateur</title>
    <link rel="stylesheet" href="modutili.css">
</head>

<body>
    <div class="retour">
        <p>
            <a href="../tableau/usurs.php">Retour</a>
        </p>
    </div>

    <div class="container">

        <h1>Modifier Utilisateur</h1>

        <form method="POST">
            <input type="hidden" name="id" value="<?php echo $row_utilisateur['id']; ?>">
            <label for="nom_utilisateur">Nom Utilisateur :</label>
            <input type="text" id="nom_utilisateur" name="nom_utilisateur"
                value="<?php echo $row_utilisateur['nom_utilisateur']; ?>" required>

            <label for="email">Email :</label>
            <input type="email" id="email" name="email" value="<?php echo $row_utilisateur['Email']; ?>" required>

            <label for="motdepasse">Mot de Passe :</label>
            <input type="password" id="motdepasse" name="motdepasse"
                value="<?php echo $row_utilisateur['motdepasse']; ?>" required>

            <label for="role">Role :</label>
            <input type="text" id="role" name="role" value="<?php echo $row_utilisateur['role']; ?>" required>

            <button type="submit" name="modifier">Modifier</button>
        </form>
    </div>

</body>

</html>