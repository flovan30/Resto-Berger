<?php session_start() ?>
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
            if (!empty($_SESSION['username']) && $_SESSION['admin?'] == 1) {
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
            } else if (!empty($_SESSION['username']) && $_SESSION['admin?'] == 0) {
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
            } else {
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
    <br><br><br><br><br><br><br><br>

    <?php
    // si le client est connecté 
    if (!empty($_SESSION['username'])) {

        // déclaration des variable de dates pour le formulaire (J+1)
        $today = date("Y-m-d");
        $dateJP1 = date("Y-m-d", strtotime($today . ' +1 day'));
    ?>

    <div class="box">
        <h3 class="title_reserv">Pour commencer à reserver veuillez séléctionner une date</h3>
        <div class="date-form">
            <form action="reservation.php" method="POST">
                <label for="dateReservation">Date de réservation</label>
                <input type="date" name="dateReservation" require id="dateReservation"
                    <?php echo "min='$dateJP1'"; ?>><br><br>
                <label for="typeService">Pour quel service voulez-vous reserver ?</label><br>
                <!-- 0 pour le service du midi | 1 pour le service du soir -->
                <input type="radio" name="typeService" id="typeService" value="0" require>service du midi
                <input type="radio" name="typeService" id="typeService" value="1" require>Service du soir <br><br>
                <label for="nbPersonne">Pour combien de personne ? </label>
                <input type="number" name="nbPersonne" id="nbPersonne" max="70" min="1" require><br><br><br>
                <input class="submit-date" type="submit" value="Verifier les disponibilités">
            </form>
        </div>
    </div>

    <?php
        if (isset($_POST['dateReservation']) && isset($_POST['nbPersonne']) && isset($_POST['typeService'])) {
            $dateReservation = str_replace("-", "", $_POST['dateReservation']);
            $typeService = $_POST['typeService'];
            $nbPersonne = $_POST['nbPersonne'];

            $base = mysqli_connect('localhost', 'root', '', 'test_bdd_resto_berger');
            $requeteVerif = ("SELECT * FROM services WHERE dateService = '$dateReservation' AND typeService = '$typeService'");
            $result = mysqli_query($base, $requeteVerif);
            $rows = mysqli_num_rows($result);

            if ($rows == 1) {
                // boucle pour recuperer le nb place dispo
                while ($row = mysqli_fetch_assoc($result)) {
                    $nbPlacesPrise = $row['nbPlacePrise'];
                    $idService = $row['idService'];
                }
                $nbPlacesPrise = $nbPlacesPrise + $nbPersonne;
                if ($nbPlacesPrise <= 70) {
                    $idClient = $_SESSION['idClient'];
                    /* Ajout reservation */
                    mysqli_query($base, "INSERT INTO reservation (idClient, dateReservation,nbPersonne,idService) VALUES($idClient,$dateReservation,$nbPersonne,$idService)");
                    /* modification de nb place dispo pour ce service */
                    mysqli_query($base, "UPDATE services SET nbPlacePrise = $nbPlacesPrise WHERE idService = $idService");
                    echo '<body onLoad="alert(\'reservation enregistrer' . $nbPlacesPrise . '\')">';
                } else {
                    /* affichage impossible de reserver */
                    echo '<body onLoad="alert(\'Impossible de reserver pour ce jour \n Car il ne reste plus assez de place\')">';
                    echo '<meta http-equiv="refresh" content="0;URL=reservation.php">';
                }
                // fermeture du if si il trouve la date du service dans la bdd
            } else {
                $requeteAjoutDate = ("INSERT INTO services (dateService,typeService,nbPlacePrise) VALUES($dateReservation,$typeService,0)");
                mysqli_query($base, $requeteAjoutDate);
                $requeteRecupId = ("SELECT * FROM services WHERE dateService = '$dateReservation' AND typeService = '$typeService'");
                $recupReq = mysqli_query($base, $requeteVerif);
                $rows = mysqli_num_rows($recupReq);

                while ($row = mysqli_fetch_assoc($recupReq)) {
                    $nbPlacesPrise = $row['nbPlacePrise'];
                    $idService = $row['idService'];
                }
                $nbPlacesPrise = $nbPlacesPrise + $nbPersonne;
                /* reverifier si le nb personne est inferieur ou egale à 70 */
                if ($nbPlacesPrise <= 70) {
                    $idClient = $_SESSION['idClient'];
                    /* Ajout reservation */
                    mysqli_query($base, "INSERT INTO reservation (idClient, dateReservation,nbPersonne,idService) VALUES($idClient,$dateReservation,$nbPersonne,$idService)");
                    /* modification de nb place dispo pour ce service */
                    mysqli_query($base, "UPDATE services SET nbPlacePrise = $nbPlacesPrise WHERE idService = $idService");
                    echo '<body onLoad="alert(\'reservation enregistrer \')">';
                } else {
                    /* affichage impossible de reserver */
                    echo '<body onLoad="alert(\'Impossible de reserver pour ce jour \n Car il ne reste plus assez de place\')">';
                    echo '<meta http-equiv="refresh" content="0;URL=reservation.php">';
                }
            }
        } else {
            /* toutes les info on pas été entrée */
            echo '<body onLoad="alert(\'Vous n ' . "'" . ' avez pas entrée toutes les informations nécessaires\')">';
        }
        // fermeture du if si le client n'est pas connecte
    } else {
        echo "<div class='notConnect'><h3 class='alert'>Veuillez vous connecter pour reserver : <a href='connexion.php'>Connectez-vous</a></h3></div>";
    }
    ?>
</body>

</html>