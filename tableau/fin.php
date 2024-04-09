<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Rendez-vous</title>
    <link rel="stylesheet" href="../phpcss/fin.css">
</head>

<body>
    <div class="form-container">
        <h2>Ajouter un Rendez-vous</h2>
        <form action="refin.php" method="post">
            <label for="patient">Patient :</label>
            <select name="patient" id="patient" required>
                <option value="">Sélectionner un patient</option>
                <?php
                    include('connexion.php');
                    $query = "SELECT id, nom, prenom FROM patient";
                    $result = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<option value='".$row['id']."'>".$row['nom']." ".$row['prenom']."</option>";
                    }
                ?>
            </select>

            <label for="service">Service :</label>
            <select name="service" id="service" required>
                <option value="">Sélectionner un service</option>
                <?php
                    $query = "SELECT id, nom_service FROM service";
                    $result = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<option value='".$row['id']."'>".$row['nom_service']."</option>";
                    }
                ?>
            </select>

            <label for="date_rendez_vous">Date du Rendez-vous :</label>
            <input type="date" id="date_rendez_vous" name="date_rendez_vous" required>

            <label for="heure_rendez_vous">Heure du Rendez-vous :</label>
            <input type="time" id="heure_rendez_vous" name="heure_rendez_vous" required>

            <input type="submit" name="ajouter_rendez_vous" value="Ajouter Rendez-vous">
        </form>
        <div class="cla">
            <p>
                <a href="rendez.php">Retour</a>
            </p>
        </div>
    </div>
</body>

</html>