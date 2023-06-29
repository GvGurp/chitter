
<?php 
require_once "conn.php";
 // start the session to access $_SESSION variables
$account_id = $_SESSION["account_id"]; 
 
// Prepare to fetch all tweets with their respective usernames and likes.
$get_all_tweets = $conn->prepare("SELECT tweets.content, tweets.id, tweets.likes, users.Gebruikersnaam FROM tweets JOIN users ON tweets.account_id = users.id");

// Execute the query
$get_all_tweets->execute();
$tweets = $get_all_tweets->fetchAll();

// Display all tweets one by one
foreach ($tweets as $tweet) {
    echo "<div class='post'>".  $tweet["Gebruikersnaam"]. ":" . $tweet["content"] ." <br> Likes: " . $tweet["likes"] . "
    <form class='likebutton' action='like.php' method='post'><button  value='" . $tweet['id'] . "'  name='like'>like</button></form>" .
   "<form class='deleteknop' action='delete.php' method='POST'>
   <button class='deletebutton' name='delete' value='" . $tweet['id'] . "'>Delete</button> </form></div>" ;
    $_SESSION['tweet_id'] =  $tweet['id'];
}
   
?>