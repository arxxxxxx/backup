<?php

$str = 'Hi, I am Taro.';
//「i」はアルファベットの大文字と小文字を区別しないという意味
$result = preg_match('/taro/i',$str);

var_dump($result);