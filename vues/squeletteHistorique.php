<div class="conteneur">
    <?php include_once 'haut.php' ;?>
    <main>
        <div class='texteAccueil'>
            <h1><span>Historique de vos commandes</span></h1>
            <?php
            echo tabHistorique($lHisorique, $entete, 'tab');
            ?>
        </div>
    </main>
    <footer>
        <?php include_once 'bas.php' ;?>
    </footer>
</div>