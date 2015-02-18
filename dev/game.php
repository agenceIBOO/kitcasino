<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Confirmation</title>
<style>
</style>
</head>
<body>

<?php

include "connect.php";

$game = implode(',', $_POST['game']);

$sql = "INSERT INTO donnees (jeux)
VALUES ('$game')";

if (mysqli_query($conn, $sql)) {
    echo "";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>

</body>
</html>
