<?php if (estAdmin()) {
    include "./vue/enteteConnexion.php";
} else {
    include "./vue/entete.php";
}
?>

<head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="css/global.css" />
</head>
<table><?php foreach (donnerToutesLesConferences() as $numConference) {
            foreach (donnerLesHeuresCreneaux() as $heure) {
                echo "<th>";
                echo $numConference->id;
                echo "</th>";
                echo "<th>";
                echo $heure->heure;
                echo "</th>";
                echo "<th>";
                echo $numConference->description;
                echo "</th>";
                foreach (donnerParticipants($numConference) as $numc) {
                    echo "<tr>";
                    echo "<td>";
                    echo $numc->nom;
                    echo "</td>";
                    echo "<td>";
                    echo $numc->prenom;
                    echo "</td>";
                    echo "<td>";
                    echo $numc->ville;
                    echo "</td>";
                    echo "<td>";
                    echo $numc->profession;
                    echo "</td>";
                    echo "<td>";
                    echo $numc->mail;
                    echo "</td>";
                    echo "</tr>";
                }
            }
        } ?>
    <table>
        <?php
        include "./vue/pied.php";
        ?>