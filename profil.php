<!-- inclusion PHP démarrage de session et connexion BDD -->
<?php require_once('include/init.inc.php'); ?>

<?php 

//SECURITE SI UTILISATEUR EST BIEN EN LIGNE
if( !userConnect() ){
    //SINON REDIRECTION VERS LA PAGE DE CONNEXION
    header('location:connexion.php');
    exit(); //ARRET DE SCRIPT
}

?>


<!DOCTYPE HTML>

<html>

<head>

    <!-- inclusion PHP du HEAD -->
    <?php require_once('include/head.inc.php'); ?>

    <!-- Titre de la Page -->
    <title>All Might - Profil</title>

</head>

<body>

    <!-- inclusion PHP NAV et MENU BURGER -->
    <?php require_once('include/nav.inc.php'); ?>

    <!-- MAIN -->
    <main class="mainProfil">

        <!-- AFFICHE DU PROFIL-->
        <div class="boxProfil" align="center"><br>
            <h1>PROFIL</h1>

            <!-- AFFICHE LE STATUT DE L'UTILISATEUR -->
            <?php if ( adminConnect() ) : ?>
            <h3 style="color:blue">Administrateur</h3>
            <?php else:  ?>
            <h3 style="color:green">Membre</h3>
            <?php endif; ?>

            <!-- AFFICHE DES DETAILS DU PROFIL-->
            <h2>Identifiant</h2>
            <p><?php echo $_SESSION['membre']['pseudo']; ?></p>

            <h2>Informations Personnelles</h2>
            <p><?php echo $_SESSION['membre']['prenom'] . ' ' . $_SESSION['membre']['nom']; ?></p>
            <p><?php echo $_SESSION['membre']['mail']; ?></p><br>

        </div>

    </main>

    <!--  inclusion PHP FOOTER -->
    <?php require_once('include/footer.inc.php'); ?>

</body>

</html>
