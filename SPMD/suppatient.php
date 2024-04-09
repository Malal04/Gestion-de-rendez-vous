<?php
        include('connexion.php');

        $id = $_GET['id'];

        $sql_supprimer = "DELETE FROM patient WHERE id = $id";

        if(mysqli_query($conn, $sql_supprimer)) {
            echo "Rendez-vous supprimé avec succès.";

            header("Location: ../tableau/patient.php");
        } else {
            echo "Erreur lors de la suppression du rendez-vous: " . mysqli_error($conn);
        }

?>