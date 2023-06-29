<?php 
session_start();
require_once "conn.php";

if(isset($_POST['like'])) {
    $tweet_id = intval($_POST['like']);
    $account_id =  $_SESSION["account_id"];
  
    $query = $conn->prepare("SELECT * FROM likes WHERE account_id = :account_id AND tweets_id = :tweet_id");
    $query->bindParam(":account_id", $account_id);
    $query->bindParam(":tweet_id", $tweet_id);
    $query->execute();
    $liked = $query->fetch(PDO::FETCH_ASSOC);

    if(!$liked) { 
        $query = $conn->prepare("UPDATE tweets SET likes = likes + 1 WHERE id = :id");
        $query->bindParam(":id", $tweet_id);
        $query->execute();

        $query = $conn->prepare("INSERT INTO likes (account_id, tweets_id) VALUES (:account_id, :tweet_id)");
        $query->bindParam(":account_id", $account_id);
        $query->bindParam(":tweet_id", $tweet_id);
        $query->execute();
    }
}

header("Location: logged_in_user.php");
exit();
?>
