<?php

        $host = "localhost";

        $user = "root";

        $password = "1234";

        $bd = "gestion_rendez";

        $conn =  mysqli_connect($host,$user, $password, $bd)
        or die("erreur de connexion".mysqli_errno($conn));

?>