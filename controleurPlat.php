<?php

$plats = PlatDAO::all();

/*$formulairePlat = new Formulaire('post', 'index.php', 'fPlat', '');

foreach ($plats as $plat) {


$formulairePlat->ajouterComposantLigne($formulairePlat->creerInputImage($plat->getNomP(),$plat->getIdP(),"images/".$plat->getIdP().".jpg"),2);
$formulairePlat->ajouterComposantLigne($formulairePlat->creerLabelFor($plat->getNomP(), $plat->getNomP()), 1);
$formulairePlat->ajouterComposantLigne($formulairePlat->creerInputButton("Ajouter","Ajouter_".$plat->getNomP()), 1);
$formulairePlat->ajouterComposantTab();

}

$formulairePlat->creerFormulaire();


// <table><tbody><tr><td><tr>
//          <td colspan=2>IMAGE</td>
//        </tr>
//        <tr>
//          <td>Plat</td>
//          <td>Ajouter</td>
//        </tr>
//      </td>
//      <td>
//      </td>
//      <td>
//      </td>
//    </tr>
//  </tbody>
// </table>
/*echo '<div id="listeplat">
  <div classe="content">
  blblbl
  </div>
  <div classe="content">
  zszszszs
  </div>
  <div classe="content">
  wdwdwdwdwd
  </div>
</div>';


*/

//------------------------------------------------------------------------------
$tablePlat="<div class='lesPlats'>";
foreach ($plats as $plat) {
  $tablePlat .= "<div class='unPlat'>";
          $tablePlat .= "<div class='image'>";
              $tablePlat .= "<img src='images/". $plat->getIdP() .".jpg' alt='plat". $plat->getIdP()."' align='middle'>";
          $tablePlat .= "</div >";
          $tablePlat .= "<div class='labelBouton'>";
              $tablePlat .= "<div class='label'>";
                    $tablePlat .= $plat->getNomP();
              $tablePlat .= "</div >";
              $tablePlat .= "<div class='bouton'>";
                    $tablePlat .= "<form><input type='button' value='Ajouter'/></form>";
              $tablePlat .= "</div >";
          $tablePlat .= "</div >";
  $tablePlat .= "</div >";
}

$tablePlat .= "</div>";

include_once "vues/squelettePlat.php";

?>
