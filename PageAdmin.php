<html>

<head>
    <meta charset="uts-8">
    <link rel="stylesheet" type="text/css" href="style/style_nav.css" />
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
            <li>
                <img src="images/gaston_berger.png" class="logo">
            </li>
            <li>
                <a href="index.html">
                    <div class="icon">
                        <i class="fas fa-home" aria-hidden="true"></i>
                        <i class="fas fa-home" aria-hidden="true"></i>
                    </div>
                    <div class="name"><span data-text="Accueil">Accueil</span></div>
                </a>
            </li>
            <li>
                <a href="menu.html">
                    <div class="icon">
                        <i class="fas fa-utensils"></i>
                        <i class="fas fa-utensils"></i>
                    </div>
                    <div class="name"><span data-text="Menu">Menu</span></div>
                </a>
            </li>
            <li>
                <a href="reservation.html">
                    <div class="icon">
                        <i class="fas fa-concierge-bell"></i>
                        <i class="fas fa-concierge-bell"></i>
                    </div>
                    <div class="name"><span data-text="Réservation">Réservation</span></div>
                </a>
            </li>
            <li>
                <a href="contact.html">
                    <div class="icon">
                        <i class="fas fa-id-card"></i>
                        <i class="fas fa-id-card"></i>
                    </div>
                    <div class="name"><span data-text="Contact">Contact</span></div>
                </a>
            </li>
        </ul>
        <br><br><br><br><br><br><br><br>
    </div>
    <!--Fin de la NavBar-->


    <div class="contactUS">

        <div class="title">
            <h2>Page d'administration</h2>
        </div>

        <!--_______________________________________________ce qui concerne les entrées____________________________________________________________________________________-->

        <div class="box">
            <div class="contact from">
                <h3>liste des entrées</h3>

                <!-- liste qui contient toutes les entrees -->
                <?php
        $link = 'localhost';
        $user = 'id19412103_adminresto';
        $mdp = '2T!7o\#b_Om#%JIS';
        $bdd = 'id19412103_resto_berger';

        $base = mysqli_connect($link, $user, $mdp, $bdd);

        if ($base){
            $nb_entree = mysqli_query($base, 'SELECT * FROM entree');
            echo"<table>";
            echo"<tr><th>Code entrée</th><th>Désignation entrée</th><th>Prix entrée</th></tr>";
            while($ligne = mysqli_fetch_row($nb_entree)){
                echo "<tr> <td>".$ligne['0']."</td> <td>".$ligne['1']."</td> <td>".$ligne['2']. "</td> </tr>";
            }
            echo"</table><BR>";
        }
    ?>
            </div>


            <div class="contact info">
                <!-- formulaire d'ajout d'entrée  -->
                <h3>Ajout d'une entree à la base de donnée</h3>
                <form enctype="multipart/form-data" action="traitement_php/ajoutentree.php" method="post">
                    <input type="text" name="nomEntree" id="nomEntree" required>
                    <label for="nomEntree">Nom de l'entree</label><br><br>
                    <input type="number" name="prixentree" id="prixentree" required>
                    <label for="prixentree">Veuillez saisir le prix de l'entree</label><br><br>
                    <input type="file" name="imageEntree" id="imageEntree" required>
                    <input type="hidden" name="MAX_FILE_SIZE" value="10000000">
                    <label for="imageEntree"><br> Veuillez choisir une image pour votre entree</label><br>
                    <input type="submit" value="Ajouter à la base de donnée" />
                </form><br>

                <h3>Ajout d'une entrée au menu</h3>
                <form action="ajoutEntreemenu" method="POST">
                    <input type="text" name="idEntree" id="idEntree"><br>
                    <label for="idEntree">Veuillez saisir l'identifiant de l'entrée que vous souhaitez ajouter au
                        menu</label><br>
                    <input type="submit" value="Ajouter au menu">
                    <input type="reset" value="Effacer">
                </form>
            </div>

            <div class="contact map">

                <h3>Suppression d'une entrée à la base de données</h3>
                <form action="suprimEntreebdd" method="POST">
                    <input type="text" name="idEntree" id="idEntree"><br>
                    <label for="idEntree">Veuilez saisir l'identifiant de l'entrée à supprimer dans la base de
                        données</label><br>
                    <input type="submit" value="Supprimer de la base de données">
                    <input type="reset" value="Effacer">
                </form>

                <h3>Suppression d'une entrée dans le menu</h3>
                <form action="suprimeEntreemenu" method="post">
                    <input type="text" name="idEntree" id="idEntree"><br>
                    <label for="idEntree">Veuillez saisir l'identifiant de l'entrée que vous souhaitez supprimer du
                        menu</label><br>
                    <input type="submit" value="Supprimer du menu">
                    <input type="reset" value="Effacer">
                </form>
            </div>

            <!--______________________________________________________ce qui concerne les plats__________________________________________________________________________________-->

            <h3>Liste des plats</h3>
            <!-- liste qui contient tout les plats -->
            <?php
        $base = mysqli_connect($link, $user, $mdp, $bdd);

        if ($base){
            $nb_plat = mysqli_query($base, 'SELECT * FROM plat');
            echo"<table>";
            echo"<tr><th>Code Plat | </th><th>Designation plat | </th><th>Prix Plat</th></tr>";
            while($ligne = mysqli_fetch_row($nb_plat)){
                echo "<tr> <td>".$ligne['0']."</td> <td>".$ligne['1']."</td> <td>".$ligne['2']. "</td> </tr>";
            }
            echo"</table><BR>";
        }
    ?>

            <!-- formulaire d'ajout de plat  -->
            <h3>Ajout d'un plat</h3>
            <form enctype="multipart/form-data" action="traitement_php/ajoutplat.php" method="post">
                <input type="text" name="nomPlat" id="nomPlat" required>
                <label for="nomPlat">Nom du plat</label><br><br>
                <input type="number" name="prixPlat" id="prixPlat" required>
                <label for="prixPlat">Veuillez saisir le prix du plat</label><br><br>
                <input type="file" name="imagePlat" id="imagePlat" required>
                <input type="hidden" name="MAX_FILE_SIZE" value="10000000">
                <label for="imagePlat"><br> Veuillez choisir une image pour votre plat</label><br><br>
                <input type="submit" value="Enregistrer le plat" />
            </form>

            <h3>Ajouter un plat au menu</h3>
            <form action="ajoutPlatmenu" method="POST">
                <input type="text" name="idPlat" id="idPlat"><br>
                <label for="idPlat">Veuillez saisir l'identifiant du plat que vous souhaitez ajouter au menu</label><br>
                <input type="submit" value="ajouter au menu">
                <input type="reset" value="effacer">
            </form>

            <h3>Suppression d'un plat dans le menu</h3>
            <form action="suprimePlatmenu" method="post">
                <input type="text" name="idPlat" id="idPlat"><br>
                <label for="idPlat">Veuillez saisir l'identifiant du plat que vous souhaitez supprimer du
                    menu</label><br>
                <input type="submit" value="Supprimer le plat du menu">
                <input type="reset" value="Effacer">
            </form>

            <h3>Suppression d'un plat dans la base de données</h3>
            <form action="suprimePlatbdd" method="POST">
                <input type="text" name="idPlat" id="idPlat"><br>
                <label for="idPlat">Veuilez saisir l'identifiant du plat à supprimer dans la base de données</label><br>
                <input type="submit" value="Supprimer le plat dans la base de données">
                <input type="reset" value="Effacer">
            </form>
            <hr>

            <!--____________________________________________________ce qui concerne les desserts__________________________________________________________________________________-->

            <h3>Liste des Desserts</h3>
            <!-- liste qui contient tout les desserts -->
            <?php
        $base = mysqli_connect($link, $user, $mdp, $bdd);

        if ($base){
            $nb_dessert = mysqli_query($base, 'SELECT * FROM dessert');
            echo"<table>";
            echo"<tr><th>Code dessert | </th><th>Designation dessert | </th><th>Prix dessert</th></tr>";
            while($ligne = mysqli_fetch_row($nb_dessert)){
                echo "<tr> <td>".$ligne['0']."</td> <td>".$ligne['1']."</td> <td>".$ligne['2']. "</td> </tr>";
            }
            echo"</table><BR>";
        }
    ?>

            <!--Formulaire d'ajout de dessert-->
            <h3>Ajout d'un dessert</h3>
            <form enctype="multipart/form-data" action="traitement_php/ajoutdessert.php" method="post">
                <input type="text" name="nomDessert" id="nomDessert" required>
                <label for="nomDessert">Nom du dessert</label><br><br>
                <input type="number" name="prixDessert" id="prixDessert" required>
                <label for="prixDessert">Veuillez saisir le prix du dessert</label><br><br>
                <input type="file" name="imageDessert" id="imageDessert" required>
                <input type="hidden" name="MAX_FILE_SIZE" value="10000000">
                <label for="imageDessert"><br> Veuillez choisir une image pour votre dessert</label><br><br>
                <input type="submit" value="Enregistrer le dessert" />
            </form>

            <h3>Ajouter un dessert au menu</h3>
            <form action="ajoutDessertmenu" method="POST">
                <input type="text" name="idDessert" id="idDessert"><br>
                <label for="idDessert">Veuillez saisir l'identifiant du dessert que vous souhaitez ajouter au
                    menu</label><br>
                <input type="submit" value="ajouter au menu">
                <input type="reset" value="effacer">
            </form>

            <h3>Suppression d'un dessert dans le menu</h3>
            <form action="suprimeDessertmenu" method="post">
                <input type="text" name="idDessert" id="idDessert"><br>
                <label for="idPlat">Veuillez saisir l'identifiant du dessert que vous souhaitez supprimer du
                    menu</label><br>
                <input type="submit" value="Supprimer le dessert du menu">
                <input type="reset" value="Effacer">
            </form>

            <h3>Suppression d'un dessert dans la base de données</h3>
            <form action="suprimeDessertbdd" method="POST">
                <input type="text" name="idDessert" id="idDessert"><br>
                <label for="idDessert">Veuilez saisir l'identifiant du dessert à supprimer dans la base de
                    données</label><br>
                <input type="submit" value="Supprimer le dessert dans la base de données">
                <input type="reset" value="Effacer">
            </form>
            <hr>
            <!--_________________________________________________________________ce qui concerne les boissons________________________________________________________________________________________-->

            <h3>Liste des Boissons</h3>
            <!-- liste qui contient tout les boissons -->
            <?php
        $base = mysqli_connect($link, $user, $mdp, $bdd);

        if ($base){
            $nb_boisson = mysqli_query($base, 'SELECT * FROM boisson');
            echo"<table>";
            echo"<tr><th>Code boisson | </th><th>Designation boisson | </th><th>Prix boisson</th></tr>";
            while($ligne = mysqli_fetch_row($nb_boisson)){
                echo "<tr> <td>".$ligne['0']."</td> <td>".$ligne['1']."</td> <td>".$ligne['2']. "</td> </tr>";
            }
            echo"</table><BR>";
        }
    ?>
            <!--Formulaire d'ajout d'une boisson-->
            <h3>Ajout d'une boisson</h3>
            <form enctype="multipart/form-data" action="traitement_php/ajoutboisson.php" method="post">
                <input type="text" name="nomBoisson" id="nomBoisson" required>
                <label for="nomBoisson">Nom de la boisson</label><br><br>
                <input type="number" name="prixBoisson" id="prixBoisson" required>
                <label for="prixBoisson">Veuillez saisir le prix de la boisson</label><br><br>
                <input type="file" name="imageBoisson" id="imageBoisson" required>
                <input type="hidden" name="MAX_FILE_SIZE" value="10000000">
                <label for="imageBoisson"><br> Veuillez choisir une image pour votre boisson</label><br><br>
                <input type="submit" value="Enregistrer la boisson" />
            </form>

            <h3>Ajouter d'une boisson au menu</h3>
            <form action="ajoutBoissonmenu" method="POST">
                <input type="text" name="idBoisson" id="idBoisson"><br>
                <label for="idBoisson">Veuillez saisir l'identifiant de la boisson que vous souhaitez ajouter au
                    menu</label><br>
                <input type="submit" value="ajouter au menu">
                <input type="reset" value="effacer">
            </form>

            <h3>Suppression d'une boisson dans le menu</h3>
            <form action="suprimeBoissonmenu" method="post">
                <input type="text" name="idBoisson" id="idBoisson"><br>
                <label for="idBoisson">Veuillez saisir l'identifiant de la boisson que vous souhaitez supprimer du
                    menu</label><br>
                <input type="submit" value="Supprimer la boisson du menu">
                <input type="reset" value="Effacer">
            </form>

            <h3>Suppression d'une boisson dans la base de données</h3>
            <form action="suprimeBoissonbdd" method="POST">
                <input type="text" name="idBoisson" id="idBoisson"><br>
                <label for="idBoisson">Veuilez saisir l'identifiant de la boisson à supprimer dans la base de
                    données</label><br>
                <input type="submit" value="Supprimer la boisson dans la base de données">
                <input type="reset" value="Effacer">
            </form>
        </div>

</body>

</html>