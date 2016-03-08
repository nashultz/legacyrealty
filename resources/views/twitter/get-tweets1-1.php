<?php
require_once("twitteroauth/twitteroauth.php"); //Path to twitteroauth library
 
$twitteruser = "legacyrlty";
$notweets = 5;
$consumerkey = "JdnH6gfWtkhceoeEwFjBw";
$consumersecret = "DrSk8Tnc77vhPH5Tkb43mrdIEqdUWy4k8R6RB4zSU";
$accesstoken = "543868743-2fJVgfvQj9x3IwCFuqy4JDWK60DBpfMBr2YtVbg";
$accesstokensecret = "ulKE3ipvE9LMSuo8I0iRYL4tJOTWB4KBv4xgSVjLQ8Y";
 
function getConnectionWithAccessToken($cons_key, $cons_secret, $oauth_token, $oauth_token_secret) {
  $connection = new TwitterOAuth($cons_key, $cons_secret, $oauth_token, $oauth_token_secret);
  return $connection;
}
 
$connection = getConnectionWithAccessToken($consumerkey, $consumersecret, $accesstoken, $accesstokensecret);
 
$tweets = $connection->get("https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=".$twitteruser."&count=".$notweets);
 
echo json_encode($tweets);
?>
