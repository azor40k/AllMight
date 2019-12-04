<!-- inclusion PHP démarrage de session et connexion BDD -->
<?php require_once('include/init.inc.php'); ?>

<?php

//DECLARATION VARIABLE ERROR
$error ='';

//DECONNEXION
if( isset( $_GET['action'] ) && $_GET['action'] == 'deconnexion' ){
    //SI UNE 'action' DANS l'URL ET QUE CETTE 'action' == 'deconnexion', ALORS SESSION DETRUIT
    session_destroy();
}

//SECURITE SI UTILISATEUR DEJA CONNECTE
if( userConnect() ){
    //SI OUI REDIRECTION VERS LA PAGE DE PROFIL
    header('location:profil.php');
    exit();//ARRET DE SCRIPT
}

if( $_POST ){ //SI ON VALIDE LA CONNEXION
        
    //Recherche Identifiant dans la BDD
    $r = $pdo->query("SELECT * FROM membre WHERE pseudo = '$_POST[pseudo]'");

    //Si il y a un pseudo dans la table 'membre', $r renverra '1' ligne de résultat
    if( $r->rowCount() >= 1 ){
        
        //acquisition des valeurs dans la table
        $membre = $r->fetch(PDO::FETCH_ASSOC);
        
        //Vérification du mot de passe
        //Si MDP correct avec le PSEUDO alors on enregistre les informations dans le fichier SESSION
        if(password_verify( $_POST['mdp'],$membre['mdp'])){
            $_SESSION['membre']['id_membre'] = $membre['id_membre'];
            $_SESSION['membre']['pseudo'] = $membre['pseudo'];
            $_SESSION['membre']['mail'] = $membre['mail'];
            $_SESSION['membre']['mdp'] = $membre['mdp'];
            $_SESSION['membre']['prenom'] = $membre['prenom'];
            $_SESSION['membre']['nom'] = $membre['nom'];
            $_SESSION['membre']['statut'] = $membre['statut'];

            //redirection vers la page profil :             
            header('location:profil.php');
        }
        else{
            //Erreur mot de passe
            $error .= '<div style=" color:red;">Mot de Passe incorrect</div>';
        }
    }
    
    else{
        //Erreur identifiant
        $error .= '<div style=" color:red;">Pseudo incorrect ou inexistant</div>';
    }
}

?>

<!DOCTYPE HTML>

<html>

<head>
    <!-- inclusion PHP du HEAD -->
    <?php require_once('include/head.inc.php'); ?>
    <!-- Titre de la Page -->
    <title>All Might - Connexion</title>
</head>

<body>

    <!-- inclusion PHP NAV et MENU BURGER -->
    <?php  require_once("include/nav.inc.php");?>

    <!-- MAIN BODY -->
    <section class="mainConnexion">

        <!-- BOX DE CONNEXION  -->
        <div class="boxConnexion" align="center">

            <div class="boxTitre">
                <h1>Connexion</h1>
            </div>
            
            <!-- AFFICHAGE D'ERREUR  -->
            <?php echo $error; ?>            

            <!-- FORMULAIRE DE CONNEXION  -->
            <form class="formConnexion" method="post" action="">
                <!-- method : manière de circulation des données (POST OU GET), action : URL de destination -->

                <label for="pseudo">Pseudo</label><br>
                <input type="text" name="pseudo" id="pseudo" /><br><br>

                <label for="mdp">Mot de Passe</label><br>
                <input type="password" name="mdp" id="mdp"><br><br>

                <input type="submit" name="" value="Se connecter">

                <a href='inscription.php'><input type="button" name="" value="S'inscrire"></a>

                <!--'name' DANS LES INPUTS D'UN FORMULAIRE permet de récupérer les valeurs via la superglobale : $_POST -->

            </form><br>

        </div>

    </section>

    <!--  inclusion PHP FOOTER -->
    <?php require_once('include/footer.inc.php'); ?>

</body>

</html>
