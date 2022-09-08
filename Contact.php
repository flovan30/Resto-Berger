<?php session_start()?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style/style_contact.css" />
    <link rel="stylesheet" type="text/css" href="style/style_nav.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
        integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Gastro Berger - Contact</title>
</head>

<body>
    <!-- NavBar -->
    <nav>
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
    </nav>
    <br><br><br><br><br>
    </div>

    <div class="contactUS">
        <div class="title">
            <h2>Formulaire de contact</h2>
        </div>
        <div class="box">
            <div class="contact form">
                <h3>Envoyez nous un message :</h3>
                <form>
                    <div class="formBox">
                        <div class="row50">
                            <div class="inputBox">
                                <span>Votre prénom : </span>
                                <input type="text" placeholder="John">
                            </div>
                            <div class="inputBox">
                                <span>Votre nom : </span>
                                <input type="text" placeholder="Doe">
                            </div>
                        </div>

                        <div class="row50">
                            <div class="inputBox">
                                <span>Votre e-mail : </span>
                                <input type="text" placeholder="johndoe@email.com">
                            </div>
                            <div class="inputBox">
                                <span>Votre numéro de téléphone : </span>
                                <input type="text" value="0* ** ** ** **">
                            </div>
                        </div>

                        <div class="row100">
                            <div class="inputBox">
                                <span>Votre message : </span>
                                <textarea placeholder="Ecrivez votre message ici..."></textarea>
                            </div>
                        </div>

                        <div class="row100">
                            <div class="inputBox">
                                <input type="submit" value="Envoyer">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="contact info">
                <h3>Nos coordonnées</h3>
                <div class="infoBox">
                    <span>
                        <ion-icon name="location"></ion-icon>
                    </span>
                    <p>Av. Gaston Berger, 59000 Lille<br>FRANCE</p>
                </div>
                <div class="infoBox">
                    <span>
                        <ion-icon name="mail"></ion-icon>
                    </span>
                    <a href="mailto:gastro.berger@gmail.com">gastro.berger@gmail.com</a>
                </div>
                <div class="infoBox">
                    <span>
                        <ion-icon name="call"></ion-icon>
                    </span>
                    <a href="tel:0782485649">07 82 48 56 49</a>
                </div>
                <ul class="sci">
                    <li>
                        <a href="#">
                            <ion-icon name="logo-facebook"></ion-icon>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <ion-icon name="logo-twitter"></ion-icon>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <ion-icon name="logo-linkedin"></ion-icon>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <ion-icon name="logo-instagram"></ion-icon>
                        </a>
                    </li>
                </ul>
            </div>


            <div class="contact map">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1505.4087812640182!2d3.0813285165570132!3d50.612519578405156!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c2d5c13add4e13%3A0xaf47fc211853709a!2sLyc%C3%A9e%20Gaston%20Berger!5e0!3m2!1sfr!2sfr!4v1645542635904!5m2!1sfr!2sfr"
                    style="border:0;" allowfullscreen="" loading=""></iframe>
            </div>
        </div>



        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>

</html>