<!-- inclusion PHP démarrage de session et connexion BDD -->
<?php require_once('include/init.inc.php'); ?>

<?php

if( !adminConnect() ){
    //redirection
    header('location:index.php');
    exit(); //termine le script 
}

//RECHERCHE DANS LES TABLES DE LA BDD
$search = $pdo->query("SELECT * FROM membre  WHERE mail='" . $_GET['mail'] . "'");//var_dump($search);

//ASSOCIATION DE LA VARIABLE $contenu AVEC LES VALEURS DE LA TABLE
$contenu = $search->fetch(PDO::FETCH_ASSOC);//var_dump($contenu);

?>

<!DOCTYPE html>

<html lang="fr">

<head>

    <!-- inclusion PHP du HEAD -->
    <?php require_once("include/head.inc.php") ?>

   <!-- Titre de la Page -->
    <title>All Might - Modification Membre</title>

</head>

<body>

    <!-- inclusion PHP NAV et MENU BURGER -->
    <?php require_once("include/nav.inc.php") ?>

    <!-- MAIN -->
    <main class="mainModif"><br><br><br><br>
       
       <h1 align="center">MODIFICATION MEMBRE</h1><br><br>
        
        <?php
    
    //AFFICHAGE EN TABLEAU DU MEMBRE A MODIFIER
    if($search){
        
        echo '<h3 align="center">MEMBRE</h3>';
        
        echo '<form action="admin.php" method="post">';
        echo '<table border="1">';
        echo '<tr>';
        echo '<td><strong>Pseudo</strong></td>';
        echo '<td><input type="text" name="pseudo" value="' . $contenu['pseudo'] . '" /></td>';
        echo '</tr><tr>';
        echo '<td><strong>Mail</strong></td>';
        echo '<td><input type="email" name="mail" value="' . $contenu['mail'] . '" /></td>';
        echo '</tr><tr>';
        echo '<td><strong>Prénom</strong></td>';
        echo '<td><input type="text" name="prenom" value="' . $contenu['prenom'] . '" /></td>';
        echo '</tr><tr>';
        echo '<td><strong>Nom</strong></td>';
        echo '<td><input type="text" name="nom" value="' . $contenu['nom'] . '" /></td>';
        echo '</tr><tr>';
        echo '<td><strong>Statut</strong></td>';
        echo '<td><input type="text" name="statut" value="' . $contenu['statut'] . '" /></td>';
        echo '</tr></table><br>';
        echo '<input type="hidden" name="mailOg" value="' . $_GET['mail'] . '" />';
        echo '<input type="submit" name="modifier" value="modifier" />';

        
    }
    
?>
        <br><br>
    </main>

    <!--  inclusion PHP FOOTER -->
    <?php require_once("include/footer.inc.php") ?>

</body>

</html>
