<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Vos jeux</title>
<style>

</style>
</head>
<body>

<form method="post" action="game.php">
  <p>
    Cochez les jeux désirés pour votre soirée:<br>
      
      <label for="blackjack"><img src="img/blackjack.jpg" alt=""></label>
      <INPUT id="blackjack" type="checkbox" value="Blackjack" name="game[]">    

      <label for="chuckaluck"><img src="img/chuckaluck.jpg" alt=""></label>
      <INPUT id="chuckaluck" type="checkbox" value="Chuck à Luck" name="game[]">

      <label for="roulette"><img src="img/roulette.jpg" alt=""></label>
      <INPUT id="roulette" type="checkbox" value="Roulette" name="game[]">

      <label for="stud"><img src="img/stud.jpg" alt=""></label>
      <INPUT id="stud" type="checkbox" value="Stud Poker" name="game[]">

      <label for="holdem"><img src="img/holdem.jpg" alt=""></label>
      <INPUT id="holdem" type="checkbox" value="Holdem Poker" name="game[]">

      <label for="boule"><img src="img/boule.jpg" alt=""></label>
      <INPUT id="boule" type="checkbox" value="La Boule" name="game[]">

    <input type="button" value="Retour en arrière" onClick="self.history.back();">
    <input type="submit" name="submit" value="Poursuivre">
  </p>
</form>
</body>
</html>
