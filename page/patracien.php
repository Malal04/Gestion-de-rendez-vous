<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vous êtes praticien ?</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Poppins:wght@700;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="../css/body.css">
    <link rel="stylesheet" href="../phpcss/patracien.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
</head>

<body>

    <header class="header">
        <div class="container">
            <div class="main">
                <img src="../image/Group 1.svg" alt="logo" class="img">
                <ul class="main-li">
                    <li><a href="../php/dex.php">ACCUEIL</a></li>
                    <li><a href="sevice.php">SERVICES</a></li>
                    <li>
                        <a href="../php/pat.php">MES RENDEZ-VOUS</a>
                    </li>
                    <li><a href="patracien.php" class="a">Vous êtes praticien ?</a></li>
                    <li><a href="../php/Deconnexion.php" class="a">DECONNEXION</a></li>
                </ul>
            </div>
        </div>
    </header>

    <main class="ma">
        <div class="patracien">
            <div class="container">
                <h1 class="animate__animated animate__bounceInLeft">Vous êtes praticien ?</h1>
            </div>
        </div>

        <div class="container">

            <section class="solutions">
                <h2>Solutions de soins durables dans notre clinique</h2>
                <div class="solutione">
                    <div class="solution animate__animated animate__fadeIn">
                        <img src="../image/salle d'attente  verte.jpg" alt="Salle d'attente verte">
                        <h3>Salle d'attente verte</h3>
                        <p>Créer une salle d'attente avec des plantes pour améliorer la qualité de l'air et réduire le
                            stress des patients.</p>
                    </div>
                    <div class="solution animate__animated animate__fadeIn">
                        <img src="../image/Utilisation de matériaux recyclés.jpg"
                            alt="Utilisation de matériaux recyclés">
                        <h3>Utilisation de matériaux recyclés</h3>
                        <p>Utiliser des matériaux recyclés pour les fournitures de bureau et les équipements médicaux
                            pour réduire notre empreinte écologique.</p>
                    </div>
                    <div class="solution animate__animated animate__fadeIn">
                        <img src="../image/Transport éco-responsable.jpg" alt="Transport éco-responsable">
                        <h3>Transport éco-responsable</h3>
                        <p>Encourager le covoiturage et offrir des services de navette éco-responsables pour nos
                            patients et le personnel.</p>
                    </div>
                    <div class="solution animate__animated animate__fadeIn">
                        <img src="../image/Électronique sans papier.jpg" alt="Électronique sans papier">
                        <h3>Électronique sans papier</h3>
                        <p>Passer à une documentation médicale électronique pour réduire l'utilisation de papier et
                            faciliter l'accès aux dossiers des patients.</p>
                    </div>
                    <div class="solution animate__animated animate__fadeIn">
                        <img src="../image/Repas sains pour patients.jpg" alt="Repas sains pour patients">
                        <h3>Repas sains pour patients</h3>
                        <p>Offrir des repas sains et équilibrés préparés à partir d'ingrédients locaux pour favoriser la
                            guérison et le bien-être des patients.</p>
                    </div>
                    <div class="solution animate__animated animate__fadeIn">
                        <img src="../image/Thérapies alternatives.jpg" alt="Thérapies alternatives">
                        <h3>Thérapies alternatives</h3>
                        <p>Intégrer des thérapies alternatives telles que l'acupuncture, la méditation et la yoga pour
                            compléter les soins médicaux traditionnels.</p>
                    </div>
                </div>
            </section>

            <section class="contact-form animate__animated animate__fadeIn">
                <h2>Contactez-nous</h2>
                <div class="form-container">
                    <img src="../image/contact.webp" alt="Contact Image" class="form-image">
                    <form action="" method="POST">
                        <input type="text" name="name" placeholder="Nom" required>
                        <input type="email" name="email" placeholder="Email" required>
                        <textarea name="message" placeholder="Votre message" required></textarea>
                        <button type="submit">Envoyer</button>
                    </form>
                </div>
            </section>

        </div>
    </main>

    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-col">
                    <h4>Liens utiles</h4>
                    <ul>
                        <li><a href="#">Accueil</a></li>
                        <li><a href="#services">Services</a></li>
                        <li>
                            <a href="#">Vous êtes praticien ?</a>
                        </li>
                        <li><a href="#">CONNEXION</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Services</h4>
                    <ul>
                        <li><a href="#">Dentisterie</a></li>
                        <li><a href="#">Cardiologie</a></li>
                        <li><a href="#">Neurologie</a></li>
                        <li><a href="#">Gynécologie</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Contactez-nous</h4>
                    <ul>
                        <li>Keur Massar Sedima</li>
                        <li>Dakar, Sénégal</li>
                        <li><a href="tel:784507413">+221 784507413</a></li>
                        <li><a href="mailto:contact@example.com">contact@example.com</a></li>
                    </ul>
                </div>
                <a href="#top" class="go-top animate__animated animate__fadeIn">Haut de page</a>
            </div>
            <p class="animate__animated animate__fadeIn">© 2024 Clinique Médicale. Tous droits réservés.</p>
        </div>
    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="../js/patracien.js"></script>
</body>

</html>