<?php
    session_start(); 
    require_once "conn.php";

    $content = strip_tags($_POST["content"]);
    $account_id = $_SESSION["account_id"]; 
    // Ik weet niet zeker of je user(tabelnaam)en dan id moet schrijven 
    // Of gelijk session [id]
    if (isset($_POST['submited'])) {
        $content = strip_tags($_POST["content"]);
        $insert_tweets = $conn->prepare("INSERT INTO tweets(Content,account_id) VALUES( :content,:account_id )");
        $insert_tweets->bindParam(":content", $content);
        $insert_tweets->bindParam(":account_id", $account_id);
        $insert_tweets->execute();
        header("location: logged_in_user.php");
        exit();

    }
    ?>