<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php

        include "connexion.php";

        if (isset($_POST['login'])) {

            $email = $_POST['email'];
            $password = $_POST['password'];

            $sql = "SELECT * FROM users WHERE Email = '$email' AND motdepasse = '$password'";

            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) == 1) {

                $user = mysqli_fetch_assoc($result);

                if ($user['role'] === 'admin') {

                    header("Location: ../tableau/admin.php");
                    exit();
                } elseif ($user['role'] === 'medecin') {

                    header("Location: dex.php");
                    exit();
                } elseif ($user['role'] === 'patient') {

                    header("Location: dex.php");
                    exit();
                } elseif ($user['role'] === 'Autre') {

                    header("Location: dex.php");
                    exit();
                } else {
                    header("Location: debut.php");
                    echo "Vous n'avez pas les autorisations nécessaires pour accéder.";
                }
            } else {
                header("Location: debut.php");
                echo "Adresse e-mail ou mot de passe incorrect.";
            }
        }

    ?>

</body>

</html>