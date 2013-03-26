jstdatebot
==========

Twitter bot which tweets JST date

http://gihyo.jp/dev/serial/01/twitterbot
をベースに作成したJST時間をtweetするbot

以下の手順で動作をさせる。


1.https://dev.twitter.com/で設定を行い、OAuthの"Consumer key"および"Consumer secret"を取得

2.1.で取得した情報をoauth_keys.phpの該当項目にセット

3.以下のコマンドで"OAuth token"および"OAuth token secret"を取得(途中でwebアクセスとPIN入力あり)

$ php get_oauth.php

4.3.で取得した情報をoauth_keys.phpの該当項目にセット

5.twitaction.phpに行わせたい動作を記述

6.以下のコマンドでtweetを行う

$ php do_twit_by_oauth.php


以上
