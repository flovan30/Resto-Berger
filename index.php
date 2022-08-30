<?php session_start() ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <!--CSS de la page d'acceuil-->
    <link rel="stylesheet" type="text/css" href="style/style.css" />
    <!--CSS de la NavBar-->
    <link rel="stylesheet" type="text/css" href="style/style_nav.css" />
    <!--Font de texte-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
        integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Resto-Berger-restaurant</title>
</head>


<!-- NavBar -->
<div class="nav">
    <ul>
        <!-- Logo -->
        <li>
            <img src="images/gaston_berger.png" class="logo" alt="logo resto-berger">
        </li>

        <!-- Lien vers l'accueil -->
        <li>
            <a href="index.php">
                <div class="icon">
                    <i class="fas fa-home" aria-hidden="true"></i>
                    <i class="fas fa-home" aria-hidden="true"></i>
                </div>
                <div class="name"><span data-text="Accueil">Accueil</span></div>
            </a>
        </li>

        <!-- Lien vers le menu -->
        <li>
            <a href="menu.php">
                <div class="icon">
                    <i class="fas fa-utensils"></i>
                    <i class="fas fa-utensils"></i>
                </div>
                <div class="name"><span data-text="Menu">Menu</span></div>
            </a>
        </li>

        <!-- Lien vers la reservation -->
        <li>
            <a href="reservation.php">
                <div class="icon">
                    <i class="fas fa-concierge-bell"></i>
                    <i class="fas fa-concierge-bell"></i>
                </div>
                <div class="name"><span data-text="Réservation">Réservation</span></div>
            </a>
        </li>

        <!-- Lien vers la page de contact -->
        <li>
            <a href="Contact.php">
                <div class="icon">
                    <i class="fas fa-id-card"></i>
                    <i class="fas fa-id-card"></i>
                </div>
                <div class="name"><span data-text="Contact">Contact</span></div>
            </a>
        </li>

        <?php
    if(!empty($_SESSION['username']) && $_SESSION['admin?'] == 1){
?>
        <!-- Lien vers le profil si utilisateur connecté admin-->
        <li>
            <a href="PageAdmin.php">
                <div class="icon">
                    <i class="fas fa-gear"></i>
                    <i class="fas fa-gear"></i>
                </div>
                <div class="name"><span data-text="ADMIN">ADMIN</span></div>
            </a>
        </li>
        <?php
    }
    else if(!empty($_SESSION['username']) && $_SESSION['admin?'] == 0){
        ?>
        <!-- Lien vers le profil si utilisateur connecté non-admin-->
        <li>
            <a href="profile.php">
                <div class="icon">
                    <i class="fas fa-user"></i>
                    <i class="fas fa-user"></i>
                </div>
                <div class="name"><span data-text="Profile">Mon_Profile</span></div>
            </a>
        </li>
        <?php
    }
    else{
?>
        <!-- Lien vers la connexion si utilisateur pas connecté-->
        <li>
            <a href="connexion.php">
                <div class="icon">
                    <i class='fas fa-key'></i>
                    <i class='fas fa-key'></i>
                </div>
                <div class="name"><span data-text="Connexion">Connexion</span></div>
            </a>
        </li>
        <?php
    }
?>


    </ul>
    <br><br><br><br><br><br><br><br><br><br>
</div>

<body>
    <header>
        <h1 class="title_resto-berger"><span class="orange">Resto</span>-<span class="rouge">Berger</span></h1>
        <h4 class="subtitle_resto-berger">Bienvenue sur le restaurant d'application Gaston Berger</h4>
    </header>
    <main>
        <div class="content">
            <div class="card">
                <div class="left">
                    <h1><span class="orange">Restaurant</span></h1>
                    <p>Bienvenue sur le site du restaurant d'application <span class="orange">Resto</span>-<span
                            class="rouge">Berger</span> du campus de Gaston Berger, en partenariat avec le lycée
                        hôtelier de
                        lille.<br>
                        Le restaurant <span class="orange">Resto</span>-<span class="rouge">Berger</span> a été crée par
                        des
                        étudiants pour des étudiants.</p>
                </div>
                <div class="right">
                    <img src="images/restaurant.jpg" alt="image restaurant">
                </div>
            </div>
            <div class="card">
                <div class="left">
                    <h1><span class="orange">Horaire d'ouverture</span></h1>
                    <div class="container_horraire_midi">
                        <p class="horraire_midi"><i class="fa-solid fa-angle-right"></i> Mardi 11:00 - 15:00</p>
                        <p class="horraire_midi"><i class="fa-solid fa-angle-right"></i> Mercredi 11:00 - 15:00</p>
                        <p class="horraire_midi"><i class="fa-solid fa-angle-right"></i> Jeudi 11:00 - 15:00</p>
                        <p class="horraire_midi"><i class="fa-solid fa-angle-right"></i> Vendredi 11:00 - 15:00</p>
                    </div>
                    <div class="container_horraire_soir">
                        <p class="horraire_soir"><i class="fa-solid fa-angle-right"></i> Mardi 18:00 - 21:00</p>
                        <p class="horraire_soir"><i class="fa-solid fa-angle-right"></i> Mercredi 18:00 - 21:00</p>
                        <p class="horraire_soir"><i class="fa-solid fa-angle-right"></i> Jeudi 18:00 - 21:00</p>
                    </div>
                </div>

                <div class="right">
                    <img src="images/resto-open.jpg" alt="restaurant ouvert">
                </div>
            </div>

        </div>
    </main>
    <footer>
        <h1><span class="orange">Resto</span>-<span class="rouge">Berger</span></h1>
        <div class="services">
            <div class="service">
                <div style="text-align:center">
                    <p>Av. Gaston Berger, 59000 Lille FRANCE
                    </p>
                    <h3><u>Accès</u></h3>
                    <p>BUS <br>
                        <a href="https://www.ilevia.fr"><img src="images/Ilevia.png" class=""></a>
                    </p>
                    <p>Arrêt : Gaston Berger<br> Ligne : L1, Wambrechies Agrippin. | Z2, Lesquin Jean Jaures.</p>
                </div>
            </div>
            <!--Paiement en ligne-->
            <div class="service">
                <div style="text-align:center">
                    <div class="Centre">
                        <h3><u>Paiement en ligne</u></h3>
                        <p>Méthode de paiement : </p>
                        <img src="images/Carte bancaire.jpg" class="paiement">
                        <img src="images/Mastercard-modified.png" class="paiement">
                        <br>
                        <img src="images/visaaaaaa.PNG" class="paiement">
                        <img src="images/Paypal-modified.png" class="paiement">
                    </div>
                </div>
            </div>
            <!--Réseaux sociaux-->
            <div class="service">
                <div style="text-align:center">
                    <div class="Droite">
                        <h3><u>Retrouver nous sur</u></h3>
                        <p>Nos réseaux : </p>
                        <a href="#"><img src="images/Facebook.png" class="logo2"></a>
                        <a href="#"><img src="images/Linkedin.png" class="logo2"></a>
                        <br>
                        <a href="#"><img src="images/Twitter.png" class="logo2"></a>
                        <a href="#"><img src="images/Instagram.png" class="logo2"></a>
                    </div>
                </div>
            </div>
        </div>
        <!--Contact Resto-Berger-->
        <p id="contact">Contact :
            <i class="fas fa-phone"></i>
            <a href="00 00 00 00 00">00 00 00 00 00</a> | &copy; 2022, Resto-Berger.
        </p>
    </footer>
</body>

</html>