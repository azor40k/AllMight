<?php require_once('include/init.inc.php'); ?>

<?php

//AUTOREMPLISSAGE SI UN MEMBRE EST CONNECTE
if( userConnect()){
    
    $nom = htmlspecialchars($_SESSION['membre']['nom']);  //supprime les balises dans le champs
    $prenom = htmlspecialchars($_SESSION['membre']['prenom']);
    $mail = htmlspecialchars($_SESSION['membre']['mail']);    
}

//DECLARATION VARIABLE ERROR
$error = '';
$error2 = '';



//ENVOIE DU MAIL ET ENREGISTREMENT BDD
if($_POST){ //SI ON APPUIE SUR ENVOYER
    
    //STOCKAGE DES VALEURS 
    $nom = htmlspecialchars($_POST['nom']);  //supprime les balises dans le champs, Convertit les caractères spéciaux en entités HTML      
    $prenom = htmlspecialchars($_POST['prenom']);       
    $mail = htmlspecialchars($_POST['mail']);       
    $message = htmlspecialchars($_POST['message']);
    
    //SI DES CASES DU FORMULAIRE NE SONT PAS VIDE       
    if ( !empty($_POST['prenom'])  && !empty($_POST['nom']) && !empty($_POST['mail']) && !empty($_POST['message']) ){
        
        //ENREGISTREMENT DU MESSAGE DANS LA BDD
        $ajout = $pdo->prepare("INSERT INTO contact(nom,prenom,mail,message,date) VALUES('$_POST[nom]','$_POST[prenom]','$_POST[mail]','$_POST[message]', NOW())");
        
        //var_dump($ajout->debugDumpParams());       
        
          
        //ENVOIE DU MAIL
        //Style du message par mail
        //Paramètre encodage
        $header="MIME-Version: 1.0\r\n";
		$header.='From:"allmight.com"<support@allmight.com>'."\n";
		$header.='Content-Type:text/html; charset="uft-8"'."\n";
		$header.='Content-Transfer-Encoding: 8bit';

		$message=
        '<html>
			<body>
				<div align="center"><br>
					<p><strong>Nom de l\'expéditeur :</strong></p>'. $_POST['nom'] . ' ' . $_POST['prenom'] . '<br>
					<p><strong>Mail de l\'expéditeur :</strong></p>'.$_POST['mail'].'<br>
					<p><strong>Message :</strong></p><br>
					'. $_POST['message'] .'
					<br>
				</div>
			</body>
		</html>';

        //Envoie du mail
		mail("carandangaxel.contact@gmail.com", "DEMANDE DE CONTACT - allmight.com", $message, $header);

        //Enregistrement BDD
        $ajout->execute();
        //Message de confirmation 
        $error2 .= 'Mail envoyé';
        
       }
    else{
        $error .= 'Remplir les champs vides';
    }
}

?>

<!DOCTYPE html>

<html lang="fr">

<head>

    <!-- inclusion PHP du HEAD -->
    <?php require_once('include/head.inc.php'); ?>
    <!-- Titre de la Page -->
    <title>All Might - Contact</title>

</head>

<body>

    <!-- inclusion PHP NAV et MENU BURGER -->
    <?php require_once('include/nav.inc.php'); ?>
    
    <!-- BANNER INSCRIPTION -->
    <section class="bannerPageContact"></section>
    
    <main class="mainContact">

        <div class="titre">
            <h1>Contact</h1>
        </div><br>

       <!-- FORMULAIRE DE CONTACT -->
        <div class="container">

            <form class="cont-form" method="post" action="">

                <div class="box">
                    <div class="boxbox">
                        <label for="nom">Nom</label><br>
                        <input type="text" id="nom" name="nom" placeholder="Votre nom ..." style="width: 90%" value="<?php if(isset($nom)) { echo $nom; } ?>"><!-- Remplissage automatique de la value enregistrer comme le membre est connecté  -->
                    </div>

                    <div class="boxbox">
                        <label for="prenom">Prénom</label><br>
                        <input type="text" id="prenom" name="prenom" placeholder="Votre prénom ..." style="width: 90%" value="<?php if(isset($prenom)) { echo $prenom; } ?>"><br>
                    </div>
                </div>


                <label for="mail">E-mail</label><br>
                <input type="email" id="mail" name="mail" placeholder="Votre e-mail ..." style="width: 70%" value="<?php if(isset($mail)) { echo $mail; } ?>"><br>


                <textarea id="message" name="message" placeholder="Votre message ..." style="width: 100%;  height:200px"><?php if(isset($_POST['message'])) { echo $_POST['message']; } ?></textarea><br>

                <input type="submit" value="Envoyer">
                
                <!-- AFFICHAGE D'ERREUR  -->
                <?php  echo '<font color="red">'. $error ."</font>"; ?>
                <?php  echo '<font color="green">'. $error2 ."</font>"; ?>

            </form>

        </div>
        <br>
    </main>



    <!--  inclusion PHP FOOTER -->
    <?php require_once("include/footer.inc.php") ?>

</body>

</html>
