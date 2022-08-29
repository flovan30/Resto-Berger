<?php session_start()?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="uts-8">
    <link rel="stylesheet" type="text/css" href="style/style_nav.css" />
    <link rel="stylesheet" type="text/css" href="style/style_pageadmin.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
        integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Martel:wght@900&display=swap" rel="stylesheet">
    <title>Page d'administration</title>
</head>

<body>

    <!--Début de la NavBar-->
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
    <!--Fin de la NavBar-->

    <h2 class="title">Page d'administration</h2>
    <a class="log-out" href="traitement_php/deconnexion.php">se deconnecter</a>
    <!--_______________________________________________ce qui concerne les entrées____________________________________________________________________________________-->
    <hr>
    <h2 class="title_section">Les entrées</h2>
    <div class="box">
        <div class="list">
            <h3 class="title_list">Liste des entrées</h3>

            <!-- liste qui contient toutes les entrees -->
            <div class="tableau">
                <?php
        $link = 'localhost';
        $user = 'root';
        $mdp = '';
        $bdd = 'test_bdd_resto_berger';
        $base = mysqli_connect($link, $user, $mdp, $bdd);

        if ($base){
            $nb_entree = mysqli_query($base, 'SELECT * FROM entree');
            echo"<table>";
            echo"<thead><tr><th>Id entrée</th><th>Désignation entrée</th><th>Prix entrée</th></tr></thead><tbody>";
            while($ligne = mysqli_fetch_row($nb_entree)){
                echo "<tr> <td>".$ligne['0']."</td> <td>".$ligne['1']."</td> <td>".$ligne['2']." €"."</td> </tr>";
            }
            echo"</tbody></table></div><BR>";
        }
    ?>
            </div>
            <div class="add">
                <!-- formulaire d'ajout d'entrée  -->
                <h3 class="title_add">Ajout d'une entree</h3>
                <form class="form_add" enctype="multipart/form-data" action="traitement_php/ajoutentree.php"
                    method="post">
                    <label for="nomEntree">Nom de l'entree :</label><br>
                    <input type="text" name="nomEntree" id="nomEntree" required><br><br>
                    <label for="prixentree">Veuillez saisir le prix de l'entree</label><br>
                    <input type="number" step="0.01" name="prixentree" id="prixentree" required><br>
                    <label for="imageEntree"><br> Veuillez choisir une image pour l'entrée</label><br>
                    <input type="file" name="imageEntree" id="imageEntree" required>
                    <input type="hidden" name="MAX_FILE_SIZE" value="10000000"><br><br>
                    <input type="submit" value="Ajouter à la base de donnée" />
                </form><br>
            </div>

            <div class="supp">
                <h3>Suppression d'une entrée</h3>
                <form action="traitement_php/suppressionEntreeBDD.php" method="POST">
                    <label for="idEntree">Identifiant de l'entrée</label><br>
                    <input type="number" name="idEntree" id="idEntree"><br><br>
                    <input type="submit" value="Supprimer de la base de données">
                </form>
            </div>
        </div>
    </div>
    <hr>
    <h2 class="title_section">Les plats</h2>
    <div class="box">
        <div class="list">
            <h3 class="title_list">Liste des plats</h3>

            <!-- liste qui contient tout les plats -->
            <div class="tableau">
                <?php
        $link = 'localhost';
        $user = 'root';
        $mdp = '';
        $bdd = 'test_bdd_resto_berger';
        $base = mysqli_connect($link, $user, $mdp, $bdd);

        if ($base){
            $nb_entree = mysqli_query($base, 'SELECT * FROM plat');
            echo"<table>";
            echo"<thead><tr><th>Id plat</th><th>Désignation plat</th><th>Prix plat</th><th>Plat du jour ?</th></tr></thead><tbody>";
            while($ligne = mysqli_fetch_row($nb_entree)){
                // verification si c'est en plat du jour 
                if($ligne['4'] == 0){
                    $platdujour = "non";
                }
                else{
                    $platdujour = "oui";
                }
                echo "<tr> <td>".$ligne['0']."</td> <td>".$ligne['1']."</td> <td>".$ligne['2']." €"."</td><td>".$platdujour."</td></tr>";
            }
            echo"</tbody></table></div><BR>";
        }
    ?>

            </div>
            <div class="add">
                <!-- formulaire d'ajout de plat  -->
                <h3 class="title_add">Ajout d'un plat</h3>
                <form class="form_add" enctype="multipart/form-data" action="traitement_php/ajoutplat.php"
                    method="post">
                    <label for="nomPlat">Nom du plat :</label><br>
                    <input type="text" name="nomPlat" id="nomPlat" required><br><br>
                    <label for="prixplat">Veuillez saisir le prix du plat</label><br>
                    <input type="number" step="0.01" name="prixplat" id="prixplat" required><br>
                    <label for="imagePlat"><br> Veuillez choisir une image pour le plat</label><br>
                    <input type="file" name="imagePlat" id="imagePlat" required>
                    <input type="hidden" name="MAX_FILE_SIZE" value="10000000"><br><br>
                    <input type="submit" value="Ajouter à la base de donnée" />
                </form><br>
            </div>

            <div class="supp">
                <h3>Suppression d'un plat</h3>
                <form action="traitement_php/suppressionPlatBDD.php" method="POST">
                    <label for="idPlat">Identifiant du plat</label><br>
                    <input type="number" name="idPlat" id="idPlat"><br><br>
                    <input type="submit" value="Supprimer de la base de données">
                </form>
            </div>

        </div>
    </div>
    <div class="platdujour">
        <div class="ajout_platdujour">
            <h3>Ajout d'un plat du jour </h3>
            <form class="form_add_platdujour" action="traitement_php/add_platdujour.php" method="POST">
                <label for="idPlat">ID du plat à ajouter en plat du jour</label><br>
                <input type="number" name="idPlat" id="idPlat"><br><br>
                <input type="submit" value="Ajouter">
            </form>
        </div>
        <div class="supp_platdujour">
            <h3>Suppression d'un plat du jour</h3>
            <form class="form_supp_platdujour" action="traitement_php/supp_platdujour.php" method="POST">
                <label for="idPlat">ID du plat à supprimer des plats du jour</label><br>
                <input type="number" name="idPlat" id="idPlat"><br><br>
                <input type="submit" value="Supprimer">
            </form>
        </div>
    </div>
</body>

</html>