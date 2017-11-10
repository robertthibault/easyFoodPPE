<?php

$formulaireInscription = new Formulaire('post', 'index.php', 'fInscription', '');

$formulaireInscription->ajouterComposantLigne($formulaireInscription->creerLabelFor("nom", "Nom :"), 1);
$formulaireInscription->ajouterComposantLigne($formulaireInscription->creerInputTexte("nom", "nom", '',1, ''), 1);
$formulaireInscription->ajouterComposantTab();

$formulaireInscription->ajouterComposantLigne($formulaireInscription->creerLabelFor("prenom", "Prénom :"), 1);
$formulaireInscription->ajouterComposantLigne($formulaireInscription->creerInputTexte("prenom", "prenom", '',1, ''), 1);
$formulaireInscription->ajouterComposantTab();

$formulaireInscription->ajouterComposantLigne($formulaireInscription->creerLabelFor("civilite", "Civilite:"), 1);
$formulaireInscription->ajouterComposantLigne($formulaireInscription->creerRadioButton("civilite", "civilite1", "M");
$formulaireInscription->ajouterComposantLigne($formulaireInscription->creerRadioButton("civilite", "civilite2", "Mme");
$formulaireInscription->ajouterComposantTab();

$formulaireInscription->ajouterComposantLigne($formulaireInscription->creerLabelFor("typeU", "Vous êtes ?"), 1);
$formulaireInscription->ajouterComposantLigne($formulaireInscription->creerRadioButton("typeU", "typeU1", "restaurateur");
$formulaireInscription->ajouterComposantLigne($formulaireInscription->creerRadioButton("typeU", "typeU2", "client");
$formulaireInscription->ajouterComposantTab();

$formulaireInscription->ajouterComposantLigne($formulaireInscription->creerLabelFor("email", "Email:"), 1);
$formulaireInscription->ajouterComposantLigne($formulaireInscription->creerInputTexte("email", "email", '',1, ''), 1);
$formulaireInscription->ajouterComposantTab();

$formulaireInscription->ajouterComposantLigne($formulaireInscription->creerLabelFor("mdp", "Mot de passe:"), 1);
$formulaireInscription->ajouterComposantLigne($formulaireInscription->creerInputPass("mdp", "mdp", '');
$formulaireInscription->ajouterComposantTab();

$formulaireInscription->ajouterComposantLigne($formulaireInscription->creerLabelFor("mdp2", "Confirmation mot de passe:"), 1);
$formulaireInscription->ajouterComposantLigne($formulaireInscription->creerInputPass("mdp2", "mdp2", '');
$formulaireInscription->ajouterComposantTab();

$formulaireInscription->ajouterComposantLigne($formulaireInscription->creerInputSubmit("inscrire", "inscrire", "M'inscrire"),1);;
$formulaireInscription->ajouterComposantTab();



$formulaireInscription->creerFormulaire();
