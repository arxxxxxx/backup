<?php

//日本語に対応させる
mb_language("Japanese");
//文字コードを「UTF-8」に設定させる
mb_internal_encoding("utf-8");

//ユーザネームを設定
$user_name = 'taro';
//送信先を設定
$to = '@gmail.com';
//メールタイトルを設定
$subject = 'メールテスト１';

$message = 'このメールはテスト送信です。';

//オプション項目
$headers = 'From: sender@sender.com' . "\r\n";
//メールを送信
mb_send_mail($to,$subject,$message,$headers);