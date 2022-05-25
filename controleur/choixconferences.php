<?php
include "./vue/entete.php";
$btn = "Inscription";

$heurecreneaux=donnerLesHeuresCreneaux();

if(isset($_POST['10h'])){
	print_r($_SESSION['tab']);
	$heure="10h.".$_POST['10h'];
enregistre($heure,$_SESSION['tab']);
echo "Inscription pour 10h reussis";
}
if(isset($_POST['11h30'])){
	$heure="11h30.".$_POST['11h30'];
enregistre($heure,$_SESSION['tab']);
echo "Inscription pour 11h30 reussis";
}
if(isset($_POST['14h'])){
	$heure="14h.".$_POST['14h'];
enregistre($heure,$_SESSION['tab']);
echo "Inscription pour 14h reussis";
}
if(isset($_POST['16h'])){
	$heure="16h.".$_POST['16h'];
enregistre($heure,$_SESSION['tab']);
echo "Inscription pour 16h reussis";
}
include "./vue/vueChoixConferences.php";
