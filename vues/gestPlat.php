<div class='texteAccueil'>
    <h1>Vos plats (<?php echo $_SESSION['identification']['PRENOMU'] . " " . $_SESSION['identification']['NOMU'] ?>)</h1>
    <a class="aButton" href = 'index.php?easyFoodMP=Proposer'>Proposer un plat</a>
    <?php echo tabPlats($plats) ?>
</div>