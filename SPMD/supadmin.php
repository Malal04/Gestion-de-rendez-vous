<?php
    include('connexion.php');

     $id_rendezvous = $_GET['id'];

        $sql_supprimer_rendezvous = "DELETE FROM rendez_vous WHERE id = $id_rendezvous";

        if(mysqli_query($conn, $sql_supprimer_rendezvous)) {
            echo "Rendez-vous supprimé avec succès.";

            header("Location: ../tableau/admin.php");
        } else {
            echo "Erreur lors de la suppression du rendez-vous: " . mysqli_error($conn);
        }

?>