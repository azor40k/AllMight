<!-- inclusion PHP démarrage de session et connexion BDD -->
<?php require_once('include/init.inc.php'); ?>

<!DOCTYPE html>

<html lang="fr">

<head>

    <!-- inclusion PHP du HEAD -->
    <?php require_once("include/head.inc.php") ?>

    <!-- Titre de la Page -->
    <title>All Might - Personnages</title>

</head>

<body>

    <!-- inclusion PHP NAV et MENU BURGER -->
    <?php require_once("include/nav.inc.php") ?>

    <!-- MAIN -->
    <main>

        <!-- PERSONNAGES SECONDAIRE SHOW 1 -->
        <section class="split" id="sensei">

            <!-- GRAN TORINO -->
            <div class="screen">
                <div class="screenText">
                    <h2>Gran Torino</h2>
                    <p>Gran Torino de sont vrai nom Sorahiko est un ancien héros et un ancien professeur du Lycée Yuei. Il fût le mentor de Toshinori Yagi puis le maître de stage d'Izuku Midoriya mais également le meilleur ami de Nana Shimura et prédécesseur de Toshinori Yagi.</p>
                </div>
            </div>

            <!-- NANA SHIMURA  -->
            <div class="screen">
                <div class="screenText">
                    <h2>Nana Shimura</h2>
                    <p>Nana Shimura est la septième détentrice du One For All, le mentor de Toshinori Yagi et une amie de Grand Torino. Elle fut tuée lors d'un affrontement avec All For One.</p>
                </div>
            </div>

            <!-- ALL FOR ONE -->
            <div class="screen">
                <div class="screenText" id="nemesis">
                    <h2>All For One</h2>
                    <p>All For One est le fondateur de l'Alliance des super-vilains ainsi que le mentor de Tomura Shigaraki. Véritable antagoniste des détenteurs du One For All, son existence est une véritable légende. All For One est un psychopathe, un égoïste, un misanthrope et un manipulateur. Il n'hésite pas à exploiter les gens pour son propre gain. Il est suggéré qu'il est aussi très charismatique puisqu'il a pu rapidement ramener plusieurs bandits à sa cause et renverser les règles du Japon.</p>
                </div>
            </div>


        </section>

        <!-- PERSONNAGES SECONDAIRE SHOW 2 -->
        <section class="split2" id="eleve">

            <!-- IZUKU MIDORIYA -->
            <div class="screen2">
                <div class="screenText">
                    <h2>Izuku Midoriya</h2>
                    <p>Izuku Midoriya ou Deku est le personnage principal du manga My Hero Academia. Né Sans-Alter, il attirera l'attention d'All Might pour son héroïsme et deviendra l'héritier de son Alter : le One For All. Poursuivant ses études au lycée Yuei , dans la seconde A, afin de devenir un héros professionnel, Izuku aura la lourde tâche en tant que neuvième détenteur du One for All de devenir le nouveau symbole de la paix après All Might.</p>
                </div>
            </div>

            <!-- KATSUKI BAKUGO -->
            <div class="screen2">
                <div class="screenText">
                    <h2>Katsuki Bakugo</h2>
                    <p>Katsuki by Bakugo est un élève du lycée Yuei, dans la seconde A, et le rival d'Izuku Midoriya. Son rêve est de devenir le héros le plus puissant de la planète et ainsi détrôner All Might son idol.</p>
                </div>
            </div>

        </section>

    </main>

    <!--  inclusion PHP FOOTER -->
    <?php require_once("include/footer.inc.php") ?>

</body>

</html>
