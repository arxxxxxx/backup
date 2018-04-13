<?php
$str1 = ' ABC ';
$str2 = "\t\tこんにちは　";

//タブ、半角スペースを取り除く
$result1 = trim($str1);
$result2 = trim($str2);

var_dump($result1);
var_dump($result2);