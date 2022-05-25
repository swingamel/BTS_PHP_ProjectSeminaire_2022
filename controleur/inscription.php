<?php
include "./fonctions/fonctionsGestion.php";
include "./fonctions/fonctionsAccesDonnees.php";

$btn = "Inscription";
if (isset($_POST["btn"])){
	$btn = $_POST["btn"];
}

switch ($btn){
	case "Annuler" :
      $nom = '';
      $prenom = '';
      $mail = '';
      $ville = '';

		break;
		
      case "Valider" :
         $nom = $_REQUEST['nom'];
         $prenom = $_REQUEST['prenom'];
         $mail = $_REQUEST['mail'];
         $ville = $_REQUEST['ville'];
         $profession = $_REQUEST['profession'];
         verifierDonneesInscription($nom, $prenom, $mail, $ville);
         $nbErreurs = donnerNbErreurs();
         if ($nbErreurs == 0) {
            sauverDonneesInscription($nom, $prenom, $mail, $ville, $profession);
         echo "<h2>Votre inscription a été prise en compte, il faut procéder au choix des conférences</h2>";
         echo estInscrit();
         }
         else {
            afficherErreurs();
         }
               break;
}

include "./vue/vueInscription.php";
