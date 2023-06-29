<?php
session_start();

require_once "conn.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Chirpify</title>
 <link rel="stylesheet" href="main.css">

</head>
<body>
<section class="homepage homeregistratie">

    <div class="sidebar">

      <img class="logo" src="img/chitter.png" width="48px" height="48px" alt="chitterlogo">

      <ul>

        <li><a href="logged_in_user.php">Home</a></li>

        <li><a href="profiel_bewerken.php">Profiel</a></li>

      </ul>

      <div class="spacer"></div>

    </div>

    </div>




    <div class="feed">

      <h1>Profiel bijwerken</h1>






      <?php

      $gebruiker = $_SESSION['gebruikersnaam'];

      $query = $conn->prepare("SELECT * FROM users WHERE Gebruikersnaam = :gebruikersnaam");

      $query->bindParam(':gebruikersnaam', $gebruiker);

      $query->execute();




      $resultaat = $query->fetchAll();

      foreach ($resultaat as $gebruiker) {

        echo '<div class="post"><form class="registratieformulier" action="profiel_bewerken_vervolg.php" method="post">           

    <label for="gebruikersnaam">Gebruikersnaam</label>

    <input type="text" id="gebruikersnaam" name="gebruikersnaam">

    <label for="nieuwe_gebruikersnaam">Nieuwe gebruikersnaam</label>

    <input type="text" id="nieuwe_gebruikersnaam" name="nieuwe_gebruikersnaam">

    <label for="wachtwoord" name="wachtwoord">Wachtwoord</label>

    <input type="password" id="wachtwoord" name="wachtwoord">

    <input type="submit" value="Profiel bewerken" name="profielbewerken1">
    </form></div> ';
      }

 ?>




</body>




</html>