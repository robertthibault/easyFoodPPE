<div class="conteneur">
    <?php include_once 'haut.php' ;?>
    <main>
        <div class='texteAccueil'>
            <h1><span>Détail de votre commande</span></h1>
            <?php
            echo tabDetail($leDetail, $enteteDetail, 'tabDetail');
            $formulaireBoutonRetour->afficherFormulaire();
            ?>
        </div>
    </main>
    <footer>
        <?php include_once 'bas.php' ;?>
    </footer>
</div>