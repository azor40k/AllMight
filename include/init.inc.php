<?php

session_start();//Démarre une session (toujours au début du code)

$pdo = new PDO('mysql:host=localhost;dbname=allmight','root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND=>'SET NAMES UTF8')); //connexion à la BDD

//var_dump($pdo); //affichage du tableau

//fonction userConnect() : Si l'utilisateur est connecté
function userConnect(){
    
    if( !isset($_SESSION['membre']) ){
        //Si la session membre n'existe pas, cela signifie que l'on n'est pas connecté donc on retournera false
        return false;
    }    
    else{
        //sinon on retourne true
        return true;
    }
}

//fonction adminConnect() :si l'utilisateur est connecté ET qu'il est admin
function adminConnect(){
    
    //si l'internaute est connecté ET qu'il est admin (statut égal à 1)
    if( userConnect() && $_SESSION['membre']['statut'] == 1 ){
        return true;
    }    
    else{
        //sinon on retourne false
        return false;
    }
}

?>
