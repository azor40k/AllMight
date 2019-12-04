<div class="adminContact">

    <div class="adminContactAncient">
        
        <h3>Messages Ancients</h3>
        <?php 
    
    //Affichage des données de la table tant que fetch n'est pas terminé
    while( $contenu = $pdostatement4->fetch(PDO::FETCH_ASSOC) ){
        
        echo '<div class="contactObjet"style="padding:10px; background: #eee; margin: auto;" >';
        echo '<div>Mail provenant de : ' . $contenu['nom'] . ' ' . $contenu['prenom']. '</div>';
        echo '<div>Adresse Mail : ' . $contenu['mail'] . '</div>';
        echo '<div>Message: <br>' . $contenu['message'] . '</div><br>';
        echo '<div>Date: ' . $contenu['date'] . '</div>';
        echo '</div><br>';
        
    }
    
    ?>

    </div>
    
    <div class="adminContactRecent">
        
        <h3>Messages Récents</h3>
        <?php
        
    
        //Affichage des données de la table tant que fetch n'est pas terminé
        while( $contenu = $pdostatement5->fetch(PDO::FETCH_ASSOC) ){

            echo '<div class="contactObjet"style="padding:10px; background: #eee; margin: auto;" >';
            echo '<div>Mail provenant de : ' . $contenu['nom'] . ' ' . $contenu['prenom']. '</div>';
            echo '<div>Adresse Mail : ' . $contenu['mail'] . '</div>';
            echo '<div>Message: <br>' . $contenu['message'] . '</div><br>';
            echo '<div>Date: ' . $contenu['date'] . '</div>';
            echo '</div><br>';
        
    }
    
    ?>

    </div>
    
    <div class="adminContactMail">

       <h3>Messages Trier par Mail</h3>
        <?php
    
    //Affichage des données de la table tant que fetch n'est pas terminé
    while( $contenu = $pdostatement6->fetch(PDO::FETCH_ASSOC) ){
        
        echo '<div class="contactObjet"style="padding:10px; background: #eee; margin: auto;" >';
        echo '<div>Mail provenant de : ' . $contenu['nom'] . ' ' . $contenu['prenom']. '</div>';
        echo '<div>Adresse Mail : ' . $contenu['mail'] . '</div>';
        echo '<div>Message: <br>' . $contenu['message'] . '</div><br>';
        echo '<div>Date: ' . $contenu['date'] . '</div>';
        echo '</div><br>';
        
    }
    
    ?>

    </div>


</div>
