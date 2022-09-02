<?php session_start()?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <!--CSS de la page de réservation-->
    <link rel="stylesheet" type="text/css" href="style/style_reservation.css" />
    <!--CSS de la NavBar-->
    <link rel="stylesheet" type="text/css" href="style/style_nav.css" />
    <!--Font de texte-->
    <link href="https://fonts.googleapis.com/css2?family=Kenia&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
        integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Gastro-Berger-restaurant</title>
</head>

<body>
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

    <div class="contactUS">

        <div class="box">

            <div class="reserv informations">
                <h3>Reservez une table !</h3>

                <form>
                    <div class="formBox">

                        <div class="row50">

                            <div class="inputBox">
                                <span class="grandspan">Vous venez quel jour ?</span>
                                <input type="date" name="dateReservation" required>
                            </div>

                            <div class="inputBox">
                                <span class="grandspan">Vous arrivez à quelle heure ?</span>
                                <input type="time" name="heureReservation" min="11:00" max="21:00" required>
                            </div>

                            <div class="inputBox">
                                <span class="grandspan">Le soir ou le midi ?</span>
                                <select name="serviceReservation" required>
                                    <option value="null">Selectionnez une réponse</option>
                                    <option value="midi">Service du midi</option>
                                    <option value="soir">Service du soir</option>
                                </select>
                            </div>

                            <div class="inputBox">
                                <span class="grandspan">Vous serez combien ?</span>
                                <input type="number" min="1" max="10" required>
                            </div>

                        </div>
                        <input type="submit" value="Reserver">
                    </div>
                </form>
            </div>
        </div>
</body>

</html>