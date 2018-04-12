<?php

$sentences = <<<EOD
はじめまして。
私の名前は田中です。
休日はジョギングをしています。
EOD;

//「u」はパターン文字列を文字コードのutf-8で扱うことを意味している日本語環境で使う際には必ず使用しなければならない
//「m」は複数行あるテキストのすべての行頭を調査する
$result = preg_match('/^休日/um',$sentences);

var_dump($result);