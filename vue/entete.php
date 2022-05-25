<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link href="css/global.css" rel="stylesheet" type="text/css">
        <title></title>
    </head>
<?php
include_once "fonctions/fonctionsAccesDonnees.php";
include_once "fonctions/fonctionsGestion.php";
?>
<body>
    <h1><?php echo donnerIntituleSeminaire()?></h1>
    <table name="menu">
		<tr>
			<td><a href="./?action=inscription"><B>Inscription</B></a></td>
            <td><a href="./?action=programme"><B>Voir le programme</B></a></td>
            <td><a href="./?action=choixconferences"><B>Choisir ses conférences</B></a></td>
            <td><a href="./?action=connexion"><B>Connexion admin</B></a></td>
            <td><a href="./?action=voirinscriptions"><B>Voir les inscrits aux conférences</B></a></td>
        </tr>
    </table>
</br>

