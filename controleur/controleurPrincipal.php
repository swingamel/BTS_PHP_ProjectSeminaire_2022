<?php
function controleurPrincipal($action){
    $lesActions = array();
    $lesActions["defaut"] = "inscription.php";
    $lesActions["programme"] = "programme.php";
    $lesActions["choixconferences"] = "choixconferences.php";
    $lesActions["connexion"] = "connexion.php";
    $lesActions["voirinscriptions"] = "voirInscriptions.php";
    
    if (array_key_exists ( $action , $lesActions )){
        return $lesActions[$action];
    }
    else{
        return $lesActions["defaut"];
    }

}
