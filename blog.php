<!-- inclusion PHP démarrage de session et connexion BDD -->
<?php require_once('include/init.inc.php'); ?>
<!-- REQUIRE : si erreur STOP l'exécution du script , REQUIRE_ONCE : sécurité d'une seule inclusion -->
<?php 

$pdostatement = $pdo->query('SELECT * FROM article');

?>
<!DOCTYPE html>

<html lang="fr">

<head>

    <!-- inclusion PHP du HEAD -->
    <?php  require_once("include/head.inc.php");?>
    <!-- Titre de la Page -->
    <title>All Might - Blog</title>

</head>

<body>

    <!-- inclusion PHP NAV et MENU BURGER -->
    <?php  require_once("include/nav.inc.php");?>

    <main class="mainBlog"><br><br><br><br>



        <a href="blog.php">
            <h1 align="center">BLOG</h1>
        </a><br><br> <!-- <a> permet d'avoir un lien cliquable -->

        <!-- MENU ADMINISTRATION -->
        <div class="adminMenu">

            <!-- MENU BLOG -->
            <ul class="adminMenuAll">
                <li><button class="btn-blogArticle">Article</button></li>
                <li><button class="btn-blogImg">Galerie d'Images</button></li>
            </ul>

        </div><!-- FIN MENU ADMINISTRATION PRINCIPAL -->

        <section>


            <div class="blogImg">

                <h1 align="center">Galerie d'images :</h1>

                <?php 
    
                    $dossier = "img/uploadimg/";
                    $ouverture = opendir($dossier);//ouverture du dossier 

                    // lecture et affichage de tous le contenu du dossier
                    while($photo = readdir($ouverture))
                    {
                       if(!is_dir($dossier.$photo) && $photo != "." && $photo != "..") 
                       {
                           echo '<img src="'.$dossier.$photo.'" title="'.$photo.'" alt="" id="img" style="max-height:200px; margin:1px; padding-bottom:10%;"/>';
                       }

                    }

                    ?>

            </div>

            <div class="blogArticle">

                <h1 align="center">Articles</h1><br><br>

                

                    <?php
                    while ($row = $pdostatement->fetch(PDO::FETCH_ASSOC)) {
                        echo "<div class='boxArticle'>";
                        echo "<div>";                      
                        echo "<img src='img/uploadart/".$row['image_name']."' height='200px' style='margin:1px; padding-bottom:10%;'>";
                        echo "</div>";
                        echo "<div>";
                        echo "<h2>".$row['titre']."</h2>";
                        echo "<p>".$row['texte']."</p>";
                        echo "</div>";
                        echo "</div>";
                    }
                    ?>
                </div>

        </section><br><br>


    </main>

    <!--  inclusion PHP FOOTER -->
    <?php  require_once("include/footer.inc.php");?>

</body>

</html>
