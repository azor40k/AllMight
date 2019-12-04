<div class="adminMembre">
       
       <div class="adminMembreAll">
        
        <h1 color='white'>Tous les membres</h1>
        
        <?php
         
         echo "<h3 color='white'>Nombre de membres : " . $pdostatement->rowCount() . '</h3>'; 
         //rowCount() permet de compter le nombre de lignes retournées
    
         echo '<table border="1" class="table">';
         echo '<tr>';
         echo '<td><strong>ID</strong></td>';
         echo '<td><strong>Pseudo</strong></td>';
         echo '<td><strong>Mail</strong></td>';
         echo '<td><strong>Prénom</strong></td>';
         echo '<td><strong>Nom</strong></td>';
         echo '<td><strong>Statut</strong></td>';
         echo '<td></td>';
         echo '</tr>';
 
        
         //Affichage des données de la table tant que fetch n'est pas terminé
         while( $contenu = $pdostatement->fetch(PDO::FETCH_ASSOC) ){
             
             //distinction Admin/Membre
             if($contenu['statut']==1){$statut =  'Administrateur';} else{ $statut =  'Membre';}

             echo '<tr>';
             echo '<td>' . $contenu['id_membre'] . '</td>';
             echo '<td>' . $contenu['pseudo'] . '</td>';
             echo '<td>' . $contenu['mail'] . '</td>';
             echo '<td>' . $contenu['prenom'] . '</td>';
             echo '<td>' . $contenu['nom'] . '</td>';
             echo '<td>' . $statut . '</td>';
             echo '<td><a href="modif.php?mail=' . $contenu['mail'] . '"><button>Modifier</button></a></td>';
             echo '</tr>';

         }
            echo '</table>';
         
         ?>
         
         </div>
         
         <div class="adminMembreAd">
         
         <h1 color='white'>Les Administrateurs</h1>
         
         <?php
    
         echo '<table border="1" class="table">';
         echo '<tr>';
         echo '<td><strong>ID</strong></td>';
         echo '<td><strong>Pseudo</strong></td>';
         echo '<td><strong>Mail</strong></td>';
         echo '<td><strong>Prénom</strong></td>';
         echo '<td><strong>Nom</strong></td>';
         echo '<td><strong>Statut</strong></td>';
         echo '<td></td>';
         echo '</tr>';
                        
             //Affichage des données de la table tant que fetch n'est pas terminé             
             while( $contenu = $pdostatement2->fetch(PDO::FETCH_ASSOC) ){
                 
                 //distinction Admin/Membre
                 if($contenu['statut']==1){$statut =  'Administrateur';} else{ $statut =  'Membre';}
                 //Si membre est un admin affiché
                 if($contenu['statut']==1){
            
                    echo '<tr>';
                    echo '<td>' . $contenu['id_membre'] . '</td>';
                    echo '<td>' . $contenu['pseudo'] . '</td>';
                    echo '<td>' . $contenu['mail'] . '</td>';
                    echo '<td>' . $contenu['prenom'] . '</td>';
                    echo '<td>' . $contenu['nom'] . '</td>';
                    echo '<td>' . $statut . '</td>';
                    echo '<td><a href="modif.php?mail=' . $contenu['mail'] . '"><button>Modifier</button></a></td>';
                    echo '</tr>';

             }    
     
        }
    
        echo '</table>';
        ?>
        
        </div>
        
        <div class="adminMembreMem">
        <h1 color='white'>Les Membres</h1>


        <?php
    
         echo '<table border="1" class="table">';
         echo '<tr>';
         echo '<td><strong>ID</strong></td>';
         echo '<td><strong>Pseudo</strong></td>';
         echo '<td><strong>Mail</strong></td>';
         echo '<td><strong>Prénom</strong></td>';
         echo '<td><strong>Nom</strong></td>';
         echo '<td><strong>Statut</strong></td>';
         echo '<td></td>';
         echo '</tr>';
 
        //Affichage des données de la table tant que fetch n'est pas terminé
         while( $contenu = $pdostatement3->fetch(PDO::FETCH_ASSOC) ){
             
             //distinction Admin/Membre
             if($contenu['statut']==1){$statut =  'Administrateur';} else{ $statut =  'Membre';}
             //Si membre est juste un membre affiché
             if($contenu['statut']==0){
                 

                 echo '<tr>';
                 echo '<td>' . $contenu['id_membre'] . '</td>';
                 echo '<td>' . $contenu['pseudo'] . '</td>';
                 echo '<td>' . $contenu['mail'] . '</td>';
                 echo '<td>' . $contenu['prenom'] . '</td>';
                 echo '<td>' . $contenu['nom'] . '</td>';
                 echo '<td>' . $statut . '</td>';
                 echo '<td><a href="modif.php?mail=' . $contenu['mail'] . '"><button>Modifier</button></a></td>';
                 echo '</tr>';

             }    
     
        }
    
        echo '</table>';
        ?>

    </div>



</div>
