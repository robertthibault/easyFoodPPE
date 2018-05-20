<?php

function tableauHtml($tab,$entete , $classEntete, $classTab, $classLigne){
    $res = "<table class='" . $classTab ."'>";
    if(count($entete)>0){
        $res .= "<tr>";
        foreach ($entete as $cellule){
            $res .= "<th class='" . $classEntete . "'>" . $cellule . "</th>";
        }
        $res .= "</tr>";
    }
    if(count($tab)>0){
        foreach ($tab as  $ligne) {
            $res .= "<tr class='" . $classLigne . "'>";
            foreach ($ligne as $cellule) {
                $res .= "<td>" . $cellule . "</td>";
            }
            $res .= "</tr>";
        }
    }
    $res .= "</table>";
    return $res;
}

function tabCommentaire($tab, $entete, $classTab){
    $res = "<table class='" . $classTab . "'>";
    if(count($entete)){
        $res .= "<tr>";
        foreach ($entete as $cellule){
            $res .= "<th>" . $cellule . "</th>";
        }
        $res .= "</tr>";
    }
    if (count($tab) > 0){
        foreach($tab as $ligne){
            $compteur = $ligne['IDR'] . $ligne['IDU'];
            $res .= "<tr><td>";
            $res .= $ligne['NOMU'] . "</td><td>";
            $res .= $ligne['PRENOMU'] . "</td><td>";
            $res .= $ligne['NOMR'] . "</td><td>";
            $res .= $ligne['COMMENTAIRERESTO'] . "</td><td>";
                $res .= '<div class="toggle-radio">
                    <input type="radio" name="rdo'. $compteur .'" id="yes'. $compteur .'" value="oui">
                    <input type="radio" name="rdo'. $compteur .'" id="no'. $compteur .'" checked="checked" value="non">
                    <div class="switch'. $compteur .'">
                        <label for="yes">Oui</label>
                        <label for="no">Non</label>
                        <span></span>
                    </div>
                </div>';
        }
    }
    $res .= "</table>";
    return $res;
}

function tabCommentaire2($tab, $entete, $classTab){
    $res = "<table class='" . $classTab . "'>";
    if(count($entete)){
        $res .= "<tr>";
        foreach ($entete as $cellule){
            $res .= "<th>" . $cellule . "</th>";
        }
        $res .= "</tr>";
    }
    if (count($tab) > 0){
        foreach($tab as $ligne){
            $compteur = $ligne['IDU'];
            $res .= "<tr><td>";
            $res .= $ligne['NOMU'] . "</td><td>";
            $res .= $ligne['PRENOMU'] . "</td><td>";
            $res .= $ligne['COMMENTAIREEASYFOOD'] . "</td><td>";
            $res .= '<div class="toggle-radio">
                    <input type="radio" name="rdo'. $compteur .'" id="yes'. $compteur .'" value="oui">
                    <input type="radio" name="rdo'. $compteur .'" id="no'. $compteur .'" checked="checked" value="non">
                    <div class="switch'. $compteur .'">
                        <label for="yes">Oui</label>
                        <label for="no">Non</label>
                        <span></span>
                    </div>
                </div>';
        }
    }
    $res .= "</table>";
    return $res;
}

function tabPlat($tab, $entete, $classTab){
    $res = "<table class='" . $classTab . "'>";
    if(count($entete)){
        $res .= "<tr>";
        foreach ($entete as $cellule){
            $res .= "<th>" . $cellule . "</th>";
        }
        $res .= "</tr>";
    }
    if (count($tab) > 0){
        foreach($tab as $ligne){
            $compteur = $ligne['IDP'];
            $res .= "<tr><td>";
            $res .= $ligne['NOMR'] . "</td><td>";
            $res .= $ligne['NOMP'] . "</td><td>";
            $res .= $ligne['DESCRIPTIONP'] . "</td><td>";
            $res .= '<div class="toggle-radio">
                    <input type="radio" name="rdo'. $compteur .'" id="yes'. $compteur .'" value="oui">
                    <input type="radio" name="rdo'. $compteur .'" id="no'. $compteur .'" checked="checked" value="non">
                    <div class="switch'. $compteur .'">
                        <label for="yes">Oui</label>
                        <label for="no">Non</label>
                        <span></span>
                    </div>
                </div>';
        }
    }
    $res .= "</table>";
    return $res;
}

function tabHistorique($tab, $entete, $classTab){
    $res = "<table class='" . $classTab . "'>";
    if(count($entete)){
        $res .= "<tr>";
        foreach ($entete as $cellule){
            $res .= "<th>" . $cellule . "</th>";
        }
        $res .= "</tr>";
    }
    if (count($tab) > 0){
        $i = 0;
        foreach($tab as $ligne){
            $res .= "<tr><td>";
            $res .= $ligne['IDC'] . "</td><td>";
            $res .= $ligne['DATEC'] . "</td><td>";
            $lePrix = CommandeDAO::prixCommande($ligne['IDC']);
            $total = 0;
            foreach($lePrix as $montant){
                $total += $montant['prix'];
            }
            $res .= $total . "</td><td>";
            $res .= $ligne['MODEREGLEMENTC'] . "</td><td>";
            if($ligne['COMMENTAIRECLIENTC'] == null){
                $res .= " ABS </td><td>";
            }
            else{
                $res .= $ligne['COMMENTAIRECLIENTC'] . "</td><td>";
            }
            $res .= "<a href = 'index.php?commentaire=" . $ligne['IDC'] ."'>";
            $res .= "<img src='images/modifier-icone.png' alt='lien'></a></td><td>";
            $res .= "<a href = 'index.php?commande=" . $ligne['IDC'] ."'>";
            $res .= "<img src='images/plus-icone.png' alt='lien'></a></td></tr>";
            $i++;
        }
    }
    $res .= "</table>";
    return $res;
}

