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

        if (isset($_POST['button'])) {

            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $role = $_POST['role'];

            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            $sql = "INSERT INTO users (nom_utilisateur, Email, motdepasse, role)
                VALUES ('$username', '$email', '$hashed_password', '$role')";

            $result = mysqli_query($conn, $sql);

            header("Location: debut.php");
            exit();

        }

    ?>


</body>

</html>