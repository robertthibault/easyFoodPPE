<div id="conteneur">
    <?php include_once 'haut.php' ;?>
        <main> <!--onload="debut()"-->
            <!-- <script type="text/javascript" src="lib/tableauEditer.js"></script> -->
            <p>
                <?php
                ?>
                <?php
                    //echo '<form id="voir" ">
                    //<h3>Choisir une option</h3>
                    //<input type="radio" name="rb" id="rb1" onclick="tabCommentaire()"/>
                    //<label for="rb1">Les commentaires</label>
                    //<input type="radio" name="rb" id="rb2" onclick="tabPlat()"/>
                    //<label for="rb2">Les plats</label>
            //</form>
            //</p>';
                if($etat == 0){
                    $formulaireListeBouton->afficherFormulaire();
                }
                elseif ($etat == 1){
                    echo "<form method = 'post' action = 'index.php' name = 'formulaireAvoirComResto' id = 'formulaireAvoirComResto' class = 'formulaireAvoirComResto' >";
                    echo tabCommentaire($tabEvaluer, $enteteEvaluer, 'tab');
                    echo "<input type = 'submit' name = 'submitBtnConfirmer' id = 'submitBtnConfirmer' value = 'Confirmer'/>";
                    echo "</form>";
                }
                elseif ($etat == 2){
                    echo "<form method = 'post' action = 'index.php' name = 'formulaireAvoirComSite' id = 'formulaireAvoirComSite' class = 'formulaireAvoirComSite' >";
                    echo tabCommentaire2($tabEvaluerSite, $enteteEasyFood, 'tab');
                    echo "<input type = 'submit' name = 'submitBtnConfirmer2' id = 'submitBtnConfirmer2' value = 'Confirmer'/>";
                    echo "</form>";
                }
                elseif ($etat == 3){
                    echo "<form method = 'post' action = 'index.php' name = 'formulaireAvoirPlat' id = 'formulaireAvoirPlat' class = 'formulaireAvoirPlat' >";
                    echo tabPlat($tabEvaluerPlat, $entetePlat, 'tab');
                    echo "<input type = 'submit' name = 'submitBtnConfirmer3' id = 'submitBtnConfirmer3' value = 'Confirmer'/>";
                    echo "</form>";
                }
                ?>

        </main>
    </div>