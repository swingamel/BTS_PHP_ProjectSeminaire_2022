<?php
include "./fonctions/fonctionsGestion.php";
include "./fonctions/fonctionsAccesDonnees.php";

if (!isset($_POST["login"]) || !isset($_POST["mdp"])) {
    // on affiche le formulaire de connexion
    $titre = "authentification";
    include "vue/vueConnexion.php";
    include "vue/pied.php";
} else {
    $login = $_POST["login"];
    $mdp = $_POST["mdp"];

    verifier($login, $mdp);

    if (estAdmin()) {
        $titre = "authentification";
        include "vue/vueVoirinscriptions.php";
        include "vue/pied.php";
    }
}