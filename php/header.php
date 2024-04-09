<?php
session_start();
include('connexion.php');

if(isset($_POST['submit'])) {
    $nom_utilisateur = $_POST['nom_utilisateur'];
    $mot_de_passe = $_POST['mot_de_passe'];

    $sql = "SELECT * FROM users WHERE nom_utilisateur = '$nom_utilisateur' AND motdepasse = '$mot_de_passe' AND role = 'medecin'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) == 1) {
    
        $_SESSION['medecin_connecte'] = true;
        $_SESSION['medecin_id'] = mysqli_fetch_assoc($result)['id'];
        header("Location: ../page/medecin.php");
        exit();
    } else {

        $erreur = "Nom d'utilisateur ou mot de passe incorrect.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion Médecin</title>
    <link rel="stylesheet" href="../phpcss/malal.css">
</head>

<body>
    <div class="retour">
        <p><a href="../php/dex.php">Retour</a></p>
    </div>
    <div class="container">
        <h1>Connexion Médecin</h1>
        <form action="" method="POST">
            <label for="nom_utilisateur">Nom d'utilisateur :</label>
            <input type="text" id="nom_utilisateur" name="nom_utilisateur" required>

            <label for="mot_de_passe">Mot de passe :</label>
            <input type="password" id="mot_de_passe" name="mot_de_passe" required>

            <button type="submit" name="submit">Se Connecter</button>
        </form>

        <?php
        if(isset($erreur)) {
            echo "<p class='erreur'>$erreur</p>";
        }
        ?>
    </div>

</body>

</html>