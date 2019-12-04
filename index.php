<!-- inclusion PHP démarrage de session et connexion BDD -->
<?php require_once('include/init.inc.php'); ?>
<!-- REQUIRE : si erreur STOP l'exécution du script , REQUIRE_ONCE : sécurité d'une seule inclusion -->

<!DOCTYPE html>

<html lang="fr">

<head>

    <!-- inclusion PHP du HEAD -->
    <?php  require_once("include/head.inc.php");?>

    <!-- Titre de la Page -->
    <title>All Might - Toshinori Yagi</title>

</head>

<body>

    <!-- inclusion PHP NAV et MENU BURGER -->
    <?php  require_once("include/nav.inc.php");?>

    <!-- BANNER ACCUEIL -->
    <section class="bannerAccueil"></section> <!-- Affiche la bannière d'accueil-->

    <!-- MAIN BODY -->
    <main class="mainPageIndex">

        <!-- DEBUT PRESENTATION PERSONNAGE -->
        <section class="presentationAM">

            <div class="intro"><br> <!-- <br> permet de sauter à la ligne -->

                <!-- Bref Biographie d'All Might -->
                <h2>Toshinori Yagi</h2><br>

                <div class="block_1 hline-top"></div><br> <!-- ligne de séparation -->

                <p>
                    <span>Toshinori Yagi</span>, mieux connu sous le surnom de <span>All Might</span>, est le deutéragoniste du manga My Hero Academia.<br>Il est le héros le plus puissant et le "symbole de la paix".<br>Il est connu pour son attitude joyeuse, souriante et son image publique comme étant le <b style="font-size: 20px; color: red">Héros n°1</b> incontesté.
                </p><br>

                <button class="btn-intro" onclick="window.location.href='histoire.php'">SAVOIR PLUS</button><br> <!-- button redirigeant sur la page HISTOIRE.PHP -->

                <div class="block_1 hline-bottom"></div><br> <!-- ligne de séparation -->

            </div>

            <!-- Bref présentation des Compétences d'All Might -->
            <div class="container-presentation">

                <!-- Bref présentation 1 -->
                <div class="contenu-presentation">

                    <h3>Personnalité</h3>

                    <p>
                        <b>All Might est un stéréotype des super-héros américains</b>. Arborant toujours un grand sourire, il est extraverti, ce qui le rend parfois désagréable. Il est également très sympathique et amical.<br>
                        Cependant, quand il reprend sa forme normal, il a tendance à être moins énergique.<br>
                        Deux traits de sa personnalité persistent toujours, qu'il soit en mode héros ou en mode normal :<br><b>son optimisme et son impulsivité</b>
                        .<br>Il a toujours eu la foi et l'espérance que quelqu'un d'assez digne viendrait pour porter le<br><b>"One for All"</b>.</p><br>

                </div>

                <!-- Bref présentation 2 -->
                <div class="contenu-presentation">

                    <h3>Aptitudes et Compétences</h3>

                    <p>
                        Le <b>One For All</b> est l'Alter de Toshinori.<br>
                        Il lui accorde une force et une vitesse <b>surhumaine</b>, une agilité et des réflexes grandement améliorés, une grande endurance et la capacité de sauter très haut.<br>Le One For All est <b>un alter unique</b> qui se transmet d'une personne à une autre.
                    </p>

                    <div class="stat"></div><br>

                    <br>

                </div>

                <!-- Bref présentation 3 -->
                <div class="contenu-presentation">

                    <h3>Palmarès de Combat</h3>

                    <p>All Might n'est pas le héros le plus puissant pour rien.<br>Il à remporté tous ses combats depuis le début de sa carrière.<br><br>
                        Combat connu dans le manga:<br><br>
                        • vs All For One (premier combat): <i>Victoire</i><br>
                        • vs Le Gluant: <i>Victoire</i><br>
                        • vs Brainless, Black Mist & Tomura: <i>Victoire</i><br>
                        • vs Alliance des supers-vilains: <i>Victoire</i><br>
                        • vs All For One (dernier combat): <i>Victoire</i><br>
                    </p><br><br><br>

                </div>

            </div><br><br>

        </section>
        <!-- FIN PRESENTATION D'ALL MIGHT -->

        <!-- SLIDER CSS DES PERSONNAGES SECONDAIRES -->
        <div id="slider">

            <figure>

                <a href="personnage.php#sensei"><img src="img/slider1.png"></a> <!-- image 1 du slider -->
                <a href="personnage.php#eleve"><img src="img/slider2.png"></a> <!-- image 2 du slider -->
                <a href="personnage.php#nemesis"><img src="img/slider3.png"></a> <!-- image 3 du slider -->
                <a href="personnage.php#sensei"><img src="img/slider1.png"></a> <!-- image 1 du slider -->

            </figure>
            
        </div>

    </main>

    <!--  inclusion PHP FOOTER -->
    <?php  require_once("include/footer.inc.php");?>

</body>

</html>
