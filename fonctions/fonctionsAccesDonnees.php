<?php

/**
 * @access private
 * @return type
 */
function chargeJSONseminaire()
{
    $json = file_get_contents("./data/seminaire.json");
    $parsed_json = json_decode($json);
    return $parsed_json;
}

/**
 * @access private
 * @return type
 */
function chargeJSONprofessions()
{
    $json = file_get_contents("./data/professions.json");
    $parsed_json = json_decode($json);
    return $parsed_json;
}

/**
 * @access private
 * @param type $doc
 */
function sauveJSONseminaire($doc)
{
    file_put_contents('./data/seminaire.json', $doc);
}

/**
 * @access private
 * @return type
 */
function chargeJSONadmin()
{
    $json = file_get_contents("./data/admin.json");
    $parsed_json = json_decode($json);
    return $parsed_json;
}

/**
 * Retourne l'intitulé du séminaire
 * @return chaîne
 */
function donnerIntituleSeminaire()
{
    $intSem = chargeJSONseminaire()->seminaire->intitule;
    return $intSem;
}

/**
 * Retourne la liste de tous les créneaux horaires, heures de début des conférences
 * le tableau retourné commence à l'indide 0
 * @return  tableau 
 * 
 */
function donnerLesHeuresCreneaux()
{
    $tab = array();
    foreach (chargeJSONseminaire()->seminaire->creneau as $heure) {
        $tab[] = $heure;
    }
    return $tab;
}
/**
 * Retourne toutes les conférences commençant à l'heure donnée sous forme d'un tableau
 * @param chaîne $heure
 * @return  tableau 
 */
function donnerLesConferences($heure)
{
    $tab = array();
    foreach ($heure->conference as $heures) {
        $tab[] = $heures;
    }
    return $tab;
}

/**
 * Enregistre les informations d'un visiteur
 * @param chaîne $nom
 * @param chaîne $prenom
 * @param chaîne $mail
 * @param chaîne $ville
 * @param chaîne $profession
 */
function sauverDonneesInscription($nom, $prenom, $mail, $ville, $profession)
{
    $_SESSION['nom'] = $nom;
    $_SESSION['prenom'] = $prenom;
    $_SESSION['mail'] = $mail;
    $_SESSION['ville'] = $ville;
    $_SESSION['profession'] = $profession;
}

/**
 * Retourne toutes les professions possibles
 * le tableau retourné commence à l'indice 0
 * @return  tableau 
 */
function donnerLesProfessions()
{
    $tab = array();
    foreach (chargeJSONprofessions()->professions as $profession) {
        $tab[] = $profession;
    }
    return $tab;
}

/**
 * Vérifie si le visiteur a déjà rempli son formulaire d'inscription
 * @return boolean
 */
function estInscrit()
{
    if (isset($_SESSION['nom'])) {
        return true;
    }
    return false;
}

/**
 * Enregistre un participant et ses choix de conférences
 * @param tableau $lesChoix : les choix du participant
 */
function enregistre($lesChoix, $Seminaire)
{
    $chargement = chargeJSONseminaire();
    $choix = explode(".", $lesChoix);
    $c = 0;
    foreach (donnerLesHeuresCreneaux() as $a) {
        if ($a->heure == $choix[0]) {
            $z = $a;
            break;
        }
        $c = $c + 1;
    }
    $g = 0;
    foreach (donnerLesConferences($z) as $v) {
        if ($v->id == $choix[1]) {
            $vez = $v;
            break;
        }
        $g = $g + 1;
    }
    $tab = array("nom" => $Seminaire[0], "prenom" => $Seminaire[1], "profession" => $Seminaire[2], "ville" => $Seminaire[3], "mail" => $Seminaire[4]);
    array_push($chargement->seminaire->creneau[$c]->conference[$g]->participants, $tab);
    $p = json_encode($chargement);
    sauveJSONseminaire($p);
}

/**
 * Retourne toutes conférences sous forme d'un tableau
 * Le tableau commençe à l'indice 0
 * Chaque ligne du tableau contient les information sur une conférence :
 * son id, son creneau,sa description, son intervenant, sa salle et son nbPlaces
 * @return tableau
 */
function donnerToutesLesConferences()
{
    $e = chargeJSONseminaire();
    $x = array();
    foreach (donnerLesHeuresCreneaux() as $v) {
        foreach (donnerLesConferences($v) as $ve) {
            $x[] = $ve;
        }
    }
    return $x;
}

/**
 * Retourne tous les participants inscrits à une conférence dont on fournit le numéro
 * Chaque ligne du tableau retourné contient le nom, le prénom, la profession,
 * la ville et le mail d'un participant
 * @param entier $numConference
 * @return  tableau 
 */
function donnerParticipants($numConference)
{
    $document = chargeJSONseminaire();
    $tab = array();

    $conference = $document->seminaire->creneau;
    foreach ($conference as $element) {
        foreach ($element->conference as $element) {
            if ($element->id == $numConference) {
                foreach ($element->participants as $part) {
                    $tab[] = $part;
                }
            }
        }
    }
    return $tab;
}
