<?php

$str1 = '0120';
$str2 = '090';

//preg_match()を使い結果を取り出す
$result1 = preg_match('/[0-9]/',$str1);
$result2 = preg_match('/[^0-9]/',$str2);
var_dump($result1);
var_dump($result2);

//「でしょう。」で終わる文章を探す
$str3 = 'でしょう。今日はくもりです';
$str4 = '明日は快晴でしょう。';

$result3 = preg_match('/.*でしょう。$/u',$str3);
$result4 = preg_match('/.*でしょう。$/u',$str4);

var_dump($result3);
var_dump($result4);