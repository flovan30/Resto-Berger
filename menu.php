<?php session_start()?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style/style_menu.css" />
    <link rel="stylesheet" type="text/css" href="style/style_nav.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
        integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href="https://fonts.googleapis.com/css2?family=Martel:wght@900&display=swap" rel="stylesheet">
    <title>Gastro Berger - Menu</title>
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
        <br><br><br><br><br><br><br>
    </div>

    <!-- En-tête -->
    <header>

        <!-- Case titre -->
        <div class="letitre">
            <h1>Resto-Berger</h1>
            <p>Par des étudiants, pour des étudiants !</p>
        </div>

        <!-- Slide d'images -->
        <div class="slider">
            <div class="slides">
                <div class="slide"><img src="images/slide1.jpg"></div>
                <div class="slide"><img src="images/slide2.jpg"></div>
                <div class="slide"><img src="images/slide3.jpg"></div>
                <div class="slide"><img src="images/slide4.jpg"></div>
            </div>
        </div>

    </header>

    <!-- Navigation du menu -->5
    <div class="section-menu">
        <nav class="menu">
            <ul>
                <li class="box-menu nav-item entrees"><a href="#entrees">Entrées</a></li>
                <li class="box-menu nav-item plats"><a href="#plats">Plats</a></li>
                <li class="box-menu nav-item desserts"><a href="#desserts">Desserts</a></li>
                <li class="box-menu nav-item boissons"><a href="#boissons">Boissons</a></li>
            </ul>
        </nav>
    </div>

    <hr size="30">

    <!-- section entrées -->

    <section id="entrees" class="entrees">

        <?php
        $link = 'localhost';
        $user = 'root';
        $mdp = '';
        $bdd = 'test_bdd_resto_berger';
        $base = mysqli_connect($link, $user, $mdp, $bdd);

        if($base){
            // affichage de toutes les entrée dans la base de données
            $nb_entree = mysqli_query($base, 'SELECT * FROM entree');
            while($ligne = mysqli_fetch_row($nb_entree)){
                echo "<div class="."item"."><img src=".$ligne['3']."> <div class="."item-infos"."><h3>".$ligne['1']."</h3><hr><p class="."prix".">".$ligne['2']." €"."</p></div></div><BR>";
            }
        }
    ?>

    </section>


    <!-- section plats -->

    <hr size="30">

    <section id="plats" class="plats">

        <div class="item">

            <img src="images/test.jpg">

            <div class="item-infos">
                <h3>Plat 1</h3>
                <hr>
                <p class="dujour">Plat du jour !</p>
                <p>description
                <p>
                <p class="prix">prix</p>
            </div>

        </div>
        <div class="item">

            <img src="images/test.jpg">

            <div class="item-infos">
                <h3>Plat 2</h3>
                <hr>
                <p class="dujour">Plat du jour !</p>
                <p>description
                <p>
                <p class="prix">prix</p>
            </div>

        </div>
        <div class="item">

            <img src="images/test.jpg">

            <div class="item-infos">
                <h3>Plat 3</h3>
                <hr>
                <p class="dujour">Plat du jour !</p>
                <p>description
                <p>
                <p class="prix">prix</p>
            </div>

        </div>
        <div class="item">

            <img src="images/test.jpg">

            <div class="item-infos">
                <h3>Plat 4</h3>
                <hr>
                <p class="dujour">Plat du jour !</p>
                <p>description
                <p>
                <p class="prix">prix</p>
            </div>

        </div>
        <div class="item">

            <img src="images/test.jpg">

            <div class="item-infos">
                <h3>Plat 5</h3>
                <hr>
                <p class="dujour">Plat du jour !</p>
                <p>description
                <p>
                <p class="prix">prix</p>
            </div>

        </div>
        <div class="item">

            <img src="images/test.jpg">

            <div class="item-infos">
                <h3>Plat 6</h3>
                <hr>
                <p>description
                <p>
                <p class="prix">prix</p>
            </div>

        </div>
        <div class="item">

            <img src="images/test.jpg">

            <div class="item-infos">
                <h3>Plat 7</h3>
                <p>description
                <p>
                <p class="prix">prix</p>
            </div>

        </div>

    </section>


    <!-- section desserts -->

    <hr size="30">

    <section id="desserts" class="desserts">

        <div class="item">

            <img src="images/test.jpg">

            <div class="item-infos">
                <h3>Dessert 1</h3>
                <hr>
                <p>description
                <p>
                <p class="prix">prix</p>
            </div>

        </div>
        <div class="item">

            <img src="images/test.jpg">

            <div class="item-infos">
                <h3>Dessert 2</h3>
                <hr>
                <p>description
                <p>
                <p class="prix">prix</p>
            </div>

        </div>
        <div class="item">

            <img src="images/test.jpg">

            <div class="item-infos">
                <h3>Dessert 3</h3>
                <hr>
                <p>description
                <p>
                <p class="prix">prix</p>
            </div>

        </div>
        <div class="item">

            <img src="images/test.jpg">

            <div class="item-infos">
                <h3>Dessert 4</h3>
                <hr>
                <p>description
                <p>
                <p class="prix">prix</p>
            </div>

        </div>
        <div class="item">

            <img src="images/test.jpg">

            <div class="item-infos">
                <h3>Dessert 5</h3>
                <hr>
                <p>description
                <p>
                <p class="prix">prix</p>
            </div>

        </div>
        <div class="item">

            <img src="images/test.jpg">

            <div class="item-infos">
                <h3>Dessert 6</h3>
                <hr>
                <p>description
                <p>
                <p class="prix">prix</p>
            </div>

        </div>
        <div class="item">

            <img src="images/test.jpg">

            <div class="item-infos">
                <h3>Dessert 7</h3>
                <p>description
                <p>
                <p class="prix">prix</p>
            </div>

        </div>

    </section>

    <!-- section desserts -->

    <hr size="30">

    <section id="boissons" class="boissons">

        <div class="item">

            <img src="images/test.jpg">

            <div class="item-infos">
                <h3>Boisson 1</h3>
                <hr>
                <p>description
                <p>
                <p class="prix">prix</p>
            </div>

        </div>
        <div class="item">

            <img src="images/test.jpg">

            <div class="item-infos">
                <h3>Boisson 2</h3>
                <hr>
                <p>description
                <p>
                <p class="prix">prix</p>
            </div>

        </div>
        <div class="item">

            <img src="images/test.jpg">

            <div class="item-infos">
                <h3>Boisson 3</h3>
                <hr>
                <p>description
                <p>
                <p class="prix">prix</p>
            </div>

        </div>
        <div class="item">

            <img src="images/test.jpg">

            <div class="item-infos">
                <h3>Boisson 4</h3>
                <hr>
                <p>description
                <p>
                <p class="prix">prix</p>
            </div>

        </div>
        <div class="item">

            <img src="images/test.jpg">

            <div class="item-infos">
                <h3>Boisson 5</h3>
                <hr>
                <p>description
                <p>
                <p class="prix">prix</p>
            </div>

        </div>
        <div class="item">

            <img src="images/test.jpg">

            <div class="item-infos">
                <h3>Boisson 6</h3>
                <hr>
                <p>description
                <p>
                <p class="prix">prix</p>
            </div>

        </div>
        <div class="item">

            <img src="images/test.jpg">

            <div class="item-infos">
                <h3>Boisson 7</h3>
                <p>description
                <p>
                <p class="prix">prix</p>
            </div>

        </div>

    </section>

</body>

</html>