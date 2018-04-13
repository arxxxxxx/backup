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

$message = 'テスト送信です。'

//オプション項目
$headers = 'From: sender@sender.com' . "\r\n";
//メールを送信
mb_send_mail($to,$subject,$message,$headers);

$from = "ONLINE=TUTOR事務局";
$from_mail = "sender@sender.com";

//メールヘッダを初期化
$header = '';
//「.=」は文字列の追加
$header .= "Cc: another@another.com \r\n";
//「\r\n」は改行文字
//UNIX系のOS全般では「\n」でよい
$header .= "Content-Type: text/plain \r\n";
$header .= "Return-Path: " . $from_mail . "\r\n";
$header .= "From: " .$form . "\r\n";
$header .= "Sender: " .$from . "\r\n";
$header .= "Reply-To: " . $from_mail . "\r\n";
$header .= "Organization: " . $from . "\r\n";

//送信失敗の場合「FALSE」が返ってくる
if(mb_send_mail($to,$subject,$message,$headers) === FALSE){
    echo 'メール送信に失敗しました。';
}else{
    echo 'メールを送信しました。';
}