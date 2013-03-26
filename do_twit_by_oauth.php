<?php
require_once('libs/twitteroauth.php');
require_once('twitaction.php');
require_once('oauth_keys.php');

// oauth_info.phpより文字列を取得し変数にセット
$consumer_key=OAuthKeys::CONSUMER_KEY;
$consumer_secret=OAuthKeys::CONSUMER_SECRET;
$oauth_token=OAuthKeys::OAUTH_TOKEN;
$oauth_token_secret=OAuthKeys::OAUTH_TOKEN_SECRET;

// TwitterOAuthのインスタンスを生成
$twitter = new TwitterOAuth(
  $consumer_key, $consumer_secret, $oauth_token, $oauth_token_secret
);

// get actions(array)
$actions = TwitAction::getActions();

// do action!
foreach($actions as $action){
  // Twitterアクション
  $response = $twitter->post($action['method'], $action['parameters']);
  $http_info = $twitter->http_info;
  $http_code = $http_info["http_code"];
  
if($http_code == "200" && !empty($response)) {
  //
  //print "ok\n";
} else {
  print "do_twit_by_oauth.php tweet ng!\n";
  print "$http_code\n";
  print "$response\n";
}

}
?>
