<?php
class Formulaire{
	private $method;
	private $action;
	private $nom;
	private $style;
	private $formulaireToPrint;

	private $ligneComposants = array();
	private $tabComposants = array();

	public function __construct($uneMethode, $uneAction , $unNom, $unStyle){
		$this->method = $uneMethode;
		$this->action = $uneAction;
		$this->nom = $unNom;
		$this->style = $unStyle;
	}


	public function concactComposants($unComposant ,$autreComposant){
		$unComposant .=  $autreComposant;
		return $unComposant ;
	}

	public function ajouterComposantLigne($unComposant ,$unNbCols){
		$temp = "<td";
		if($unNbCols > 1){
			$temp .= " colspan ='" . $unNbCols ."' ";
		}
		$temp .= ">" . $unComposant . "</td>";
		$this->ligneComposants[] = $temp;
	}

	public function ajouterComposantTab(){
		$this->tabComposants[] = $this->ligneComposants;
		$this->ligneComposants = array();
	}

	public function creerLabel($unLabel){
		$composant = "<label>" . $unLabel . "</label>";
		return $composant;
	}

	public function creerInputTexte($unNom, $unId, $uneValue , $required , $placeholder){
		$composant = "<input type = 'text' name = '" . $unNom . "' id = '" . $unId . "' ";
		if (!empty($uneValue)){
			$composant .= "value = '" . $uneValue . "' ";
		}
		if (!empty($placeholder)){
			$composant .= "placeholder = '" . $placeholder . "' ";
		}
		if ( $required = 1){
			$composant .= "required";
		}
		$composant .= "/>";
		return $composant;
	}

    public function creerInputTexteDisabled($uneValue){
        $composant = "<input type = 'text' disabled ";
        if (!empty($uneValue))
            $composant .= "value = '" . $uneValue . "'/>";
        return $composant;
    }

	public function creerInputPass($unNom, $unId, $uneValue, $required , $placeholder){
	    $composant = "<input type = 'password' name = '" . $unNom . "' id = '" . $unId . "' ";
	    if (!empty($uneValue)){
	        $composant .= "value = '" . $uneValue . "' ";
	    }
	    if (!empty($placeholder)){
	        $composant .= "placeholder = '" . $placeholder . "' ";
	    }
	    if ( $required = 1){
	        $composant .= "required";
	    }
	    $composant .= "/>";
	    return $composant;
	}

	/////////// RADIO BOUTON
	public function creerRadioButton($unNom, $uneValue, $unId, $unBool){
		$composant = "<input type = 'radio' name = '" . $unNom . "' id = '" . $unId . "' ";
		if($unBool){
		    $composant .= "checked= 'checked' ";
        }
		if (!empty($uneValue)){
				$composant .= "value = '" . $uneValue . "' ";
		}

		if (!empty($placeholder)){
				$composant .= "placeholder = '" . $placeholder . "' ";
		}
		if ( $required = 1){
				$composant .= "required";
		}
		$composant .= "/> <label for ='" . $uneValue . "'> " . $uneValue . "";
		return $composant;
	}

  //////////////////////////////////////////////////////
	public function creerLabelFor($unFor,  $unLabel){
		$composant = "<label id='". $unFor ."' for='" . $unFor . "'>" . $unLabel . "</label>";
		return $composant;
	}

	public function creerSelectResto($unNom, $unId, $unLabel, $options){
		$composant = "<select  name = '" . $unNom . "' id = '" . $unId . "' >";
		$i = 0;
		foreach ($options as $option){
			$composant .= "<option value = '";
			$tab = $options[$i];
			$composant .= $tab->getIdR();
			$i++;
			$composant .= "'> " . $tab->getNomR();
			$composant .= "</option>";
		}
		$composant .= "</select></td></tr>";
		return $composant;
	}

	public function creerSelectTypePlat($unNom, $unId, $options, $selected){
		$composant = "<select  name = '" . $unNom . "' id = '" . $unId . "' >";
		$i = 0;
		foreach ($options as $option) {
			$i++;
			$composant .= "<option value = '" . $option->getIdT() ."' ";
			if ($i == $selected) {
				$composant .= "selected='selected' ";
			}
			$composant .= ">" . $option->getLibelleT() . "</option>";
		}
		$composant .= "</select></td></tr>";
		return $composant;
	}

    ///////////////// CREER UN TEXTEAREA
    public function creerTextArea($ligne, $colonne, $value, $unNom, $unId, $unNBCarac, $placeholder){
        $composant = "<textarea name='". $unNom ."' id='". $unId ."' maxlength='". $unNBCarac ."' rows='" . $ligne . "' cols='" . $colonne . "' placeholder = '" . $placeholder . "' required='required'>";
        $composant .= $value;
        $composant .= "</textarea>";
        return $composant;
    }

	public function creerInputSubmit($unNom, $unId, $uneValue){
		$composant = "<input type = 'submit' name = '" . $unNom . "' id = '" . $unId . "' ";
		$composant .= "value = '" . $uneValue . "'/> ";
		return $composant;
	}

	public function creerInputImage($unNom, $unId, $uneSource){
		$composant = "<input type = 'image' name = '" . $unNom . "' id = '" . $unId . "' ";
		$composant .= "src = '" . $uneSource . "'/> ";
		return $composant;
	}

	public function creerInputLogo($unNom, $unId, $uneSource){
		$composant = "<input  type = 'image' name = '" . $unNom . "' id = '" . $unId . "' ";
		$composant .= "src = '" . $uneSource . "'/>";
		return $composant;
	}

	public function creerFormulaire(){
		$this->formulaireToPrint = "<form method = '" .  $this->method . "' ";
		$this->formulaireToPrint .= "action = '" .  $this->action . "' ";
		$this->formulaireToPrint .= "name = '" .  $this->nom . "' ";
		$this->formulaireToPrint .= "class = '" .  $this->style . "' ><table>";


		foreach ($this->tabComposants as $uneLigneComposants){
			$this->formulaireToPrint .= "<tr>";
			foreach ($uneLigneComposants as $unComposant){
				$this->formulaireToPrint .= $unComposant ;
			}
			$this->formulaireToPrint .= "</tr>";
		}
		$this->formulaireToPrint .= "</table></form>";
		return $this->formulaireToPrint ;
	}

	public function afficherFormulaire(){
		echo $this->formulaireToPrint ;
	}

}
