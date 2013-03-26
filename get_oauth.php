<?php
require_once('libs/twitteroauth.php');
require_once('oauth_keys.php');

// アプリ登録で取得したConsumer keyを設定
$consumer_key=OAuthKeys::CONSUMER_KEY;
// アプリ登録で取得したConsumer secretを設定
$consumer_secret=OAuthKeys::CONSUMER_SECRET;

$twitter = new TwitterOAuth($consumer_key, $consumer_secret);

// リクエストトークンの取得
$request_token = $twitter->getRequestToken();
// 認証用URLの取得
$url = $twitter->getAuthorizeURL($request_token);

print "$url\n";
print "にアクセスし，アクセスを許可した後表示される暗証番号を入力してください: ";

// 暗証番号を入力
$pin = trim(fgets(STDIN));

// 暗証番号からアクセストークンを取得する
$token = $twitter->getAccessToken($pin);
$oauth_token = $token["oauth_token"];
$oauth_token_secret = $token["oauth_token_secret"];

if(!empty($oauth_token) && !empty($oauth_token_secret)) {
  print "成功しました\n";
  print "\$oauth_token=\"$oauth_token\";\n";
  print "\$oauth_token_secret=\"$oauth_token_secret\";\n";
  fgets(STDIN);
} else {
  print "失敗しました\n";
}
?>