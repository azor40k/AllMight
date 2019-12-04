<!-- inclusion PHP démarrage de session et connexion BDD -->
<?php require_once('include/init.inc.php'); ?>

<?php

//DECLARATION VARIABLE ERROR
$error = '';
$error2 = '';

//SECURITE SI UTILISATEUR DEJA CONNECTE
if( userConnect() ){
    //SI OUI REDIRECTION VERS LA PAGE DE PROFIL
    header('location:profil.php');
    exit();//ARRET DE SCRIPT
}

if($_POST){ //SI ON VALIDE L'INSCRIPTION
    
    //STOCKAGE DES VALEURS 
    $pseudo = htmlspecialchars($_POST['pseudo']);
    $mdp = md5($_POST['mdp']);
    $mdp2 = md5($_POST['mdp2']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $nom = htmlspecialchars($_POST['nom']);
    $mail = htmlspecialchars($_POST['mail']);
    $mail2 = htmlspecialchars($_POST['mail2']);
    
    
    //SI DES CASES DU FORMULAIRE NE SONT PAS VIDE
    if ( !empty($_POST['prenom'])  && !empty($_POST['nom'])  && !empty($_POST['pseudo'])  && !empty($_POST['mail'])  && !empty($_POST['mdp']) && !empty($_POST['mail2'])  && !empty($_POST['mdp2'])){
        
        //SI LA TAILLE DU PSEUDO EST COMPRIS [3;20]
        if (strlen($_POST['pseudo']) >= 3 || strlen($_POST['pseudo']) <= 20 ){
            
            //RECHERCHE SI le PSEUDO existe déjà
            $rpseudo = $pdo -> query("SELECT * FROM membre WHERE pseudo = '$_POST[pseudo]'");        
            if ($rpseudo -> rowCount() <= 0){
                
                //Vérification que les mails correspondent 
                if($mail == $mail2) {
                    
                    //sécurité vérification que c'est bien des mails
                    if(filter_var($mail, FILTER_VALIDATE_EMAIL)) {
                        
                       $rmail = $pdo->prepare("SELECT * FROM membre WHERE mail = ?");
                       $rmail->execute(array($mail));
                       $mailexist = $rmail->rowCount();
                        
                        //RECHERCHE SI le MAIL existe déjà
                        if($mailexist == 0) {
                            
                            //Vérification que les mot de passe correspondent
                            if($mdp == $mdp2) {
                                
                                //SI PAS D'ERREUR ENREGISTREMENT DE LA PERSONNE DANS LA BDD
                                
                                //cryptage du mot de passe
                                $_POST['mdp'] = password_hash($_POST['mdp'], PASSWORD_DEFAULT);
                              
                                //ENREGISTREMENT DE LA PERSONNE DANS LA BDD
                                $ajout = $pdo->prepare("INSERT INTO membre(pseudo,mail, mdp, prenom, nom, date) VALUES('$_POST[pseudo]', '$_POST[mail]', '$_POST[mdp]', '$_POST[prenom]', '$_POST[nom]', NOW())");
                                $ajout->execute();
                                /*var_dump($ajout->debugDumpParams());*/
                                $error2 .= 'Inscription validée! <a href="connexion.php">Cliquez ici pour vous connecter</a>';
                            }
                            else {
                             $error .=  "Vos mots de passes ne correspondent pas !";
                            }
                        }
                        else {
                          $error .=  "Adresse mail déjà utilisée !";
                        }
                    } 
                    else {
                       $error .=  "Votre adresse mail n'est pas valide !";
                    }
                } 
                else {
                    $error .= "Vos adresses mail ne correspondent pas !";
                }
            }
            else{
                $error .= 'Pseudo déjà utilisée !';
            }        
        }        
        else{
            $error .= 'Erreur taille pseudo';
        }        
    }    
    else{
        $error .= 'Remplir les champs vides';
    }
}

?>

<!DOCTYPE HTML>
<html>

<head>
    <!-- inclusion PHP du HEAD -->
    <?php require_once('include/head.inc.php'); ?>
    <!-- Titre de la Page -->
    <title>All Might - Inscription</title>
</head>

<body>

    <!-- inclusion PHP NAV et MENU BURGER -->
    <?php require_once('include/nav.inc.php'); ?>

    <!-- BANNER INSCRIPTION -->
    <div class="bannerInscription"><br><br><br>

        <!-- FORMULAIRE D'INSCRIPTION -->
        <div class="formInscription" align="center">
            <h1>INSCRIPTION</h1><br>

            <!-- AFFICHAGE D'ERREUR  -->
            <?php  echo '<font color="red">'. $error ."</font>"; ?>

            <form method="POST" action="">

                <h2>Vos Identifiants</h2><br>

                <input type="text" placeholder="Votre Pseudo" id="pseudo" name="pseudo" value="<?php if(isset($pseudo)) { echo $pseudo; } ?>" /><br>
                <!-- Remplissage automatique de la value après erreur pour que l'utilisateur n'est pas a le refaire  -->

                <input type="password" placeholder="Votre Mot de Passe" id="mdp" name="mdp" /><br>
                <input type="password" placeholder="Confirmez votre Mot de Passe" id="mdp2" name="mdp2" /><br><br>

                <h2>Vos Informations Personnelles</h2><br>

                <input type="text" placeholder="Votre Prenom" id="prenom" name="prenom" value="<?php if(isset($prenom)) { echo $prenom; } ?>" /><br>

                <input type="text" placeholder="Votre Nom" id="nom" name="nom" value="<?php if(isset($nom)) { echo $nom; } ?>" /><br>

                <input type="email" placeholder="Votre Mail" id="mail" name="mail" value="<?php if(isset($mail)) { echo $mail; } ?>" /><br>
                <input type="email" placeholder="Confirmez votre Mail" id="mail2" name="mail2" value="<?php if(isset($mail2)) { echo $mail2; } ?>" />

                <br><br>
                <input type="submit" name="forminscription" value="Je m'inscris" /><br>

                <!-- AFFICHAGE D'ERREUR  -->
                <br><?php  echo '<font color="green">'. $error2 ."</font>"; ?><br><br>

            </form>

        </div><br><br><br>

    </div>
    
    <!--  inclusion PHP FOOTER -->
    <?php require_once('include/footer.inc.php'); ?>
    
</body>

</html>
