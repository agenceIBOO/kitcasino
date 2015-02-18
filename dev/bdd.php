<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Devis Kit Casino</title>
<style>
</style>
</head>
<body>

<?php

include "connect.php";
require('phpToPDF.php');

$sql = "SELECT * FROM donnees ORDER BY ID DESC";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        if (empty($row["nom"])){
            echo "";
        } else {
        echo "<hr>"."<p>"."#".$row['ID']."<br>".
        "Nom: " . $row["nom"]."<br>".
        "Prénom: " . $row["prenom"]."<br>".
        "Adresse: " . $row["adresse"]."<br>".
        "Téléphone: " . $row["tel"]."<br>".
        "E-mail: ". $row["email"]."<br>".
        "Adresse de la soirée: ". $row["adresse2"]."<br>".
        "Date de la soirée: " . $row["date"]."<br>".
        "Nombre d'invités: " . $row["nb_invite"]."<br>".
        "Type d'évènement: " . $row["evenement"]. "<br>".
        "Jeux choisis: ". $row["jeux"]."</p>";
    } }
} else {
    echo "Vous n'avez pas de devis en attente pour le moment :)";
}

mysqli_close($conn);
?>

</body>
</html>
