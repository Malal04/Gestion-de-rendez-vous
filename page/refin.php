<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php
        include('connexion.php');

        if (isset($_POST['ajouter_rendez_vous'])) {

            $patient_id = $_POST['patient'];
            $service_id = $_POST['service'];
            $date_rendez_vous = $_POST['date_rendez_vous'];
            $heure_rendez_vous = $_POST['heure_rendez_vous'];

            $sql = "INSERT INTO rendez_vous (patient_id, service_id, date_rendez_vous, heure_rendez_vous, status)
                    VALUES ('$patient_id', '$service_id', '$date_rendez_vous', '$heure_rendez_vous', 'planifie')";

            if (mysqli_query($conn, $sql)) {
            header("Location: patientd.php");
            }
        }
    ?>


</body>

</html>