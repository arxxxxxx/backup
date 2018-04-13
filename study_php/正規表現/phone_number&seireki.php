<?php
//携帯電話番号をチェックする

$num1 = '090-1234-5678';
$num2 = '08012345678';
$num3 = '070-1234-567';

//変数に正規表現文を格納する
$pattern = '/^0[7-9]0-?\d{4}-?\d{4}$/u';

$result1 = preg_match($pattern,$num1);
$result2 = preg_match($pattern,$num2);
$result3 = preg_match($pattern,$num3);

var_dump($result1);
var_dump($result2);
var_dump($result3);

echo '<br>';

//西暦の記述を見つける

$date01 = '2017/11/04';
$date02 = '2017/3/8';
$date03 = '2017年11月4日';

//「.」「?」「*」「$」「[」「)」「/」などの特殊文字は文字の一つ前にバックスラッシュ「\」を置くことで普通の文字列として扱うことができる
//この場合は「/」を普通の文字列として扱いたいのでバックスラッシュを足して「\/」となる
//長い正規表現文になる場合は一つ一つの条件を()で囲む
$pattern2 = '/^(\d{4})\/(\d{1,2})\/(\d{1,2})$/u';

$result01 = preg_match($pattern2,$date01);
$result02 = preg_match($pattern2,$date02);
$result03 = preg_match($pattern2,$date03);

var_dump($result01);
var_dump($result02);
var_dump($result03);