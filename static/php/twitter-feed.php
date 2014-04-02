<?php
session_start();
require_once("twitteroauth/twitteroauth.php");

// Replace the keys below - Go to https://dev.twitter.com/apps to create the Application
$consumerkey = "LzublsX0Lvoiujb2qB1GQ";
$consumersecret = "guezmp5g5CSEJ7bm64PdWPUAfJ9ApaXaRsIW7OrEt6w";
$accesstoken = "8025542-M8t3edP7axmeZ5JZP39gtwOVMk0PSzlBjQPAv5ZZ9j";
$accesssecret = "W5TSTRBvw4IIw2ZqOW5BfpOgn3JUcrJEh1F77qzR1Wu1O";


$twitteruser = $_GET['twitteruser'];
$notweets = $_GET['notweets'];

function getConnectionWithAccessToken($cons_key, $cons_secret, $oauth_token, $oauth_token_secret) {
	$connection = new TwitterOAuth($cons_key, $cons_secret, $oauth_token, $oauth_token_secret);
	return $connection;
}

$connection = getConnectionWithAccessToken($consumerkey, $consumersecret, $accesstoken, $accesssecret);
$tweets = $connection->get("https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=".$twitteruser."&count=".$notweets);

echo json_encode($tweets);
?>