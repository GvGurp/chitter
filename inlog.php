<?php session_start();
require_once "conn.php";
$gebruikersnaam = strip_tags($_POST["gebruikersnaam"]);
$wachtwoord = strip_tags($_POST["wachtwoord"]);
$_SESSION["gebruikersnaam"] = $gebruikersnaam;
echo "$gebruikersnaam en $wachtwoord"; 
$query = $conn->prepare("SELECT * FROM users WHERE Gebruikersnaam = :gebruikersnaam");
$query->bindParam(":gebruikersnaam", $gebruikersnaam);
$query->execute();

if ($query->rowCount() == 1) {
    
    $result = $query->fetch(PDO::FETCH_ASSOC);

    

    if (password_verify($wachtwoord, $result['wachtwoord'])) {
        $_SESSION["gebruikersnaam"] = $gebruikersnaam;
        
        header("location: logged_in_user.php");

        
    } else {
        header("location: fout_inlog_formulier.php");
    }
} ?>