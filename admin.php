<!-- inclusion PHP démarrage de session et connexion BDD -->
<?php require_once('include/init.inc.php'); ?>

<?php 

$error= '';
    

//SECURITE SI UTILISATEUR EST BIEN UN ADMIN
if( !adminConnect() ){
    //SINON REDIRECTION VERS LA PAGE INDEX D'ACCUEIL
    header('location:index.php');
    exit(); //ARRET DE SCRIPT
}

//RECHERCHE DANS LES TABLES DE LA BDD
$pdostatement = $pdo->query('SELECT * FROM membre');
$pdostatement2 = $pdo->query('SELECT * FROM membre ORDER BY statut');
$pdostatement3 = $pdo->query('SELECT * FROM membre ORDER BY statut');
$pdostatement4 = $pdo->query('SELECT * FROM contact');
$pdostatement5 = $pdo->query('SELECT * FROM contact ORDER BY date DESC');
$pdostatement6 = $pdo->query('SELECT * FROM contact ORDER BY mail');

//SI BOUTON MODIFIER STOCKAGE DONNE DU MEMBRE ET MODIFICATION DANS LA BDD
if(isset($_POST['modifier'])){
    $rmodif = "UPDATE membre SET pseudo='" . $_POST['pseudo'] . "' " . ", mail='" . $_POST['mail'] . "' " . ", prenom='" . $_POST['prenom'] . "' " . ", nom='" . $_POST['nom'] . "' " . ", statut='" . $_POST['statut'] . "' " . " WHERE mail ='" . $_POST['mailOg'] . "'";
    $rok = $pdo->query($rmodif);
    
    //REFRESH DE LA PAGE ADMIN APRES MODIFICATION
    header('location:admin.php');
}

if(isset($_POST['upload']))
{
        
    $filetmp = $_FILES['file_img']['tmp_name']; //nom temporaire
	$filename = $_FILES['file_img']['name']; //nom final
	$filetype = $_FILES['file_img']['type']; //type de ficher
	$filepath = "C:/xampp/htdocs/PROJET-ALLMIGHT/img/uploadimg/".$filename; //chemin de l'image
	
	move_uploaded_file($filetmp,$filepath); //upload de l'image dans le dossier 
	
    //ENREGISTREMENT DANS LA BDD
	$sql = $pdo->prepare("INSERT INTO image(image_name,image_path,image_type) VALUES ('$filename','$filepath','$filetype')");
    $sql->execute();
        

	
}

if(isset($_POST['upload-art']))
{        
        $filetmp = $_FILES['file_img']['tmp_name'];
        $filename = $_FILES['file_img']['name'];
        $filetype = $_FILES['file_img']['type'];
        $filepath = "C:/xampp/htdocs/PROJET-ALLMIGHT/img/uploadart/".$filename;
        
        move_uploaded_file($filetmp,$filepath);

        $sql = $pdo->prepare("INSERT INTO article(image_name,image_path,image_type,titre,texte) VALUES ('$filename','$filepath','$filetype', '$_POST[titre]', '$_POST[text]')");
        $sql->execute();
	
}

?>

<!DOCTYPE html>

<html lang="fr">

<head>

    <!-- inclusion PHP du HEAD -->
    <?php require_once("include/head.inc.php") ?>

    <!-- Titre de la Page -->
    <title>All Might - Administration</title>

</head>

<body>

    <!-- inclusion PHP NAV et MENU BURGER -->
    <?php require_once("include/nav.inc.php") ?>

    <!-- MAIN -->
    <main class="mainAdmin"><br><br><br><br>

        <a href="admin.php">
            <h1 align="center">ADMINSTRATION DU SITE</h1>
        </a><br><br> <!-- <a> permet d'avoir un lien cliquable -->

        <!-- MENU ADMINISTRATION -->
        <div class="adminMenu">

            <!-- MENU ADMINISTRATION PRINCIPAL -->
            <ul class="adminMenuAll">
                <li><button class="btn-membre">Membre</button></li>
                <li><button class="btn-contact">Mail</button></li>
                <li><button class="btn-img">Galerie Images</button></li>
                <li><button class="btn-article">Articles</button></li>
            </ul>

            <!-- MENU ADMINISTRATION DES MEMBRES -->
            <ul class="adminMenuMembre">
                <li><button class="btn-membreAll">Tous les membres</button></li>
                <li><button class="btn-membreAdmin">Administrateurs</button></li>
                <li><button class="btn-membreMembre">Membres</button></li>
            </ul>

            <!-- MENU ADMINISTRATION DES MAILS RECUS-->
            <ul class="adminMenuContact">
                <li><button class="btn-contactNew">Plus récent</button></li>
                <li><button class="btn-contactOld">Plus ancient</button></li>
                <li><button class="btn-contactMail">Envoyeur</button></li>
            </ul>

        </div><!-- FIN MENU ADMINISTRATION PRINCIPAL -->

        <!-- inclusion PHP des MEMBRES -->
        <?php require_once('include/admin/adminMembre.inc.php'); ?>

        <!-- inclusion PHP des MAILS -->
        <?php require_once('include/admin/adminContact.inc.php'); ?>

        <!-- inclusion PHP du UPLOAD d'IMAGES -->
        <?php require_once('include/admin/adminImg.inc.php'); ?>

        <!-- inclusion PHP du UPLOAD d'ARTICLES -->
        <?php require_once('include/admin/adminArticle.inc.php'); ?>

        <br><br>
    </main>

    <!--  inclusion PHP FOOTER -->
    <?php require_once("include/footer.inc.php") ?>

</body>

</html>
