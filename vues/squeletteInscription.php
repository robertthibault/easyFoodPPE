<div classe="conteneur">
    <header>
        <?php include_once 'haut.php' ;?>
    </header>

    <main>
        <div class='texteAccueil'>
            <h1><span>Formulaire inscription</span></h1>
        </div>
        <div id="laform">
            <?php $formulaireInscription->afficherFormulaire();
            ?>
        </div>
    </main>
</div>