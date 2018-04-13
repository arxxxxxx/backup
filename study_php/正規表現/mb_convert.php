<?php
//半角カタカナで記述
$str1 = 'KV: ﾌﾟﾛｸﾞﾗﾐﾝｸﾞ';
//全角英字と全角スペースで記述
$str2 = 'as:　私はMOVIEが　好きです';

//「K」は半角カタカナを全角カタカナに変換「V」は濁点付きの文字を一文字に変換「ｓ」は全角スペースを半角に変換「a」は全角英数字を半角英数字に変換
//データベースなどの登録前に表記ゆれを是正することでクライアントからの入力値を最適な状態に整える
$result1 = mb_convert_kana($str1,'KVas','UTF-8');
$result2 = mb_convert_kana($str2,'KVas','UTF-8');

var_dump($result1);
var_dump($result2);