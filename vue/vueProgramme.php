<?php
include "./vue/entete.php";
?>

<head>
	<meta charset="utf-8">
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/global.css" />
</head>
<table><?php foreach(donnerLesHeuresCreneaux() as $heure){
	echo"<th>";
	echo $heure->heure;
	echo "</th>
	<th>Intervenant</th>;
	<th>Salle</th>";
		foreach(donnerLesConferences($heure) as $conf){
			echo"<tr>";
			echo"<td>";
			echo $conf->description;
			echo"</td>";
			echo"<td>";
			echo $conf->intervenant;
			echo"</td>";
			echo"<td>";
			echo $conf->salle;
			echo "</td>";
			echo"</tr>";
		}
	}?>
	<table>
<?php
include "./vue/pied.php";
?>