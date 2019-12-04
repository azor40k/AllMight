<ul class="">

<li><a href="index.php">Accueil</a></li>
<li><a href="histoire.php">Histoire</a></li>
<li><a href="personnage.php">Personnages</a></li>
<li><a href="blog.php">Blog</a></li>

<!-- SI UTILISATEUR EST UN ADMIN, AJOUT  ADMINISTRATION  -->
<?php if ( adminConnect() ) : ?>
<li><a href="admin.php">ADMINTOOL</a></li>
<?php endif; ?><!-- ARRET DE LA CONDITION -->

<!-- SI UTILISATEUR EST UN MEMBRE, AJOUT PROFIL ET DECONNEXION  -->
<?php if ( userConnect() ) :  ?>
<li><a href="profil.php" class="profilOption">Profil</a></li>
<li><a href="connexion.php?action=deconnexion">Deconnexion</a></li>

<!-- SI PAS D'UTILISATEUR CONNECTER AFFICHAGE CONNEXION/INSCRIPTION  -->
<?php else:  ?>
<li><a href="connexion.php">Connexion/Inscription</a></li>
<?php endif; ?><!-- ARRET DE LA CONDITION -->

</ul>