function tabDetail($tab, $entete, $classTab){
    $res = "<table class='" . $classTab . "'>";
    if(count($entete)){
        $res .= "<tr>";
        foreach ($entete as $cellule){
            $res .= "<th>" . $cellule . "</th>";
        }
        $res .= "</tr>";
    }
    if (count($tab) > 0){
        foreach($tab as $ligne){
            $res .= "<tr><td>";
            $res .= $ligne['NOMP'] . "</td><td>";
            $res .= $ligne['PRIXCLIENTP'] . "</td><td>";
            $res .= $ligne['QUANTITE'] . "</td><td>";
            $res .= $ligne['total'] . "</td></tr>";
        }
    }
    $res .= "</table>";
    return $res;
}
function tabPlats(array $plats){
    if (empty($plats))
        return "<p>Vous n'avez aucun plat.</p>";
    $entete = [];
    $entete[0] = "Nom";
    $entete[1] = "Type";
    $entete[2] = "Prix fournisseur";
    $entete[3] = "Prix client";
    $entete[4] = "Visibilité";
    $entete[5] = "Description";
    $res = "<table class='tab'>";
    $res .= "<tr>";
    foreach ($entete as $cellule) {
        $res .= "<th>" . $cellule . "</th>";
    }
    $res .= "</tr>";
    foreach ($plats as $plat) {
        $visible = "Non visible";
        if ($plat->getPlatVisible())
            $visible = "Visible";
        $res .= "<tr>";
        $res .= "<td>" . $plat->getNomP() . "</td>";
        $res .= "<td>" . $plat->getTypePlat()->getLibelleT() . "</td>";
        $res .= "<td>" . $plat->getPrixFournisseurP() . " €</td>";
        $res .= "<td>" . $plat->getPrixClientP() . " €</td>";
        $res .= "<td>" . $visible . "</td>";
        $res .= "<td>" . $plat->getDescriptionP() . "</td>";
        $res .= "<td><a href = 'index.php?easyFoodMP=ModifPlat&id=" . $plat->getIdP() . "&action=modif'>Modifier</a>
                     <a href = 'index.php?easyFoodMP=ModifPlat&id=" . $plat->getIdP() . "&action=supp'>Supprimer</a></td>";
        $res .= "</tr>";
    }
    $res .= "</table>";
    return $res;
}

function tabEvaluerResto($tab, $entete, $classTab){
    $res = "<table class='" . $classTab . "'>";
    if(count($entete)){
        $res .= "<tr>";
        foreach ($entete as $cellule){
            $res .= "<th>" . $cellule . "</th>";
        }
        $res .= "</tr>";
    }
    if (count($tab) > 0){
        foreach($tab as $ligne){
            $res .= "<tr><td>";
            $res .= $ligne['NOMR'] . "</td><td>";
            $idResto = RestoDAO::cherhceID($ligne['NOMR']);
            $Evaluation = EvaluerDAO::evaluer($_SESSION['identification']['IDU'], $idResto);
            if($Evaluation[0]['EXISTE'] == 0){
                $res .= " ABS </td><td>";
                $res .= " ABS </td><td>";
                $res .= " ABS </td><td>";
                $res .= " ABS </td><td>";
                $res .= " ABS </td><td>";
            }
            else{
                $res .= $Evaluation[0]['NOTEQUALITENOURRITURE'] . "</td><td>";
                $res .= $Evaluation[0]['NOTERESPECTRECETTE'] . "</td><td>";
                $res .= $Evaluation[0]['NOTEESTHETIQUE'] . "</td><td>";
                $res .= $Evaluation[0]['NOTECOUT'] . "</td><td>";
                $res .= $Evaluation[0]['COMMENTAIRERESTO'] . "</td><td>";
            }
            $res .= "<a href = 'index.php?evaluation=" . $idResto . "-". $_SESSION['identification']['IDU'] . "'>";
            $res .= "<img src='images/modifier-icone.png' alt='lien'></a></td></tr>";
        }
    }
    $res .= "</table>";
    return $res;
}

/*
function tabAnnee($tab, $entete, $classTab){
    $res = "<table class='" . $classTab . "'>";
    if(count($entete)){
        $res .= "<tr>";
        foreach ($entete as $cellule){
            $res .= "<th>" . $cellule . "</th>";
        }
        $res .= "</tr>";
    }
    if (count($tab) > 0){
        foreach($tab as $annee){
            $res .= "<tr><td>";
            $res .= $annee->getAnnee() . "</td><td>";
            $m = implode(",", ReservationDAO::lesCompter($annee->getAnnee()));
            $m = explode(",", $m);
            $res .= $m[0] . "</td><td>";
            $zm = implode(",", ReservationDAO::compterAvoir($annee->getAnnee()));
            $zm = explode(",", $zm);
            $res .= $zm[0] . "</td><td>";
            $zc = implode(",", ReservationDAO::compterDeposeCetteAnnee($annee->getAnnee()));
            $zc = explode(",", $zc);
            $res .= $zc[0] . "</td></tr>";
        }
    }
    $res .= "</table>";
    return $res;
}*/