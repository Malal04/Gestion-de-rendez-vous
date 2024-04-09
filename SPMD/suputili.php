<?php

    include('connexion.php');

    $id_utilisateur = $_GET['id'];

    $sql = "DELETE FROM users WHERE id = $id_utilisateur";

    if(mysqli_query($conn, $sql)) {
        echo "Utilisateur supprimé avec succès.";

        header("Location: ../tableau/usurs.php");
    } else {
        echo "Erreur lors de la suppression de l'utilisateur: " . mysqli_error($conn);
    }

?>