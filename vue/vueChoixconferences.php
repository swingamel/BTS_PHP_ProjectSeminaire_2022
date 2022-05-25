<form action="./?action=choixconferences" method="POST">
	<table><?php foreach(donnerLesHeuresCreneaux() as $heure){
	echo"<th>";
	echo $heure->heure;
	echo "</th>
	<th>Salle</th>";
		foreach(donnerLesConferences($heure) as $conf){
			echo"<tr>";
			echo"<td>";
			echo $conf->description;
			echo"</td>";
			echo"<td>";
			echo $conf->salle;
			echo "</td>";
			echo"<td>";
			?>
			<input type= "radio" name="<?php echo $heure->heure ;?>"
                     value="<?php echo $conf->id;?>">
					 <?php
			echo"</td>";
			echo"</tr>";
		}
	}?>
	<table>
		<tr>
			<td><input type="submit" value="valider" name="btn"></td>
			<td><input type="reset" value="annuler" name="btn"></td>
		<tr>
	</table>
</form>
<?php
	
include "./vue/pied.php";
?>
