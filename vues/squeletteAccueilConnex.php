<div class="conteneur">
    <?php include_once 'haut.php' ;?>
    <main>
        <div class='texteAccueil'>
            <h1><span>Bienvenue <?php echo $_SESSION['identification']['PRENOMU'] . " " . $_SESSION['identification']['NOMU']?></span></h1>
        </div>
    </main>
    <footer>
        <?php include_once 'bas.php' ;?>
    </footer>
</div>